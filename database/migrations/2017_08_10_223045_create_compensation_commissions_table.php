<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompensationCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensation_commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('rate', 8, 2);
            $table->string('rate_type', 20);
            $table->string('conversion_type', 20);
            $table->decimal('average_order_value', 8, 2);
            $table->string('affiliate_network');
            $table->string('affiliate_program_name');
            $table->text('affiliate_links');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('compensation_commissions');
    }
}
