<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdIncomeSrcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_INCOME_SRC, function (Blueprint $table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->integer('income_src_id')->unsigned()->nullable();
        });

        Schema::table(DBTables::HOUSEHOLD_INCOME_SRC,function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD)->onDelete('cascade');
            $table->foreign('income_src_id')->references('id')->on(DBTables::INCOME_SRC)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD_INCOME_SRC);
    }
}
