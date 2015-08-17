<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learners', function (Blueprint $table) {

            // Define table columns
            $table->increments('id')->unsigned();
            $table->string('license_no', 8);
            $table->string('name')->nullable();
            $table->enum('license_level', ['L1', 'L2'])->default('L1');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            // Add foreign key(s)
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('learners');

    }
}
