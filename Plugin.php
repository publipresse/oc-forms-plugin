<?php

namespace Publipresse\Forms;

use Lang;
use Validator;

use Publipresse\Forms\Classes\BackendHelpers;
use Publipresse\Forms\Models\Settings;
use Publipresse\Forms\Models\Record;

use Backend\Facades\Backend;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;


class Plugin extends PluginBase
{
    public function pluginDetails() {
        return [
            'name' => __('Magic forms'),
            'description' => __('Create easy ajax forms'),
            'author' => 'Publipresse',
            'icon' => 'icon-bolt',
            'homepage' => 'https://github.com/publipresse/oc-forms-plugin'
        ];
    }

    public function register()
    {
        $this->registerConsoleCommand('import.martinforms', \Publipresse\Forms\Console\ImportMartinForms::class);
    }

    public function registerNavigation() {

        // Add menu item for all records
        $menu = [
            'forms' => [
                'label' => __('Forms'),
                'icon' => 'icon-bolt',
                'url' => BackendHelpers::getBackendURL(['publipresse.forms.access_records' => 'publipresse/forms/records', 'publipresse.forms.access_exports' => 'publipresse/forms/exports'], 'publipresse.forms.access_records'),
                'permissions' => ['publipresse.forms.*'],
                'counter' => Record::getUnread(),
                'counterLabel' => __('Unread messages'),
                'sideMenu' => [
                    'records' => [
                        'label' => __('All records'),
                        'icon' => 'icon-database',
                        'url' => Backend::url('publipresse/forms/records'),
                        'permissions' => ['publipresse.forms.access_records'],
                        'counter' => Record::getUnread(),
                        'counterLabel' => __('Unread messages'),
                    ],
                ]
            ]
        ];

        // Add menu item for each groups
        $groups = Record::all()->pluck('group')->unique();
        foreach($groups as $group) {
            $slug = str_slug($group);
            $menu['forms']['sideMenu'][$slug] = [
                'label' => $group,
                'icon' => 'icon-database',
                'url' => Backend::url('publipresse/forms/records?group='.$group),
                'permissions' => ['publipresse.forms.access_records'],
                'counter' => Record::getUnread($group),
                'counterLabel' => __('Unread messages'),
            ];
        }

        // Add menu item to export datas
        $menu['forms']['sideMenu']['exports'] = [
            'label' => __('Export'),
            'icon' => 'icon-download',
            'url' => Backend::url('publipresse/forms/exports'),
            'permissions' => ['publipresse.forms.access_exports']
        ];
        return $menu;
    }

    public function registerSettings() {
        return [
            'config' => [
                'label' => __('Magic forms'),
                'description' => __('Configure magic forms parameters'),
                'category' => SettingsManager::CATEGORY_CMS,
                'icon' => 'icon-bolt',
                'class' => 'Publipresse\Forms\Models\Settings',
                'permissions' => ['publipresse.forms.access_settings'],
                'order' => 500
            ]
        ];
    }

    public function registerPermissions() {
        return [
            'publipresse.forms.access_settings' => ['tab' => __('Magic forms'), 'label' => __('Access settings')],
            'publipresse.forms.access_records' => ['tab' => __('Magic forms'), 'label' => __('Access records')],
            'publipresse.forms.access_exports' => ['tab' => __('Magic forms'), 'label' => __('Can export records')],
            'publipresse.forms.gdpr_cleanup' => ['tab' => __('Magic forms'), 'label' => __('Gdpr cleanup')],
        ];
    }

    public function registerComponents() {
        return [
            'Publipresse\Forms\Components\UploadForm' => 'uploadForm',
        ];
    }

    public function registerMailTemplates() {
        return [
            'publipresse.forms::mail.notification',
            'publipresse.forms::mail.autoresponse',
        ];
    }

    public function registerSchedule($schedule) {
        $schedule->call(function () {
            MagicForm::gdprClean();
        })->daily();
    }

}
