<?php

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

/**
 * @author Ahmed Mohamed
 */

Route::group(['prefix' => 'user', 'middleware' => 'auth:sanctum'], function (){
    Route::get('logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::post('books/search', [\App\Http\Controllers\API\BookController::class, 'search']);
    Route::get('books/favorite', [\App\Http\Controllers\API\BookController::class, 'getFavoriteBook']);
    Route::get('books/payment', [\App\Http\Controllers\API\PaymentController::class, 'getPayedBook']);
    Route::post('books/payment', [\App\Http\Controllers\API\PaymentController::class, 'purchaseBook']);
    Route::post('books/show', [\App\Http\Controllers\API\BookController::class, 'show']);
});

Route::group(['prefix' => 'user'], function (){
    Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);
    Route::post('rate/store', [\App\Http\Controllers\Api\RateController::class, 'store']);
});

