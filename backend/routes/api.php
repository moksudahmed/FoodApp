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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/hello', function (){
    return "Hello World";
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('/restaurants', 'RestaurantController@store');
    Route::put('/restaurants/{id}', 'RestaurantController@update');
});


Route::middleware('auth:api')->group(function () {
    Route::post('/orders', 'OrderController@store');
    Route::get('/orders/{id}', 'OrderController@show');
});

Route::middleware('auth:api')->group(function () {
    Route::post('/restaurant-menus', 'RestaurantMenuController@store');
    Route::put('/restaurant-menus/{id}', 'RestaurantMenuController@update');
    Route::get('/restaurant-menus/{id}', 'RestaurantMenuController@show');
});

Route::middleware('auth:api')->group(function () {
    Route::post('/delivery-drivers', 'DeliveryDriverController@store');
    Route::put('/delivery-drivers/{id}', 'DeliveryDriverController@update');
    Route::get('/delivery-drivers/{id}', 'DeliveryDriverController@show');
});

Route::middleware('auth:api')->group(function () {
    Route::post('/user-reviews', 'UserReviewController@store');
    Route::get('/user-reviews/{id}', 'UserReviewController@show');
});

Route::middleware('auth:api')->group(function () {
    Route::post('/payment-transactions', 'PaymentTransactionController@store');
    Route::get('/payment-transactions/{id}', 'PaymentTransactionController@show');
});

Route::middleware('auth:api')->group(function () {
    Route::post('/promo-codes', 'PromoCodeController@store');
    Route::put('/promo-codes/{id}', 'PromoCodeController@update');
    Route::get('/promo-codes/{id}', 'PromoCodeController@show');
});
