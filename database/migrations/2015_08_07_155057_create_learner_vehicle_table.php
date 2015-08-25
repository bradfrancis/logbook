<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearnerVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learner_vehicle', function (Blueprint $table) {
            $table->integer('vehicle_id')->unsigned();
            $table->integer('learner_id')->unsigned();
            $table->timestamps();
        });

        // Add foreign keys
        Schema::table('learner_vehicle', function(Blueprint $table) {
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('learner_id')->references('id')->on('learners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('learner_vehicle');
    }
}
