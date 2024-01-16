<?php

namespace Publipresse\Forms\Classes;

use Publipresse\Forms\Classes\BackendHelpers;
use Publipresse\Forms\Models\Settings;
use RainLab\Translate\Classes\Translator;

trait ReCaptcha {

    /**
     * @var RainLab\Translate\Classes\Translator Translator object.
     */
    protected $translator;

    /**
     * @var string The active locale code.
     */
    public $activeLocale;

    public function init() {
        if (BackendHelpers::isTranslatePlugin()) {
            $this->translator = Translator::instance();
        }
    }

    private function isReCaptchaEnabled() {
        return ($this->property('recaptcha_enabled') && Settings::get('recaptcha_site_key') != '' && Settings::get('recaptcha_secret_key') != '');
    }

    private function isReCaptchaMisconfigured() {
        return ($this->property('recaptcha_enabled') && (Settings::get('recaptcha_site_key') == '' || Settings::get('recaptcha_secret_key') == ''));
    }

    private function loadReCaptcha() {
        $this->addJs('https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit', ['defer' => true]);
        $this->addJs('assets/js/recaptcha.js');
    }
}
