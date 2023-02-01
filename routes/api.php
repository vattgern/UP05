<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/signUp', [AuthController::class, 'signUp']);
Route::post('/signIn', [AuthController::class, 'signIn']);
Route::post('/logout', [AuthController::class, 'logout']);



// Для админа
Route::group(['middleware' => 'admin'], function(){
    Route::post('/product', [ProductController::class, 'store']);
});

// Для клиента
Route::group(['middleware'=> 'user'], function(){
    // Все товары
    Route::get('/products', [ProductController::class, 'all']);

    // Корзина
    Route::get('/cart/{product_id}', [BasketController::class, 'store']);
    Route::get('/cart', [BasketController::class,'all']);
    Route::delete('/cart/{id}',[BasketController::class, 'destroy']);

    // Оформление заказа
    Route::post('/order', [OrderController::class, 'store']);
    // Наши заказы
    Route::get('/order',[OrderController::class, 'all']);
});


