<?php

    namespace Publipresse\Forms\Components;

    use Publipresse\Forms\Classes\MagicForm;

    class GenericForm extends MagicForm {

        public function componentDetails() {
            return [
                'name'        => 'publipresse.forms::lang.components.generic_form.name',
                'description' => 'publipresse.forms::lang.components.generic_form.description',
            ];
        }

    }

?>