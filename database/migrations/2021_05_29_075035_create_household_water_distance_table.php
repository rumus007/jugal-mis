<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdWaterDistanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_WATER_DISTANCE, function (Blueprint $table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->integer('water_distance_id')->unsigned()->nullable();
        });

        Schema::table(DBTables::HOUSEHOLD_WATER_DISTANCE,function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD)->onDelete('cascade');
            $table->foreign('water_distance_id')->references('id')->on(DBTables::WATER_DISTANCE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD_WATER_DISTANCE);
    }
}
