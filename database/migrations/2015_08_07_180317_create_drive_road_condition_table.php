<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveRoadConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive_road_condition', function (Blueprint $table) {
            $table->integer('drive_id')->unsigned();
            $table->integer('condition_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('drive_road_condition', function (Blueprint $table) {
            $table->foreign('drive_id')->references('id')->on('drives')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('condition_id')->references('id')->on('road_conditions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drive_road_condition');
    }
}
