<?php

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
