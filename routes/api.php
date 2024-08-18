<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'v1'], function () {
    Route::post('Login', 'V1\Auth\AuthController@login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post("reserve", "V1\Reservation\ReservationController@reserve");
        Route::post("check-availability", "V1\Reservation\ReservationController@checkAvailability");
        Route::get("meals-list", "V1\Meals\MealsController@list");
        Route::post("order", "V1\Order\OrderController@order");
        Route::post("checkout", "V1\Order\OrderController@checkout");
    });
});

