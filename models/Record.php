<?php

namespace Publipresse\Forms\Models;

use Backend\Facades\Backend;
use October\Rain\Database\Model;

class Record extends Model
{
    use \October\Rain\Database\Traits\SoftDelete;

    public $table = 'publipresse_forms_records';

    protected $dates = ['deleted_at'];

    public $attachMany = [
        'files' => ['System\Models\File', 'public' => false]
    ];

    public function getFormDataArrAttribute()
    {
        return (array) json_decode($this->form_data);
    }

    public function filterGroups()
    {
        return Record::orderBy('group')->groupBy('group')->lists('group', 'group');
    }

    public function getGroupsOptions()
    {
        return $this->filterGroups();
    }

    public function filesList()
    {
        return $this->files->map(function ($file) {
            return Backend::url('publipresse/forms/records/download', [$this->id, $file->id]);
        })->implode(',');
    }
}
