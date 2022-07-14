<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
<<<<<<< Updated upstream
use App\Http\Controllers\Admin\admincontroller;
use App\Http\Controllers\Site\SiteBookController;
=======
use App\Http\Controllers\Admin\AdminController;

>>>>>>> Stashed changes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;



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
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('loginadmin');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('loginadmin');

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


Route::resource('admins/admin','App\Http\Controllers\admincontroller');

Route::get('/admins/admin', [admincontroller::class,"index"])->name('admins.index');
Route::get('/admins/{admin}', [admincontroller::class,"show"])->name('admins.show');

Route::get('admins/admin/create', [admincontroller::class,"create"])->name('admin.create');
Route::get('admins/admin', [admincontroller::class,"store"])->name('admins.store');

Route::resource('users', UserController::class);



///////Site Controllers//////
Route::group(array('prefix' => 'site'), function () {
    Route::get('/books', [SiteBookController::class, 'books'])->name('books');
    
    });