<?php

namespace Publipresse\Forms\Models;

use October\Rain\Database\Model;

class Settings extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'publipresse_forms_settings';
    public $settingsFields = 'fields.yaml';

    public $rules = [
        'gdpr_days' => 'required|numeric',
    ];

    public $attributeNames = [
        'gdpr_days' => 'GDPR',
    ];
}
