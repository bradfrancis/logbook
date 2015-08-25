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
            $table->integer('learner_id')->unsigned()->nullable();
            $table->integer('supervisor_id')->unsigned()->nullable();
            $table->integer('car_id')->unsigned()->nullable();
            $table->timestamps();
        });

        // Add foreign keys
        Schema::table('drives', function(Blueprint $table) {
            $table->foreign('learner_id')->references('id')->on('learners')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('supervisors')->onDelete('set null');
            $table->foreign('car_id')->references('id')->on('vehicles')->onDelete('set null');
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
