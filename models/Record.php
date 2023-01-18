<?php

namespace Publipresse\Forms\Models;

use Backend\Facades\Backend;
use October\Rain\Database\Model;

class Record extends Model {

    public $table = 'publipresse_forms_records';

    public $timestamps = true;

    
    public $attachMany = [
        'files' => ['System\Models\File', 'public' => false, 'delete' => true]
    ];
    

    protected $jsonable = ['form_data'];

    public function filterGroups() {
        return Record::orderBy('group')->groupBy('group')->lists('group', 'group');
    }

    public function getGroupsOptions() {
        return $this->filterGroups();
    }

    public function filesList() {
        return $this->files->map(function ($file) {
            return Backend::url('publipresse/forms/records/download', [$this->id, $file->id]);
        })->implode(',');
    }

    public static function getUnread($group = null) {
        $unread = Record::query();
        if(!empty($group)) {
            $unread = $unread->where('group', '=', $group);
        }
        $unread = $unread->where('unread', 1);
        $unread = $unread->count();
        return ($unread > 0) ? $unread : null;
    }
}
