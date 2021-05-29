<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdNewbornBirthplaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_BIRTHPLACE, function (Blueprint $table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->integer('birthplace_id')->unsigned()->nullable();
        });

        Schema::table(DBTables::HOUSEHOLD_BIRTHPLACE,function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD)->onDelete('cascade');
            $table->foreign('birthplace_id')->references('id')->on(DBTables::BIRTHPLACE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD_BIRTHPLACE);
    }
}
