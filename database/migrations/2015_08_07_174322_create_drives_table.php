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
            $table->decimal('distance_km', 6, 2)->nullable();
            $table->string('learner', 8);
            $table->string('supervisor', 8);
            $table->integer('car_id')->unsigned();
            $table->timestamps();
        });

        // Add foreign keys
        Schema::table('drives', function(Blueprint $table) {
            $table->foreign('learner')->references('license_no')->on('learners');
            $table->foreign('supervisor')->references('license_no')->on('supervisors');
            $table->foreign('car_id')->references('id')->on('cars');
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
