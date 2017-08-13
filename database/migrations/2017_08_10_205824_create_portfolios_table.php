<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->string('url');
            $table->boolean('is_unverified_outlet')->index();

            $table->integer('sphere_id')->unsigned()->index();
            $table->foreign('sphere_id')->references('id')->on('spheres');

            $table->tinyInteger('portfolio_type_id')->unsigned()->index();
            $table->foreign('portfolio_type_id')->references('id')->on('portfolio_types');

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
        Schema::drop('portfolios');
    }
}
