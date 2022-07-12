<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCategoryController;

use App\Http\Controllers\AdminBookController;

use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('category', AdminCategoryController::class);

Route::resource('books', AdminBookController::class);

Route::resource('users', UserController::class);

