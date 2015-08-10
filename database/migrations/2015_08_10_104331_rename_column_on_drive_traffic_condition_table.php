<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnOnDriveTrafficConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drive_traffic_condition', function (Blueprint $table) {
            $table->renameColumn('condition_id', 'traffic_condition_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drive_traffic_condition', function (Blueprint $table) {
            $table->renameColumn('traffic_condition_id', 'condition_id');
        });
    }
}
