<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD, function (Blueprint $table) {
            $table->id();
            $table->string('index');
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('locallevel')->nullable();
            $table->string('locallevel_code')->nullable();
            $table->string('ward')->nullable();
            $table->string('tole')->nullable();
            $table->string('tole_misc')->nullable();
            $table->string('street_name')->nullable();
            $table->string('family_head_name')->nullable();
            $table->string('family_head_gender')->nullable();
            $table->string('family_head_age')->nullable();
            $table->boolean('has_house_number')->nullable();
            $table->string('house_number')->nullable();
            $table->string('type_of_access_to_road')->nullable();
            $table->string('type_of_road')->nullable();
            $table->string('house_count')->nullable();
            $table->string('no_of_rooms')->nullable();
            $table->string('no_of_rented_rooms')->nullable();
            $table->string('house_ownership')->nullable();
            $table->string('roofing')->nullable();
            $table->string('roofing_misc')->nullable();
            $table->string('foundation')->nullable();
            $table->string('foundation_misc')->nullable();
            $table->string('drinking_water')->nullable();
            $table->string('drinking_water_misc')->nullable();
            $table->string('cooking_fuel')->nullable();
            $table->string('cooking_fuel_misc')->nullable();
            $table->string('main_electricity_source')->nullable();
            $table->string('alternative_electricity_source')->nullable();
            $table->string('distance_to_basic_healthcarre')->nullable();
            $table->boolean('is_earthquake_resistant')->nullable();
            $table->boolean('has_risk_mitigation_plans')->nullable();
            $table->boolean('vulnerable_to_national_disaster')->nullable();
            $table->string('toilet_facility')->nullable();
            $table->string('family_member_count')->nullable();
            $table->boolean('is_income_enough')->nullable();
            $table->string('avg_family_income')->nullable();
            $table->string('avg_family_expenditure')->nullable();
            $table->string('avg_family_saving')->nullable();
            $table->string('subsistence_of_income')->nullable();
            $table->boolean('has_bank_account')->nullable();
            $table->boolean('use_of_family_lang_agriculture')->nullable();
            $table->boolean('livestock')->nullable();
            $table->boolean('fish_honeybee_silkworm')->nullable();
            $table->text('geo_code')->nullable();
            $table->text('geo_latitude')->nullable();
            $table->text('geo_longitude')->nullable();
            $table->text('geo_altitude')->nullable();
            $table->text('geo_precision')->nullable();
            $table->string('photo')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD);
    }
}
