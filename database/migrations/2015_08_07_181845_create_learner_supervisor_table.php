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
            $table->string('supervisor_license_no', 8);
            $table->string('learner_license_no', 8);
            $table->timestamps();
        });

        Schema::table('learner_supervisor', function (Blueprint $table) {
            $table->foreign('supervisor_license_no')->references('license_no')->on('supervisors');
            $table->foreign('learner_license_no')->references('license_no')->on('learners');
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
