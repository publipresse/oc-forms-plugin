<?php

namespace Publipresse\Forms\Classes;

use Lang;

trait SharedProperties
{
    public function defineProperties()
    {
        return [
            'group' => [
                'title'             => 'publipresse.forms::lang.components.shared.group.title',
                'description'       => 'publipresse.forms::lang.components.shared.group.description',
                'type'              => 'string',
                'showExternalParam' => false,
            ],
            'rules' => [
                'title'             => 'publipresse.forms::lang.components.shared.rules.title',
                'description'       => 'publipresse.forms::lang.components.shared.rules.description',
                'type'              => 'dictionary',
                'group'             => 'publipresse.forms::lang.components.shared.group_validation',
                'showExternalParam' => false,
            ],
            'rules_messages' => [
                'title'             => 'publipresse.forms::lang.components.shared.rules_messages.title',
                'description'       => 'publipresse.forms::lang.components.shared.rules_messages.description',
                'type'              => 'dictionary',
                'group'             => 'publipresse.forms::lang.components.shared.group_validation',
                'showExternalParam' => false,
            ],
            'custom_attributes' => [
                'title'             => 'publipresse.forms::lang.components.shared.custom_attributes.title',
                'description'       => 'publipresse.forms::lang.components.shared.custom_attributes.description',
                'type'              => 'dictionary',
                'group'             => 'publipresse.forms::lang.components.shared.group_validation',
                'showExternalParam' => false,
            ],
            'messages_success' => [
                'title'             => 'publipresse.forms::lang.components.shared.messages_success.title',
                'description'       => 'publipresse.forms::lang.components.shared.messages_success.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_messages',
                'default'           => Lang::get('publipresse.forms::lang.components.shared.messages_success.default'),
                'showExternalParam' => false,
                'validation'        => ['required' => ['message' => Lang::get('publipresse.forms::lang.components.shared.validation_req')]]
            ],
            'messages_errors' => [
                'title'             => 'publipresse.forms::lang.components.shared.messages_errors.title',
                'description'       => 'publipresse.forms::lang.components.shared.messages_errors.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_messages',
                'default'           => Lang::get('publipresse.forms::lang.components.shared.messages_errors.default'),
                'showExternalParam' => false,
                'validation'        => ['required' => ['message' => Lang::get('publipresse.forms::lang.components.shared.validation_req')]]
            ],
            'messages_partial' => [
                'title'             => 'publipresse.forms::lang.components.shared.messages_partial.title',
                'description'       => 'publipresse.forms::lang.components.shared.messages_partial.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_messages',
                'showExternalParam' => false
            ],
            'mail_enabled' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_enabled.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_enabled.description',
                'type'              => 'checkbox',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail',
                'showExternalParam' => false
            ],
            'mail_subject' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_subject.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_subject.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail',
                'showExternalParam' => false
            ],
            'mail_recipients' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_recipients.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_recipients.description',
                'type'              => 'stringList',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail',
                'showExternalParam' => false
            ],
            'mail_bcc' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_bcc.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_bcc.description',
                'type'              => 'stringList',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail',
                'showExternalParam' => false
            ],
            'mail_replyto' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_replyto.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_replyto.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail',
                'showExternalParam' => false
            ],
            'mail_template' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_template.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_template.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail',
                'showExternalParam' => false
            ],
            'mail_resp_enabled' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_resp_enabled.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_resp_enabled.description',
                'type'              => 'checkbox',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail_resp',
                'showExternalParam' => false
            ],
            'mail_resp_field' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_resp_field.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_resp_field.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail_resp',
                'showExternalParam' => false
            ],
            'mail_resp_name' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_resp_name.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_resp_name.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail_resp',
                'showExternalParam' => false
            ],
            'mail_resp_from' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_resp_from.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_resp_from.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail_resp',
                'showExternalParam' => false
            ],
            'mail_resp_subject' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_resp_subject.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_resp_subject.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail_resp',
                'showExternalParam' => false
            ],
            'mail_resp_template' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_template.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_template.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_mail_resp',
                'showExternalParam' => false
            ],
            'reset_form' => [
                'title'             => 'publipresse.forms::lang.components.shared.reset_form.title',
                'description'       => 'publipresse.forms::lang.components.shared.reset_form.description',
                'type'              => 'checkbox',
                'group'             => 'publipresse.forms::lang.components.shared.group_settings',
                'showExternalParam' => false
            ],
            'redirect' => [
                'title'             => 'publipresse.forms::lang.components.shared.redirect.title',
                'description'       => 'publipresse.forms::lang.components.shared.redirect.description',
                'type'              => 'string',
                'group'             => 'publipresse.forms::lang.components.shared.group_settings',
                'showExternalParam' => false
            ],
            'inline_errors' => [
                'title'             => 'publipresse.forms::lang.components.shared.inline_errors.title',
                'description'       => 'publipresse.forms::lang.components.shared.inline_errors.description',
                'type'              => 'dropdown',
                'options'           => ['disabled' => 'publipresse.forms::lang.components.shared.inline_errors.disabled', 'display' => 'publipresse.forms::lang.components.shared.inline_errors.display', 'variable' => 'publipresse.forms::lang.components.shared.inline_errors.variable'],
                'default'           => 'disabled',
                'group'             => 'publipresse.forms::lang.components.shared.group_settings',
                'showExternalParam' => false
            ],
            'js_on_success' => [
                'title'             => 'publipresse.forms::lang.components.shared.js_on_success.title',
                'description'       => 'publipresse.forms::lang.components.shared.js_on_success.description',
                'type'              => 'text',
                'group'             => 'publipresse.forms::lang.components.shared.group_settings',
                'showExternalParam' => false
            ],
            'js_on_error' => [
                'title'             => 'publipresse.forms::lang.components.shared.js_on_error.title',
                'description'       => 'publipresse.forms::lang.components.shared.js_on_error.description',
                'type'              => 'text',
                'group'             => 'publipresse.forms::lang.components.shared.group_settings',
                'showExternalParam' => false
            ],
            'allowed_fields' => [
                'title'             => 'publipresse.forms::lang.components.shared.allowed_fields.title',
                'description'       => 'publipresse.forms::lang.components.shared.allowed_fields.description',
                'type'              => 'stringList',
                'group'             => 'publipresse.forms::lang.components.shared.group_security',
                'showExternalParam' => false
            ],
            'sanitize_data' => [
                'title'             => 'publipresse.forms::lang.components.shared.sanitize_data.title',
                'description'       => 'publipresse.forms::lang.components.shared.sanitize_data.description',
                'type'              => 'dropdown',
                'options'           => ['disabled' => 'publipresse.forms::lang.components.shared.sanitize_data.disabled', 'htmlspecialchars' => 'publipresse.forms::lang.components.shared.sanitize_data.htmlspecialchars'],
                'default'           => 'disabled',
                'group'             => 'publipresse.forms::lang.components.shared.group_security',
                'showExternalParam' => false
            ],
            'anonymize_ip' => [
                'title'             => 'publipresse.forms::lang.components.shared.anonymize_ip.title',
                'description'       => 'publipresse.forms::lang.components.shared.anonymize_ip.description',
                'type'              => 'dropdown',
                'options'           => ['disabled' => 'publipresse.forms::lang.components.shared.anonymize_ip.disabled', 'partial' => 'publipresse.forms::lang.components.shared.anonymize_ip.partial', 'full' => 'publipresse.forms::lang.components.shared.anonymize_ip.full'],
                'default'           => 'disabled',
                'group'             => 'publipresse.forms::lang.components.shared.group_security',
                'showExternalParam' => false
            ],
            'recaptcha_enabled' => [
                'title'             => 'publipresse.forms::lang.components.shared.recaptcha_enabled.title',
                'description'       => 'publipresse.forms::lang.components.shared.recaptcha_enabled.description',
                'type'              => 'checkbox',
                'group'             => 'publipresse.forms::lang.components.shared.group_recaptcha',
                'showExternalParam' => false
            ],
            'recaptcha_theme' => [
                'title'             => 'publipresse.forms::lang.components.shared.recaptcha_theme.title',
                'description'       => 'publipresse.forms::lang.components.shared.recaptcha_theme.description',
                'type'              => 'dropdown',
                'options'           => ['light' => 'publipresse.forms::lang.components.shared.recaptcha_theme.light', 'dark' => 'publipresse.forms::lang.components.shared.recaptcha_theme.dark'],
                'default'           => 'light',
                'group'             => 'publipresse.forms::lang.components.shared.group_recaptcha',
                'showExternalParam' => false
            ],
            'recaptcha_type' => [
                'title'             => 'publipresse.forms::lang.components.shared.recaptcha_type.title',
                'description'       => 'publipresse.forms::lang.components.shared.recaptcha_type.description',
                'type'              => 'dropdown',
                'options'           => ['image' => 'publipresse.forms::lang.components.shared.recaptcha_type.image', 'audio' => 'publipresse.forms::lang.components.shared.recaptcha_type.audio'],
                'default'           => 'image',
                'group'             => 'publipresse.forms::lang.components.shared.group_recaptcha',
                'showExternalParam' => false
            ],
            'recaptcha_size' => [
                'title'             => 'publipresse.forms::lang.components.shared.recaptcha_size.title',
                'description'       => 'publipresse.forms::lang.components.shared.recaptcha_size.description',
                'type'              => 'dropdown',
                'options'           => [
                    'normal' => 'publipresse.forms::lang.components.shared.recaptcha_size.normal',
                    'compact' => 'publipresse.forms::lang.components.shared.recaptcha_size.compact',
                    'invisible' => 'publipresse.forms::lang.components.shared.recaptcha_size.invisible',
                ],
                'default'           => 'normal',
                'group'             => 'publipresse.forms::lang.components.shared.group_recaptcha',
                'showExternalParam' => false
            ],
            'skip_database' => [
                'title'             => 'publipresse.forms::lang.components.shared.skip_database.title',
                'description'       => 'publipresse.forms::lang.components.shared.skip_database.description',
                'type'              => 'checkbox',
                'group'             => 'publipresse.forms::lang.components.shared.group_advanced',
                'showExternalParam' => false
            ],
            'emails_date_format' => [
                'title'             => 'publipresse.forms::lang.components.shared.emails_date_format.title',
                'description'       => 'publipresse.forms::lang.components.shared.emails_date_format.description',
                'default'           => 'Y-m-d',
                'group'             => 'publipresse.forms::lang.components.shared.group_advanced',
                'showExternalParam' => false
            ],
        ];
    }
}
