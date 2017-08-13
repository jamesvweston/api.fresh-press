<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompensationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensation_models', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('compensation_model_type_id')->unsigned()->index();

            $table->integer('opportunity_id')->unsigned()->index();
            $table->foreign('opportunity_id')->references('id')->on('opportunities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('compensation_models');
    }
}
