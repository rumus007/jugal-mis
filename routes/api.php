<?php

use App\Http\Controllers\Family\FamilyController;
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

Route::get('/resource/stats', [ResourceController::class, 'getResourceStats'])->name('resource.stats');
Route::get('/resource/mapdata', [ResourceController::class, 'getResourceMapData'])->name('resource.mapdata');

Route::prefix('household')->group(function () {
    Route::get('summary-stats', [HouseholdController::class, 'getSummaryStats'])->name('household.stats');
    Route::get('ownership', [HouseholdController::class, 'getHouseOwnershipData'])->name('household.ownership');
    Route::get('roofing', [HouseholdController::class, 'getRoofingData'])->name('household.roofing');
    Route::get('foundation', [HouseholdController::class, 'getFoundationData'])->name('household.foundation');
    Route::get('house-number', [HouseholdController::class, 'getHouseNumberData'])->name('household.number');
    Route::get('road-type-to-house', [HouseholdController::class, 'getRoadToHouseData'])->name('household.roadToHouse');
    Route::get('road-type', [HouseholdController::class, 'getRoadTypeData'])->name('household.roadType');
    Route::get('house-count', [HouseholdController::class, 'getHouseCount'])->name('household.houseCount');
    Route::get('room-count', [HouseholdController::class, 'getRoomData'])->name('household.roomData');
    Route::get('house-listed', [HouseholdController::class, 'getHouseListedData'])->name('household.houseListed');

    Route::get('source-drinking-water', [HouseholdController::class, 'getWaterSourceData'])->name('household.waterSource');
    Route::get('source-fuel', [HouseholdController::class, 'getFuelSourceData'])->name('household.fuelSource');
    Route::get('source-electricity', [HouseholdController::class, 'getElectricitySourceData'])->name('household.electricitySource');
    Route::get('source-alternate-energy', [HouseholdController::class, 'getAlternateEnergyData'])->name('household.alternateEnergy');
    Route::get('distance-basic-healthcare', [HouseholdController::class, 'getDistanceHealthData'])->name('household.distanceHealth');
    Route::get('distance-fetch-water', [HouseholdController::class, 'getDistanceWaterData'])->name('household.distanceWater');
    Route::get('newborn-birthplace', [HouseholdController::class, 'getBirthplaceData'])->name('household.birthplace');
    
    Route::get('earthquake-resistant', [HouseholdController::class, 'getEarthquakeResistantData'])->name('household.eq');
    Route::get('vulnerable-types', [HouseholdController::class, 'getVulnerabilityData'])->name('household.vulnerable');
    Route::get('risk-mitigation', [HouseholdController::class, 'getRiskMitigationData'])->name('household.risk');

    Route::get('facilities', [HouseholdController::class, 'getFacilitiesData'])->name('household.facilities');
    
    Route::get('toilet-availability', [HouseholdController::class, 'getToiletData'])->name('household.toilet');
    Route::get('toilet-types', [HouseholdController::class, 'getToiletTypeData'])->name('household.toiletType');
    
    Route::get('waste-mgmt', [HouseholdController::class, 'getWasteMgmtData'])->name('household.waste');

    Route::get('test', [HouseholdController::class, 'test'])->name('household.test');
});

Route::prefix('family')->group(function () {
    Route::get('summary-stats', [FamilyController::class, 'getSummaryStats'])->name('family.stats');
    
    Route::get('house-count', [FamilyController::class, 'getHouseCount'])->name('family.houseCount');
    // Route::get('permanent-residency', [FamilyController::class, 'getPermanentResidency'])->name('family.pr');
    Route::get('source-income', [FamilyController::class, 'getIncomeSource'])->name('family.income');
    Route::get('avg-income-expenses-saving', [FamilyController::class, 'getAvgIncomeExpensesData'])->name('family.incomeExpense');
    Route::get('subsistence-income', [FamilyController::class, 'getIncomeSubsistence'])->name('family.incomeSubsistence');
    Route::get('land-in-agriculture', [FamilyController::class, 'getAgriLandData'])->name('family.agriLand');
    Route::get('land-title-agriculture', [FamilyController::class, 'getAgriLandTitleData'])->name('family.agriLandTitle');
    Route::get('banking-details', [FamilyController::class, 'getBankingData'])->name('family.bank');
    Route::get('agricultural-products', [FamilyController::class, 'getAgriProducts'])->name('family.agriProucts');
    Route::get('has-livestocks', [FamilyController::class, 'getLivestocks'])->name('family.livestocks');
    Route::get('livestock-in-family', [FamilyController::class, 'getLivestockData'])->name('family.livestockData');
    Route::get('has-fish-bee-silkworm', [FamilyController::class, 'getFishBeeSilk'])->name('family.fishBeeSilk');
});



Route::prefix('home')->group(function () {
    Route::get('summary-stats', [HomeController::class, 'getSummaryStats'])->name('home.stats');
});
