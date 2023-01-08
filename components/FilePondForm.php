<?php

namespace Publipresse\Forms\Components;

use Publipresse\Forms\Classes\MagicForm;

class FilePondForm extends MagicForm
{
    public function componentDetails()
    {
        return [
            'name'        => 'publipresse.forms::lang.components.filepond_form.name',
            'description' => 'publipresse.forms::lang.components.filepond_form.description',
        ];
    }

    public function defineProperties()
    {
        $local = [
            'mail_uploads' => [
                'title'             => 'publipresse.forms::lang.components.shared.mail_uploads.title',
                'description'       => 'publipresse.forms::lang.components.shared.mail_uploads.description',
                'type'              => 'checkbox',
                'default'           => false,
                'group'             => 'publipresse.forms::lang.components.shared.group_mail',
                'showExternalParam' => false
            ],
            'uploader_enable' => [
                'title'             => 'publipresse.forms::lang.components.shared.uploader_enable.title',
                'description'       => 'publipresse.forms::lang.components.shared.uploader_enable.description',
                'default'           => false,
                'type'              => 'checkbox',
                'group'             => 'publipresse.forms::lang.components.shared.group_uploader',
                'showExternalParam' => false,
            ],
        ];

        return array_merge(parent::defineProperties(), $local);
    }

    public function onRun() {
        parent::onRun();
        $this->addCss('assets/vendor/filepond/filepond.css');
        $this->addJs('assets/vendor/filepond/filepond-plugin-file-validate-type.js', ['defer' => true]);
        $this->addJs('assets/vendor/filepond/filepond-plugin-file-validate-size.js', ['defer' => true]);
        $this->addJs('assets/vendor/filepond/filepond.js', ['defer' => true]);
    }
}
