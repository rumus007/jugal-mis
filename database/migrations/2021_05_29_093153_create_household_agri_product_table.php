<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdAgriProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::HOUSEHOLD_AGRI_PRODUCT, function (Blueprint $table) {
            $table->integer('household_id')->unsigned()->nullable();
            $table->integer('agri_product_id')->unsigned()->nullable();
        });

        Schema::table(DBTables::HOUSEHOLD_AGRI_PRODUCT,function($table){
            $table->foreign('household_id')->references('id')->on(DBTables::HOUSEHOLD)->onDelete('cascade');
            $table->foreign('agri_product_id')->references('id')->on(DBTables::AGRI_PRODUCT)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::HOUSEHOLD_AGRI_PRODUCT);
    }
}
