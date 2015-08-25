<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive_task', function (Blueprint $table) {
            $table->integer('drive_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('drive_task', function (Blueprint $table) {
            $table->foreign('drive_id')->references('id')->on('drives')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drive_task');
    }
}
