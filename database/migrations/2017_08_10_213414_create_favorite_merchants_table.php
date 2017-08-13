<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_merchants', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('fmtc_master_merchant_id')->unsigned()->index();

            $table->integer('influencer_id')->unsigned()->index();
            $table->foreign('influencer_id')->references('id')->on('influencers');





            $table->unique(['fmtc_master_merchant_id', 'influencer_id'], 'favorite_merchants_primary_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('favorite_merchants');
    }
}
