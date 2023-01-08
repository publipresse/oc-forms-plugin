<?php

namespace Publipresse\Forms;

use Backend\Facades\Backend;
use Publipresse\Forms\Classes\GDPR;
use System\Classes\PluginBase;
use Publipresse\Forms\Models\Settings;
use System\Classes\SettingsManager;
use Illuminate\Support\Facades\Lang;
use Publipresse\Forms\Classes\UnreadRecords;
use Publipresse\Forms\Classes\BackendHelpers;
use October\Rain\Support\Facades\Validator;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'publipresse.forms::lang.plugin.name',
            'description' => 'publipresse.forms::lang.plugin.description',
            'author'      => 'Publipresse M.',
            'icon'        => 'icon-bolt',
            'homepage'    => 'https://github.com/skydiver/'
        ];
    }

    public function registerNavigation()
    {
        if (Settings::get('global_hide_button', false)) {
            return;
        }

        return [
            'forms' => [
                'label'       => 'publipresse.forms::lang.menu.label',
                'icon'        => 'icon-bolt',
                'url'         => BackendHelpers::getBackendURL(['publipresse.forms.access_records' => 'publipresse/forms/records', 'publipresse.forms.access_exports' => 'publipresse/forms/exports'], 'publipresse.forms.access_records'),
                'permissions' => ['publipresse.forms.*'],
                'sideMenu' => [
                    'records' => [
                        'label'        => 'publipresse.forms::lang.menu.records.label',
                        'icon'         => 'icon-database',
                        'url'          => Backend::url('publipresse/forms/records'),
                        'permissions'  => ['publipresse.forms.access_records'],
                        'counter'      => UnreadRecords::getTotal(),
                        'counterLabel' => 'Un-Read Messages'
                    ],
                    'exports' => [
                        'label'       => 'publipresse.forms::lang.menu.exports.label',
                        'icon'        => 'icon-download',
                        'url'         => Backend::url('publipresse/forms/exports'),
                        'permissions' => ['publipresse.forms.access_exports']
                    ],
                ]
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'publipresse.forms::lang.menu.label',
                'description' => 'publipresse.forms::lang.menu.settings',
                'category'    => SettingsManager::CATEGORY_CMS,
                'icon'        => 'icon-bolt',
                'class'       => 'Publipresse\Forms\Models\Settings',
                'permissions' => ['publipresse.forms.access_settings'],
                'order'       => 500
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'publipresse.forms.access_settings' => ['tab' => 'publipresse.forms::lang.permissions.tab', 'label' => 'publipresse.forms::lang.permissions.access_settings'],
            'publipresse.forms.access_records'  => ['tab' => 'publipresse.forms::lang.permissions.tab', 'label' => 'publipresse.forms::lang.permissions.access_records'],
            'publipresse.forms.access_exports'  => ['tab' => 'publipresse.forms::lang.permissions.tab', 'label' => 'publipresse.forms::lang.permissions.access_exports'],
            'publipresse.forms.gdpr_cleanup'    => ['tab' => 'publipresse.forms::lang.permissions.tab', 'label' => 'publipresse.forms::lang.permissions.gdpr_cleanup'],
        ];
    }

    public function registerComponents()
    {
        return [
            'Publipresse\Forms\Components\GenericForm'  => 'genericForm',
            'Publipresse\Forms\Components\FilePondForm' => 'filepondForm',
            'Publipresse\Forms\Components\EmptyForm'    => 'emptyForm',
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'publipresse.forms::mail.notification' => Lang::get('publipresse.forms::lang.mails.form_notification.description'),
            'publipresse.forms::mail.autoresponse' => Lang::get('publipresse.forms::lang.mails.form_autoresponse.description'),
        ];
    }

    public function register()
    {
        $this->app->resolving('validator', function () {
            Validator::extend('recaptcha', 'Publipresse\Forms\Classes\ReCaptchaValidator@validateReCaptcha');
        });
    }

    public function registerSchedule($schedule)
    {
        $schedule->call(function () {
            GDPR::cleanRecords();
        })->daily();
    }
}
