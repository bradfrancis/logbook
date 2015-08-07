<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveRoadTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive_road_type', function (Blueprint $table) {
            $table->integer('drive_id')->unsigned();
            $table->integer('road_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('drive_id')->references('drives')->on('id')->onDelete('cascade');
            $table->foreign('road_type_id')->references('road_types')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drive_road_type');
    }
}
