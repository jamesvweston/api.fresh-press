<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworkConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_connections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('affiliate_id', 50)->index()->nullable()->default(null);
            $table->integer('publisher_id')->unsigned()->nullable()->default(null)->index();
            $table->boolean('is_sync')->default(false)->index();

            $table->tinyInteger('network_id')->unsigned()->index();
            $table->foreign('network_id')->references('id')->on('networks');

            $table->integer('influencer_id')->unsigned()->index();
            $table->foreign('influencer_id')->references('id')->on('influencers');

            $table->datetime('sync_failed_at')->nullable()->default(null)->index();
            $table->text('sync_failed_message')->nullable()->default(null);

            $table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
            $table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('network_connections');
    }
}
