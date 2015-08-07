<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarLearnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_learner', function (Blueprint $table) {
            $table->integer('car_id')->unsigned();
            $table->string('license_no', 8);
            $table->timestamps();

            // Add foreign keys
            $table->foreign('car_id')->references('cars')->on('id');
            $table->foreign('license_no')->references('learners')->on('license_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_learner');
    }
}
