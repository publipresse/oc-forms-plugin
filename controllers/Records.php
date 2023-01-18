<?php

namespace Publipresse\Forms\Controllers;


use App;
use Flash;
use Redirect;
use Lang;
use Publipresse\Forms\Models\Record;

use Backend\Facades\Backend;
use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;

class Records extends Controller {
    public $implement = [
        'Backend.Behaviors.ListController'
    ];
    
    public $listConfig = [];
   
    public $requiredPermissions = ['publipresse.forms.access_records'];

    public function __construct() {
        // Define dynamic $listConfig depending on the group
        $this->listConfig = $this->getListConfig();

        parent::__construct();

        // Change menu context depending on the group
        $group = get('group');
        if(!empty($group)) {
            BackendMenu::setContext('Publipresse.Forms', 'forms', str_slug($group));
        } else {
            BackendMenu::setContext('Publipresse.Forms', 'forms', 'records');
        }
    }

    public function view($id) {
        $record = Record::findOrFail($id);
        $record->unread = false;
        $record->save();
        $this->pageTitle = __("Record Details");
        $this->vars['record'] = $record;
    }

    public function onDelete() {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            Record::whereIn('id', $checkedIds)->delete();
        }

        $counter = Record::getUnread();

        return [
            'counter' => ($counter != null) ? $counter : 0,
            'list'    => $this->listRefresh()
        ];
    }

    public function onDeleteSingle() {
        $id = post('id');
        $record = Record::findOrFail($id);
        $record->delete();
        return Redirect::to(Backend::url('publipresse/forms/records'));
    }

    public function listInjectRowClass($record, $definition = null) {
        if ($record->unread) {
            return 'new';
        }
    }

    public function onReadState() {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            $unread = (post('state') == 'read') ? 0 : 1;
            Record::whereIn('id', $checkedIds)->update(['unread' => $unread]);
        }

        $counter = Record::getUnread();

        return [
            'counter' => ($counter != null) ? $counter : 0,
            'list'    => $this->listRefresh()
        ];
    }

    public function onGDPRClean() {
        if ($this->user->hasPermission(['publipresse.forms.gdpr_cleanup'])) {
            MagicForm::gdprClean();
            Flash::success(__("GDPR cleanup was executed successfully"));
        } else {
            Flash::error(__("You don't have permission to this feature"));
        }

        $counter = UnreadRecords::getTotal();

        return [
            'counter' => ($counter != null) ? $counter : 0,
            'list'    => $this->listRefresh()
        ];
    }

    private function getListConfig() {
        $groups = Record::all()->pluck('group')->unique();
        $listConfig = ['list' => 'config_list.yaml'];
        foreach($groups as $group) {
            $g = str_replace('-', '', str_slug($group));
            $listConfig[$g] = 'config_list.yaml';
        }
        return $listConfig;
    }
    

    public function listExtendColumns($list) {
        $group = get('group');
        if(empty($group)) return;

        $form_datas = Record::where('group', '=', $group)->get()->pluck('form_data')->map(function ($data) {
            return array_keys($data);
        })->flatten()->unique();

        $columns = [];
        foreach($form_datas as $data) {
            $columns['form_data['.$data.']'] = [
                'label' => $data,
                'type' => 'text',
                'searchable' => false,
                'invisible' => false,
                'sortable' => true,
                'order' => 200,
            ];
        }
        
        $list->removeColumn('group');
        $list->removeColumn('form_data_summary');
        $list->addColumns($columns);
    }

    public function listExtendQuery($query, $definition) {
        $group = get('group');
        if(empty($group)) return;
        $query->where('group', '=', $group);
    }

    public function listFilterExtendScopes($filter) {
        $group = get('group');
        if(empty($group)) return;
        $filter->removeScope('group');
    }
}
