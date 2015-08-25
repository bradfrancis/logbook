<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateDriveVehicleForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drives', function (Blueprint $table) {
            $table->dropForeign('drives_car_id_foreign');
            $table->renameColumn('car_id', 'vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drives', function (Blueprint $table) {
            $table->dropForeign('drives_vehicle_id_foreign');
            $table->renameColumn('vehicle_id', 'car_id');
            $table->foreign('car_id')->references('id')->on('vehicles')->onDelete('set null');
        });
    }
}
