<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworkFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_fields', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('label', 50)->index();
            $table->string('field', 20)->index();

            $table->tinyInteger('network_id')->unsigned()->index();
            $table->foreign('network_id')->references('id')->on('networks');

            $table->unique(['network_id', 'label']);
            $table->unique(['network_id', 'field']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('network_fields');
    }

}
