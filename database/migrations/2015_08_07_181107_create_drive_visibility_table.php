<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveVisibility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive_visibility', function (Blueprint $table) {
            $table->integer('drive_id')->unsigned();
            $table->integer('visibility_id')->unsigned();
            $table->timestamps();

            $table->foreign('drive_id')->references('drives')->on('id')->onDelete('cascade');
            $table->foreign('visibility_id')->references('visibility')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drive_visibility');
    }
}
