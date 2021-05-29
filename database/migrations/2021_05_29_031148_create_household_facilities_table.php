<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_FACILITIES, function (Blueprint $table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->integer('facilities_id')->unsigned()->nullable();
        });

        Schema::table(DBTables::HOUSEHOLD_FACILITIES,function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD)->onDelete('cascade');
            $table->foreign('facilities_id')->references('id')->on(DBTables::FACILITIES)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD_FACILITIES);
    }
}
