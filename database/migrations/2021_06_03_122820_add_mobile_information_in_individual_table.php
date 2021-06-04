<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMobileInformationInIndividualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(DBTables::INDIVIDUAL, function (Blueprint $table) {
            $table->string('mobile_no')->nullable()->default(null);
            $table->boolean('has_mobile')->nullable()->default(false);
            $table->string('telecom')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(DBTables::INDIVIDUAL, function (Blueprint $table) {
            $table->dropColumn('mobile_no');
            $table->dropColumn('has_mobile');
            $table->dropColumn('telecom');
        });
    }
}
