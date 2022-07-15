<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;



Route::get('/', function () {
    return view('index');
});
Route::get('admin/login', [AdminAuthController::class, 'index']);
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('login.admin');

///////Admin controllers/////
Route::resource('category', CategoryController::class);

Route::resource('books', BookController::class);

Route::resource('users', UserController::class);
Route::resource('admins', AdminController::class);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('admins', admincontroller::class);


Route::group(array('prefix' => 'site'), function () {
    Route::get('/books', [SiteBookController::class, 'books'])->name('books');

    });
