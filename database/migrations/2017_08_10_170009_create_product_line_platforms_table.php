<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductLinePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_line_platforms', function (Blueprint $table)
        {
            $table->integer('product_line_id')->unsigned()->index();
            $table->foreign('product_line_id')->references('id')->on('product_lines');


            $table->tinyInteger('platform_id')->unsigned()->index();
            $table->foreign('platform_id')->references('id')->on('platforms');


            $table->primary(['product_line_id', 'platform_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_line_platforms');
    }
}
