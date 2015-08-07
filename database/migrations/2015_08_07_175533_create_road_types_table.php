<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoadTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road_types', function (Blueprint $table) {

            $task_keys = ['S', 'M', 'C', 'H', 'R', 'G'];

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
        Schema::drop('road_types');
    }
}
