<?php

    namespace Publipresse\Forms\Components;

    use Publipresse\Forms\Classes\MagicForm;

    class EmptyForm extends MagicForm {

        public function componentDetails() {
            return [
                'name'        => 'publipresse.forms::lang.components.empty_form.name',
                'description' => 'publipresse.forms::lang.components.empty_form.description',
            ];
        }

    }

?>