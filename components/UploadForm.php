<?php

namespace Publipresse\Forms\Components;

use Publipresse\Forms\Classes\MagicForm;

class UploadForm extends MagicForm {

    public $uploader_enable;
    public $uploader_label;
    public $max_files;
    public $max_filesize;
    public $max_totalsize;
    public $allowed_filetypes;

    public function componentDetails() {
        return [
            'name' => 'Upload form',
            'description' => 'Create an upload form',
        ];
    }

    public function defineProperties() {
        $properties = [
            'mail_uploads' => [
                'title' => __('Attach uploaded files'),
                'type' => 'checkbox',
                'default' => false,
                'group' => __('Notification settings'),
                'showExternalParam' => false
            ],
            'uploader_enable' => [
                'title' => __('Enable upload'),
                'type' => 'checkbox',
                'default' => false,
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
            'uploader_label' => [
                'title' => __('Label'),
                'type' => 'text',
                'default' => 'Drag & Drop your files or Browse',
                'group' => __('Upload files'),
                'showExternalParam' => false,
                'validation' => ['required' => ['message' => __('Uploader label is required')]]
            ],
            'maxFiles' => [
                'title' => __('Max number of files'),
                'type' => 'string',
                'default' => '1',
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
            'maxFileSize' => [
                'title' => __('Max size per file'),
                'type' => 'string',
                'default' => '2MB',
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
            'maxTotalSize' => [
                'title' => __('Max total size'),
                'type' => 'string',
                'default' => '5MB',
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
            'fileTypes' => [
                'title' => __('Accepted file types'),
                'type' => 'dictionary',
                'default' => ['application/pdf' => 'pdf', 'application/zip' => 'zip', 'image/png' => 'png', 'image/jpeg' => 'jpg'],
                'group' => __('Upload files'),
                'showExternalParam' => false,
            ],
        ];
        return array_merge(parent::defineProperties(), $properties);
    }
    
    public function onRun() {
        parent::onRun();
        
        $this->uploader_enable = $this->property('uploader_enable');
        if ($this->uploader_enable) {
            $this->addCss('assets/vendor/filepond/filepond.css');
            $this->addJs('assets/vendor/filepond/filepond-plugin-file-validate-type.js', ['defer' => true]);
            $this->addJs('assets/vendor/filepond/filepond-plugin-file-validate-size.js', ['defer' => true]);
            $this->addJs('assets/vendor/filepond/filepond.js', ['defer' => true]);
            
            $this->uploader_label = $this->property('uploader_label');
            $this->max_files = $this->property('maxFiles');
            $this->max_files = $this->property('maxFiles');
            $this->max_filesize = $this->property('maxFileSize');
            $this->max_totalsize = $this->property('maxTotalSize');
            $this->allowed_filetypes = $this->property('fileTypes');
        }
    }
}
