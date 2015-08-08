<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrafficConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic_conditions', function (Blueprint $table) {
            $task_keys = ['M', 'H', 'L'];

            $table->increments('id')->unsigned();
            $table->enum('key', $task_keys);
            $table->string('description');
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
        Schema::drop('traffic_conditions');
    }
}
