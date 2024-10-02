<?php

namespace Publipresse\Forms\Console;

use Db;
use Illuminate\Console\Command;
use Publipresse\Forms\Models\Record;

class ImportMartinForms extends Command
{
    protected $name = 'import:martinforms';

    protected $description = 'Import records from Martin.Forms plugin to Publipresse.Forms';

    public function handle()
    {
        if (!$this->confirm('Are you sure you want to migrate records from Martin.Forms to Publipresse.Forms?')) {
            return;
        }

        $records = Db::table('martin_forms_records')->get();
        $count = $records->count();

        if ($count === 0) {
            $this->info('Nothing to migrate');
            return;
        }

        foreach ($records as $record) {
            if (!empty($record->deleted_at)) {
                $count--;
                continue;
            }

            $newRecord = new Record();
            $newRecord->group = $record->group;
            $newRecord->form_data = json_decode($record->form_data, true);
            $newRecord->ip = $record->ip;
            $newRecord->unread = $record->unread;
            $newRecord->created_at = $record->created_at;
            $newRecord->updated_at = $record->updated_at;

            try {
                $newRecord->save();
            } catch (\Throwable $th) {
                $count--;
                continue;
            }
        }

        $this->info($count . ' records migrated');
    }
}
