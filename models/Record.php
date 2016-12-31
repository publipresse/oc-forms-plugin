<?php

    namespace Martin\Forms\Models;

    use Model;

    class Record extends Model {

        use \October\Rain\Database\Traits\SoftDelete;

        public $table = 'martin_forms_records';

        protected $dates = ['deleted_at'];

        public function getFormDataArrAttribute() {
            return (array) json_decode($this->form_data);
        }

    }

?>