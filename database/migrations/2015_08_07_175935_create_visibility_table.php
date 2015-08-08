<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisibilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visibility', function (Blueprint $table) {
            $task_keys = ['D', 'N', 'F', 'S'];

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
        Schema::drop('visibility');
    }
}
