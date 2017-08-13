<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias')->nullable()->default(null);
            $table->text('description');
            $table->string('logo');
            $table->string('website')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('twitter')->nullable()->default(null);
            $table->string('instagram')->nullable()->default(null);
            $table->string('news_url')->nullable()->default(null);
            $table->string('keywords')->nullable()->default(null);



            $table->integer('advertiser_id')->unsigned()->index()->nullable()->default(null);
            $table->foreign('advertiser_id')->references('id')->on('advertisers');


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
        Schema::drop('product_lines');
    }
}
