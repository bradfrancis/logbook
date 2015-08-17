<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearnerSupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learner_supervisor', function (Blueprint $table) {
            $table->integer('supervisor_id')->unsigned();
            $table->integer('learner_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('learner_supervisor', function (Blueprint $table) {
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
            $table->foreign('learner_id')->references('id')->on('learners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('learner_supervisor');
    }
}
