<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->char('registration_no', 6)->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();

            // Use CHAR(4) as Laravel doesn't support YEAR type as in MySQL
            $table->char('year', 4)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cars');
    }
}
