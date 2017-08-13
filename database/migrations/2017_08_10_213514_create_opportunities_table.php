<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cover_photo')->nullable()->default(null);
            $table->string('keywords')->nullable()->default(null);
            $table->text('notes')->nullable()->default(null);
            $table->text('pitch')->nullable()->default(null);
            $table->text('deliverable_instructions')->nullable()->default(null);
            $table->text('terms')->nullable()->default(null);
            $table->text('rejected_reason')->nullable()->default(null);
            $table->smallInteger('deliverable_deadline_days')->unsigned();





            $table->integer('advertiser_id')->unsigned()->index();
            $table->foreign('advertiser_id')->references('id')->on('advertisers');

            $table->integer('campaign_id')->unsigned()->index();
            $table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->integer('product_line_id')->unsigned()->index();
            $table->foreign('product_line_id')->references('id')->on('product_lines');

            $table->tinyInteger('deliverable_type_id')->unsigned()->index();
            $table->foreign('deliverable_type_id')->references('id')->on('deliverable_types');


            $table->datetime('apply_by')->index()->nullable()->default(null);
            $table->datetime('published_at')->index()->nullable()->default(null);
            $table->datetime('closed_at')->index()->nullable()->default(null);
            $table->datetime('paused_at')->index()->nullable()->default(null);
            $table->datetime('submitted_at')->index()->nullable()->default(null);
            $table->datetime('rejected_at')->index()->nullable()->default(null);

            $table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
            $table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->index();
            $table->datetime('deleted_at')->index()->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('opportunities');
    }
}
