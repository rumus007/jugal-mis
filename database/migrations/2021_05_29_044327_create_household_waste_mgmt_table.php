<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdWasteMgmtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_WASTE_MGMT, function (Blueprint $table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->integer('waste_mgmt_id')->unsigned()->nullable();
        });

        Schema::table(DBTables::HOUSEHOLD_WASTE_MGMT,function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD)->onDelete('cascade');
            $table->foreign('waste_mgmt_id')->references('id')->on(DBTables::WASTE_MGMT)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD_WASTE_MGMT);
    }
}
