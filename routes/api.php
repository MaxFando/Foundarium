<?php

use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\ClientController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api', 'middleware' => 'auth.basic'], function() {
    Route::group(['prefix' => 'clients'], function () {
        Route::get('', [ClientController::class, 'index']);
        Route::post('store', [ClientController::class, 'store']);
        Route::delete('delete/{client}', [ClientController::class, 'delete']);
    });

    Route::group(['prefix' => 'cars'], function () {
        Route::get('', [CarController::class, 'index']);
        Route::post('store', [CarController::class, 'store']);
        Route::patch('rent', [CarController::class, 'rent']);
        Route::delete('delete/{car}', [CarController::class, 'delete']);
    });
});
