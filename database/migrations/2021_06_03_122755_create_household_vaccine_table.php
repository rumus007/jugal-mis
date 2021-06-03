<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdVaccineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_VACCINE, function (Blueprint $table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->integer('vaccine_id')->unsigned()->nullable();
        });

        Schema::table(DBTables::HOUSEHOLD_VACCINE,function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD)->onDelete('cascade');
            $table->foreign('vaccine_id')->references('id')->on(DBTables::VACCINE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD_VACCINE);
    }
}
