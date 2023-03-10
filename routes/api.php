<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\RegionController;
use App\Http\Controllers\API\RajaOngkirController;
use App\Http\Controllers\API\APIController;
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
// TODO: DELETE
    Route::get('provinces', [RegionController::class, 'provinces']);
    Route::get('cities', [RegionController::class, 'cities']);
    Route::get('cities/{province_id}', [RegionController::class, 'citiesByProvince']);
    Route::get('districts/{city_id}', [RegionController::class, 'districts']);

Route::get('rajaongkir/provinces', [RajaOngkirController::class, 'provinces']);
Route::get('rajaongkir/cities/{province_id}', [RajaOngkirController::class, 'cities']);
Route::get('rajaongkir/subdistricts/{city_id}', [RajaOngkirController::class, 'subdistricts']);
Route::get('rajaongkir/costs', [RajaOngkirController::class, 'costs']);
Route::get('rajaongkir/couriers', [RajaOngkirController::class, 'couriers']);

Route::get('invoice/amount/{InvoiceUUID}', [APIController::class, 'invoiceAmount']);
Route::post('batch_order/update', [APIController::class, 'updateBatchOrder']);
Route::post('status_item/update', [APIController::class, 'updateStatusItem']);
Route::post('keterangan/update', [APIController::class, 'updateKeterangan']);
Route::post('no_resi/update', [APIController::class, 'updateNoResi']);
Route::post('status_withdrawal/update', [APIController::class, 'updateStatusWithdrawal']);
