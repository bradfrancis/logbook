<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnOnDriveRoadConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drive_road_condition', function (Blueprint $table) {
            $table->renameColumn('condition_id', 'road_condition_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drive_road_condition', function (Blueprint $table) {
            $table->renameColumn('road_condition_id', 'condition_id');
        });
    }
}
