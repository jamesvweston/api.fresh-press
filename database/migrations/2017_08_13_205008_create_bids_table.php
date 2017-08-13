<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount', 8, 2);
            $table->text('message')->nullable()->default(null);
            $table->text('product_address')->nullable()->default(null);
            $table->text('product_choices')->nullable()->default(null);
            $table->string('reject_reason')->nullable()->default(null);
            $table->decimal('freshpress_cut', 8, 2);



            $table->integer('influencer_id')->unsigned()->index();
            $table->foreign('influencer_id')->references('id')->on('influencers');

            $table->integer('opportunity_id')->unsigned()->index();
            $table->foreign('opportunity_id')->references('id')->on('opportunities');


            $table->datetime('accepted_at')->nullable()->default(null)->index();
            $table->datetime('rejected_at')->nullable()->default(null)->index();
            $table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
            $table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->index();
            $table->datetime('deleted_at')->nullable()->default(null)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bids');
    }
}
