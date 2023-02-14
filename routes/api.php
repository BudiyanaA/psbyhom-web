<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\RegionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    Route::get('provinces', [RegionController::class, 'provinces']);
    Route::get('cities', [RegionController::class, 'cities']);
    Route::get('cities/{province_id}', [RegionController::class, 'citiesByProvince']);
    Route::get('districts/{city_id}', [RegionController::class, 'districts']);
