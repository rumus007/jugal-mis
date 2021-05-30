<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdBeeFishSilkwormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_BEE_FISH_SILKWORM, function (Blueprint $table) {
            $table->id();
            $table->integer('household_id');
            $table->integer('livestock_id');
            $table->string('total_fish_ponds')->nullable();
            $table->string('area_fish_pond')->nullable();
            $table->string('area_fish_pond_unit')->nullable();
            $table->string('fish_production_kg')->nullable();
            $table->string('total_honeybee_home')->nullable();
            $table->string('honey_production_kg')->nullable();
            $table->string('total_silkworm_koyo')->nullable();
            $table->string('silk_production_kg')->nullable();
            $table->string('total_revenue')->nullable();
            $table->timestamps();
        });

        Schema::table(DBTables::HOUSEHOLD_BEE_FISH_SILKWORM, function($table){
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
        Schema::table(DBTables::HOUSEHOLD_BEE_FISH_SILKWORM, function($table){
            $table->dropForeign('household_bee_fish_silkworm_household_id_foreign');
            $table->dropForeign('household_bee_fish_silkworm_livestock_id_foreign');
        });

        Schema::dropIfExists(DBTables::HOUSEHOLD_BEE_FISH_SILKWORM);
    }
}
