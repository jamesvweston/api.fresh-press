<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworkConnectionFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_connection_fields', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('network_connection_id')->unsigned()->index();
            $table->foreign('network_connection_id')->references('id')->on('network_connections');

            $table->smallInteger('network_field_id')->unsigned()->index();
            $table->foreign('network_field_id')->references('id')->on('network_fields');

            $table->string('value', 500);


            $table->unique(['network_connection_id', 'network_field_id'], 'network_connection_fields_unique_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('network_connection_fields');
    }
}
