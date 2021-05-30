<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_HOME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('household_id');
            $table->string('ward')->nullable();
            $table->string('no_of_rooms')->nullable();
            $table->string('no_of_rented_rooms')->nullable();
            $table->boolean('naksa_pass')->nullable();
            $table->timestamps();
        });

        Schema::table(DBTables::HOUSEHOLD_HOME, function ($table) {
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(DBTables::HOUSEHOLD_HOME, function ($table) {
            $table->dropForeign('household_home_household_id_foreign');
        });

        Schema::dropIfExists(DBTables::HOUSEHOLD_HOME);
    }
}
