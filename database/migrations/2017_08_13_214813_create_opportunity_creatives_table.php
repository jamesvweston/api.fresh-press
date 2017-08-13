<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunityCreativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_creatives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
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
        Schema::drop('opportunity_creatives');
    }
}
