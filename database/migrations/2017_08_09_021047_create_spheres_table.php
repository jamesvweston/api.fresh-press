<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpheresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spheres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->unsignedSmallInteger('percent_male');
            $table->unsignedSmallInteger('percent_female');
            $table->string('logo')->nullable()->default(null);


            $table->integer('influencer_id')->unsigned()->index();
            $table->foreign('influencer_id')->references('id')->on('influencers');

            $table->tinyInteger('age_range_id')->unsigned()->index()->nullable()->default(null);
            $table->foreign('age_range_id')->references('id')->on('age_ranges');

            $table->tinyInteger('country_id')->unsigned()->index()->nullable()->default(null);
            $table->foreign('country_id')->references('id')->on('countries');

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
        Schema::drop('spheres');
    }
}
