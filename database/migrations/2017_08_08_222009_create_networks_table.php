<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networks', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('label', 20)->unique();
            $table->string('shorthand', 5)->unique();
            $table->string('logo', 10);
            $table->string('sub_id_key', 20)->nullable()->default(null);
            $table->integer('fmtc_network_id')->unsigned()->index()->nullable()->default(null);
            $table->boolean('syncable')->index();
            $table->boolean('reportable')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('networks');
    }
}
