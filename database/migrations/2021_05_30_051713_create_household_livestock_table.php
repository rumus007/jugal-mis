<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdLivestockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_LIVESTOCK, function (Blueprint $table) {
            $table->id();
            $table->integer('household_id');
            $table->integer('livestock_id');
            $table->string('number_of_livestock')->nullable();
            $table->string('milk_production_ltr')->nullable();
            $table->string('meat_production_kg')->nullable();
            $table->string('wool_production_kg')->nullable();
            $table->string('bone_skin_production_kg')->nullable();
            $table->string('egg_production_kg')->nullable();
            $table->string('total_revenue')->nullable();
            $table->timestamps();
        });

        Schema::table(DBTables::HOUSEHOLD_LIVESTOCK, function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD);
            $table->foreign('livestock_id')->references('id')->on(DBTables::LIVESTOCK);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(DBTables::HOUSEHOLD_LIVESTOCK, function($table){
            $table->dropForeign('household_livestock_household_id_foreign');
            $table->dropForeign('household_livestock_livestock_id_foreign');
        });

        Schema::dropIfExists(DBTables::HOUSEHOLD_LIVESTOCK);
    }
}
