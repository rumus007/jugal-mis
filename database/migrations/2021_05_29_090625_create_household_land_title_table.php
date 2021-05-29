<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdLandTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_LAND_TITLE, function (Blueprint $table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->integer('land_title_id')->unsigned()->nullable();
        });

        Schema::table(DBTables::HOUSEHOLD_LAND_TITLE,function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD)->onDelete('cascade');
            $table->foreign('land_title_id')->references('id')->on(DBTables::LAND_TITLE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD_LAND_TITLE);
    }
}
