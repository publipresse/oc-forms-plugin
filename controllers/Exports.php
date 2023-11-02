<?php

namespace Publipresse\Forms\Controllers;

use SplTempFileObject;
use League\Csv\AbstractCsv;
use Backend\Classes\Controller;
use Publipresse\Forms\Models\Record;
use Backend\Facades\BackendMenu;
use League\Csv\Writer as CsvWriter;

class Exports extends Controller
{
    public $requiredPermissions = ['publipresse.forms.access_exports'];

    public $implement = [
        'Backend.Behaviors.FormController',
    ];

    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Publipresse.Forms', 'forms', 'exports');
    }

    public function index()
    {
        $this->pageTitle = __('Export Records');
        $this->create('frontend');
    }

    public function csv()
    {

        $records = Record::orderBy('created_at');

        // FILTER GROUPS
        if (!empty($groups = post('Record.filter_groups'))) {
            $records->whereIn('group', $groups);
        }

        // FILTER DATE
        if (!empty($date_after = post('Record.filter_date_after'))) {
            $records->whereDate('created_at', '>=', $date_after);
        }

        // FILTER DATE
        if (!empty($date_before = post('Record.filter_date_before'))) {
            $records->whereDate('created_at', '<=', $date_before);
        }

        // CREATE CSV
        $csv = CsvWriter::createFromFileObject(new SplTempFileObject());

        // CHANGE DELIMTER
        if (post('Record.options_delimiter')) {
            $csv->setDelimiter(';');
        }

        // ADD STORED FIELDS AS HEADER ROW IN CSV
        $filteredRecords = $records->get();
        $record = $filteredRecords->first();

        if(!empty($record)) {
            // CSV HEADERS
            $headers = [];

            // METADATA HEADERS
            if (post('Record.options_metadata')) {
                $meta_headers = [
                    __('Record ID'),
                    __('Group'),
                    __('IP Address'),
                    __('Created at'),
                ];
                $headers = array_merge($meta_headers, $headers);
            }
            
            $headers = array_merge($headers, array_keys($record->form_data));

            // ADD FILES HEADER
            if (post('Record.options_files')) {
                $headers[] = __('Attached Files');
            }
    
            // ADD HEADERS
            $csv->insertOne($headers);
        }

        // WRITE CSV LINES
        foreach ($records->get() as $row) {

            $data = (array) $row['form_data'];
            
            // IF DATA IS ARRAY CONVERT TO JSON STRING
            foreach ($data as $field => $value) {
                if (is_array($value) || is_object($value)) {
                    $data[$field] = json_encode($value);
                }
            }

            // ADD METADATA IF NEEDED
            if (post('Record.options_metadata')) {
                array_unshift($data, $row['id'], $row['group'], $row['ip'], $row['created_at']);
            }

            // ADD ATTACHED FILES
            if (post('Record.options_files') && $row->files->count() > 0) {
                $data['files'] = '';
                foreach($row->files as $file) {
                    $data['files'] .= $file->path."\n";
                }
            }

            $csv->insertOne($data);
        }

        // RETURN CSV
        $csv->output('records.csv');
        exit();
    }
}
