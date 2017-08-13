<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfluencersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('influencers', function (Blueprint $table)
        {
            $table->increments('id');

            $table->integer('billing_address_id')->unsigned()->index()->nullable()->default(null);
            $table->foreign('billing_address_id')->references('id')->on('addresses');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('influencers');
    }
}
