<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\admincontroller;
use Illuminate\Support\Facades\Route;



// use Auth;

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


Route::resource('category', CategoryController::class);

Route::resource('books', BookController::class);

Route::resource('users', UserController::class);

Route::resource('admins', admincontroller::class);








Route::resource('admins/admin','App\Http\Controllers\admincontroller');

Route::get('/admins/admin', [admincontroller::class,"index"])->name('admins.index');
Route::get('/admins/{admin}', [admincontroller::class,"show"])->name('admins.show');

Route::get('admins/admin/create', [admincontroller::class,"create"])->name('admin.create');
Route::get('admins/admin', [admincontroller::class,"store"])->name('admins.store');



