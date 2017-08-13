<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpheresCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spheres_categories', function (Blueprint $table)
        {
            $table->integer('sphere_id')->unsigned()->index();
            $table->foreign('sphere_id')->references('id')->on('spheres');


            $table->integer('sphere_category_id')->unsigned()->index();
            $table->foreign('sphere_category_id')->references('id')->on('sphere_categories');


            $table->primary(['sphere_id', 'sphere_category_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('spheres_categories');
    }
}
