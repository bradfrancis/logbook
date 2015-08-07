<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoadConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road_conditions', function (Blueprint $table) {
            $task_keys = ['S', 'D', 'I', 'W'];

            $table->increments('id')->unsigned();
            $table->enum('key', $task_keys);
            $table->timestamps();

            $table->unique('key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('road_conditions');
    }
}
