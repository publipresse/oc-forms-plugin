<?php

namespace Publipresse\Forms\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('publipresse_forms_records', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('group')->default('None');
            $table->text('form_data')->nullable();
            $table->string('ip')->nullable();
            $table->boolean('unread')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('publipresse_forms_records');
    }
}
