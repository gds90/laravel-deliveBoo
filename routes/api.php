<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\API\PaymentController;


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


Route::get('/payment/token', [PaymentController::class, 'generateClientToken']);
Route::post('/payment/process', [PaymentController::class, 'processPayment']);


Route::get('/restaurant', [RestaurantController::class, 'index']);
Route::get('/restaurant/{slug}', [RestaurantController::class, 'show']);
Route::get('/restaurant/type/{slug}', [RestaurantController::class, 'get_type_restaurants']);

Route::get('/type', [TypeController::class, 'index']);

// Route::post('/contacts', [LeadController::class, 'store']);
