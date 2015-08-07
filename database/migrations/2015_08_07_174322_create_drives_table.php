<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drives', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->decimal('distance_km', 6, 2);
            $table->string('learner', 8);
            $table->string('supervisor', 8);
            $table->integer('car_id')->unsigned();
            $table->timestamps();

            // Add foreign keys
            $table->foreign('learner')->references('learners')->on('license_no');
            $table->foreign('supervisor')->references('supervisors')->on('license_no');
            $table->foreign('car_id')->references('cars')->on('id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drives');
    }
}
