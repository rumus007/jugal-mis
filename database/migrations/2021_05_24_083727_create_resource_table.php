<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::RESOURCE, function (Blueprint $table) {
            $table->id();
            $table->integer('resource_type_id');
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('locallevel')->nullable();
            $table->string('locallevel_code')->nullable();
            $table->string('ward')->nullable();
            $table->string('tole')->nullable();
            $table->string('tole_misc')->nullable();
            $table->string('address')->nullable();
            $table->string('local_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('website')->nullable();
            $table->text('geo_code')->nullable();
            $table->text('geo_latitude')->nullable();
            $table->text('geo_longitude')->nullable();
            $table->text('geo_altitude')->nullable();
            $table->text('geo_precision')->nullable();
            $table->string('photo')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['resource_type_id']);
        });

        Schema::table(DBTables::RESOURCE, function($table){
            $table->foreign('resource_type_id')->references('id')->on(DBTables::RESOURCE_TYPE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(DBTables::RESOURCE, function($table){
            $table->dropForeign('resource_resource_type_id_foreign');
        });

        Schema::dropIfExists(DBTables::RESOURCE);
    }
}
