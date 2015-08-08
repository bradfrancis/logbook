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
        });

        Schema::table('drive_road_type', function(Blueprint $table) {
            $table->foreign('drive_id')->references('id')->on('drives')->onDelete('cascade');
            $table->foreign('road_type_id')->references('id')->on('road_types');
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
