<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdDisastorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_DISASTOR, function (Blueprint $table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->integer('disastor_id')->unsigned()->nullable();
        });

        Schema::table(DBTables::HOUSEHOLD_DISASTOR,function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD)->onDelete('cascade');
            $table->foreign('disastor_id')->references('id')->on(DBTables::DISASTOR)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD_DISASTOR);
    }
}
