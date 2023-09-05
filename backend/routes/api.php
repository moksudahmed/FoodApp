<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantMenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\DeliveryDriverController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\PaymentTransactionController;
use App\Http\Controllers\PromoCodeController;

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



Route::prefix('restaurants')->group(function () {
    // Create a new restaurant
    Route::post('/', [RestaurantController::class, 'create']);

    // Get a list of all restaurants
    Route::get('/', [RestaurantController::class, 'index']);

    // Get details of a specific restaurant by ID
    Route::get('/{id}', [RestaurantController::class, 'show']);

    // Update restaurant details by ID
    Route::put('/{id}', [RestaurantController::class, 'update']);

    // Delete a restaurant by ID
    Route::delete('/{id}', [RestaurantController::class, 'destroy']);
});


Route::prefix('menu')->group(function () {
    // Create a new menu item
    Route::post('/', [RestaurantMenuController::class, 'create']);

    // Get a list of all menu items
    Route::get('/', [RestaurantMenuController::class, 'index']);

    // Get details of a specific menu item by ID
    Route::get('/{id}', [RestaurantMenuController::class, 'show']);

    // Update menu item details by ID
    Route::put('/{id}', [RestaurantMenuController::class, 'update']);

    // Delete a menu item by ID
    Route::delete('/{id}', [RestaurantMenuController::class, 'destroy']);
});

Route::prefix('orders')->group(function () {
    // Create a new order
    Route::post('/', [OrderController::class, 'create']);

    // Get a list of all orders
    Route::get('/', [OrderController::class, 'index']);

    // Get details of a specific order by ID
    Route::get('/{id}', [OrderController::class, 'show']);

    // Update order details by ID
    Route::put('/{id}', [OrderController::class, 'update']);

    // Delete an order by ID
    Route::delete('/{id}', [OrderController::class, 'destroy']);
});

Route::prefix('order-items')->group(function () {
    // Create a new order item
    Route::post('/', [OrderItemController::class, 'create']);

    // Get a list of all order items
    Route::get('/', [OrderItemController::class, 'index']);

    // Get details of a specific order item by ID
    Route::get('/{id}', [OrderItemController::class, 'show']);

    // Update order item details by ID
    Route::put('/{id}', [OrderItemController::class, 'update']);

    // Delete an order item by ID
    Route::delete('/{id}', [OrderItemController::class, 'destroy']);
});

Route::prefix('delivery-drivers')->group(function () {
    // Create a new delivery driver
    Route::post('/', [DeliveryDriverController::class, 'create']);

    // Get a list of all delivery drivers
    Route::get('/', [DeliveryDriverController::class, 'index']);

    // Get details of a specific delivery driver by ID
    Route::get('/{id}', [DeliveryDriverController::class, 'show']);

    // Update delivery driver details by ID
    Route::put('/{id}', [DeliveryDriverController::class, 'update']);

    // Delete a delivery driver by ID
    Route::delete('/{id}', [DeliveryDriverController::class, 'destroy']);
});


Route::prefix('user-reviews')->group(function () {
    // Create a new user review
    Route::post('/', [UserReviewController::class, 'create']);

    // Get a list of all user reviews
    Route::get('/', [UserReviewController::class, 'index']);

    // Get details of a specific user review by ID
    Route::get('/{id}', [UserReviewController::class, 'show']);

    // Update user review details by ID
    Route::put('/{id}', [UserReviewController::class, 'update']);

    // Delete a user review by ID
    Route::delete('/{id}', [UserReviewController::class, 'destroy']);
});

Route::prefix('payment-transactions')->group(function () {
    // Create a new payment transaction
    Route::post('/', [PaymentTransactionController::class, 'create']);

    // Get a list of all payment transactions
    Route::get('/', [PaymentTransactionController::class, 'index']);

    // Get details of a specific payment transaction by ID
    Route::get('/{id}', [PaymentTransactionController::class, 'show']);

    // Update payment transaction details by ID
    Route::put('/{id}', [PaymentTransactionController::class, 'update']);

    // Delete a payment transaction by ID
    Route::delete('/{id}', [PaymentTransactionController::class, 'destroy']);
});

Route::prefix('promo-codes')->group(function () {
    // Create a new promo code
    Route::post('/', [PromoCodeController::class, 'create']);

    // Get a list of all promo codes
    Route::get('/', [PromoCodeController::class, 'index']);

    // Get details of a specific promo code by ID
    Route::get('/{id}', [PromoCodeController::class, 'show']);

    // Update promo code details by ID
    Route::put('/{id}', [PromoCodeController::class, 'update']);

    // Delete a promo code by ID
    Route::delete('/{id}', [PromoCodeController::class, 'destroy']);
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
