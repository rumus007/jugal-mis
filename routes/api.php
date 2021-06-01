<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Household\HouseholdController;
use App\Http\Controllers\Resource\ResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/resource/stats',[ResourceController::class,'getResourceStats'])->name('resource.stats');
Route::get('/resource/mapdata',[ResourceController::class,'getResourceMapData'])->name('resource.mapdata');

Route::prefix('household')->group(function(){
    Route::get('summary-stats',[HouseholdController::class,'getSummaryStats'])->name('household.stats');
    Route::get('ownership',[HouseholdController::class,'getHouseOwnershipData'])->name('household.ownership');
    Route::get('roofing',[HouseholdController::class,'getRoofingData'])->name('household.roofing');
    Route::get('foundation',[HouseholdController::class,'getFoundationData'])->name('household.foundation');
    Route::get('house-number',[HouseholdController::class,'getHouseNumberData'])->name('household.number');
    Route::get('road-type-to-house',[HouseholdController::class,'getRoadToHouseData'])->name('household.roadToHouse');
    Route::get('road-type',[HouseholdController::class,'getRoadTypeData'])->name('household.roadType');
    Route::get('house-count',[HouseholdController::class,'getHouseCount'])->name('household.houseCount');
    Route::get('room-count',[HouseholdController::class,'getRoomData'])->name('household.roomData');
    Route::get('house-listed',[HouseholdController::class,'getHouseListedData'])->name('household.houseListed');


    Route::get('test',[HouseholdController::class,'test'])->name('household.test');
});

Route::prefix('home')->group(function(){
    Route::get('summary-stats',[HomeController::class,'getSummaryStats'])->name('home.stats');
});

