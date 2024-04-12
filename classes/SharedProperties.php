<?php

namespace Publipresse\Forms\Classes;

trait SharedProperties
{
    public function defineProperties()
    {
        return [
            'group' => [
                'title' =>  __('Group'),
                'type' => 'string',
                'showExternalParam' => false,
                'default' => __('Contact form'),
                'validation' => ['required' => ['message' => __('Group is required')]]
            ],
            'rules' => [
                'title' => __('Rules'),
                'type' => 'dictionary',
                'group' => __('Form validation'),
                'showExternalParam' => false,
            ],
            'rules_messages' => [
                'title' => __('Rules messages'),
                'type' => 'dictionary',
                'group' => __('Form validation'),
                'showExternalParam' => false,
            ],
            'custom_attributes' => [
                'title' => __('Custom attributes'),
                'type' => 'dictionary',
                'group' => __('Form validation'),
                'showExternalParam' => false,
            ],
            'messages_success' => [
                'title' => __('Success'),
                'type' => 'text',
                'group' => __('Flash messages'),
                'default' => __('Your form was successfully submitted'),
                'showExternalParam' => false,
                'validation' => ['required' => ['message' => __('Flash success message is required')]]
            ],
            'messages_errors' => [
                'title' => __('Error'),
                'type' => 'text',
                'group' => __('Flash messages'),
                'default' => __('There were errors with your submission'),
                'showExternalParam' => false,
                'validation' => ['required' => ['message' => __('Flash error message is required')]]
            ],
            'messages_partial' => [
                'title' => __('Use custom partial'),
                'type' => 'string',
                'group' => __('Flash messages'),
                'showExternalParam' => false
            ],
            'mail_enabled' => [
                'title' => __('Send notifications'),
                'type' => 'checkbox',
                'group' => __('Notification settings'),
                'showExternalParam' => false
            ],
            'mail_subject' => [
                'title' => __('Subject'),
                'description' => __('You can use {{ record }} to access model or {{ form }} to access submitted datas'),
                'type' => 'string',
                'group' => __('Notification settings'),
                'showExternalParam' => false
            ],
            'mail_recipients' => [
                'title' => __('Recipients'),
                'description' => __('Specify email recipients (one address per line)'),
                'type' => 'stringList',
                'group' => __('Notification settings'),
                'showExternalParam' => false
            ],
            'mail_bcc' => [
                'title' => __('BBC'),
                'description' => __('Send blind carbon copy to email recipients (one address per line)'),
                'type' => 'stringList',
                'group' => __('Notification settings'),
                'showExternalParam' => false
            ],
            'mail_replyto' => [
                'title' => __('Reply to'),
                'description' => __('Specify the field name containing the sender email address'),
                'type' => 'string',
                'group' => __('Notification settings'),
                'showExternalParam' => false
            ],
            'mail_template' => [
                'title' => __('Mail template'),
                'description' => __('Specify email template code to use'),
                'type' => 'string',
                'group' => __('Notification settings'),
                'showExternalParam' => false
            ],
            'mail_resp_enabled' => [
                'title' => __('Send auto-response'),
                'type' => 'checkbox',
                'group' => __('Auto-response settings'),
                'showExternalParam' => false
            ],
            'mail_resp_field' => [
                'title' => __('Email field'),
                'description' => __('Specify the field name containing the sender email address'),
                'type' => 'string',
                'group' => __('Auto-response settings'),
                'showExternalParam' => false
            ],
            'mail_resp_name' => [
                'title' => __('Sender name'),
                'type' => 'string',
                'group' => __('Auto-response settings'),
                'showExternalParam' => false
            ],
            'mail_resp_from' => [
                'title' => __('Sender address'),
                'type' => 'string',
                'group' => __('Auto-response settings'),
                'showExternalParam' => false
            ],
            'mail_resp_subject' => [
                'title' => __('Subject'),
                'description' => __('You can use {{ record }} to access model or {{ form }} to access submitted datas'),
                'type' => 'string',
                'group' => __('Auto-response settings'),
                'showExternalParam' => false
            ],
            'mail_resp_template' => [
                'title' => __('Mail template'),
                'description' => __('Specify email template code to use'),
                'type' => 'string',
                'group' => __('Auto-response settings'),
                'showExternalParam' => false
            ],
            'reset_form' => [
                'title' => __('Reset form'),
                'type' => 'checkbox',
                'group' => __('More settings'),
                'showExternalParam' => false
            ],
            'redirect' => [
                'title' => __('Redirect on success'),
                'type' => 'string',
                'group' => __('More settings'),
                'showExternalParam' => false
            ],
            'feedback_mode' => [
                'title' => __('Feedback mode'),
                'type' => 'dropdown',
                'options' => [
                    'flash' => __('Flash message'), 
                    'inline' => __('Inline errors'), 
                    'variable' => __('JS variable'),
                ],
                'default' => 'flash',
                'group' => __('More settings'),
                'showExternalParam' => false
            ],
            'js_on_success' => [
                'title' => __('JS on success'),
                'description' => __('Custom javascript code to execute on success'),
                'type' => 'text',
                'group' => __('More settings'),
                'showExternalParam' => false
            ],
            'js_on_error' => [
                'title' => __('JS on error'),
                'description' => __("Custom javascript code to execute on error, don't work with inline feedback mode"),
                'type' => 'text',
                'group' => __('More settings'),
                'showExternalParam' => false,
            ],
            'allowed_fields' => [
                'title' => __('Allowed fields'),
                'description' => __('Specify which fields should be filtered and stored'),
                'type' => 'stringList',
                'group' => __('Security'),
                'showExternalParam' => false,
                //'validation' => ['required' => ['message' => __('For security reasons, you must specify the list of fields that should be filtered and stored')]]
            ],
            'sanitize_data' => [
                'title' => __('Sanitize form data'),
                'type' => 'dropdown',
                'options' => [
                    'disabled' => __('Disabled'), 
                    'htmlspecialchars' => __('Use htmlspecialchars')
                ],
                'default' => 'disabled',
                'group' => __('Security'),
                'showExternalParam' => false
            ],
            'anonymize_ip' => [
                'title' => __('Anonymize IP'),
                'type' => 'dropdown',
                'options' => [
                    'disabled' => __('Disabled'),
                    'partial' => __('Partial'),
                    'full' => __('Full')
                ],
                'default' => 'disabled',
                'group' => __('Security'),
                'showExternalParam' => false
            ],
            'recaptcha_enabled' => [
                'title' => __('Enable reCAPTCHA'),
                'type' => 'checkbox',
                'group' => __('reCAPTCHA settings'),
                'showExternalParam' => false
            ],
            'recaptcha_theme' => [
                'title' => __('Theme'),
                'type' => 'dropdown',
                'options' => [
                    'light' => __('Light'), 
                    'dark' => __('Dark')
                ],
                'default' => 'light',
                'group' => __('reCAPTCHA settings'),
                'showExternalParam' => false
            ],
            'recaptcha_type' => [
                'title' => __('Type'),
                'type' => 'dropdown',
                'options' => [
                    'image' => __('Image'),
                    'audio' => __('Audio')
                ],
                'default' => 'image',
                'group' => __('reCAPTCHA settings'),
                'showExternalParam' => false
            ],
            'recaptcha_size' => [
                'title' => __('Size'),
                'type' => 'dropdown',
                'options' => [
                    'normal' => __('Normal'),
                    'compact' => __('Compact'),
                    'invisible' => __('Invisible'),
                ],
                'default' => 'normal',
                'group' => __('reCAPTCHA settings'),
                'showExternalParam' => false
            ],
            'skip_database' => [
                'title' => __('Skip database'),
                'type' => 'checkbox',
                'group' => __('Advanced settings'),
                'showExternalParam' => false
            ],
            'emails_date_format' => [
                'title' => __('Date format on emails'),
                'default' => 'Y-m-d',
                'group' => __('Advanced settings'),
                'showExternalParam' => false
            ],
            'save_in_session' => [
                'title' => __('Save submitted datas in session'),
                'description' => __('If checked, data will be saved in a $_SESSION["{{ alias }}-form"]'),
                'type' => 'checkbox',
                'group' => __('Advanced settings'),
                'showExternalParam' => false
            ],
            'skip_database' => [
                'title' => __('Skip database'),
                'type' => 'checkbox',
                'group' => __('Advanced settings'),
                'showExternalParam' => false
            ],
        ];
    }

}