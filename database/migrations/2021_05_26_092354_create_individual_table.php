<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::INDIVIDUAL, function (Blueprint $table) {
            $table->id();
            $table->integer('household_id');
            $table->string('full_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('age_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('religion_other')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('mother_tongue_other')->nullable();
            $table->string('caste')->nullable();
            $table->string('caste_other')->nullable();
            $table->string('education_level')->nullable();
            $table->string('domicile_status')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('martial_status')->nullable();
            $table->boolean('in_different_district')->nullable()->default(false);
            $table->string('location_district')->nullable()->default(null);
            $table->boolean('in_foreign_country')->nullable()->default(false);
            $table->string('foreign_country')->nullable()->default(null);
            $table->string('foreign_employment')->nullable()->default(null);
            $table->string('disability_status')->nullable();
            $table->string('health_status')->nullable();
            $table->string('relationship_to_family_head')->nullable();
            $table->string('training_taken')->nullable();
            $table->timestamps();
        });

        Schema::table(DBTables::INDIVIDUAL, function($table){
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
        Schema::table(DBTables::INDIVIDUAL, function($table){
            $table->dropForeign('individual_household_id_foreign');
        });

        Schema::dropIfExists(DBTables::INDIVIDUAL);
    }
}
