<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveTrafficConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive_traffic_condition', function (Blueprint $table) {
            $table->integer('drive_id')->unsigned();
            $table->integer('condition_id')->unsigned();
            $table->timestamps();

            $table->foreign('drive_id')->references('drives')->on('id')->onDelete('cascade');
            $table->foreign('condition_id')->references('traffic_conditions')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drive_traffic_condition');
    }
}
