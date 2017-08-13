<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('landing_page');
            $table->string('affiliate_link')->nullable()->default(null);

            $table->integer('commission_compensation_id')->unsigned()->index();
            $table->foreign('commission_compensation_id')->references('id')->on('compensation_commissions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('affiliate_links');
    }

}
