<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Site\SiteBookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\authorController;
use App\Http\Controllers\Site\PagesController;



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
Route::get('admin/login', [AdminAuthController::class, 'index']);
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('login.admin');

Route::group(['middleware' => 'isAdmin','prefix' => 'admin'], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
    Route::resource('admins', AdminController::class);
});

///////Admin controllers/////
Route::resource('authors', authorController::class);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/users/inactive/{admin}', [UserController::class,"Inactive"])->name('Inactive');
Route::get('/users/active/{admin}', [UserController::class,"Active"])->name('Active');

// Route::resource('admins/admin','App\Http\Controllers\admincontroller');

// Route::get('/admins/admin', [admincontroller::class,"index"])->name('admins.index');
// Route::get('/admins/{admin}', [admincontroller::class,"show"])->name('admins.show');

// Route::get('admins/admin/create', [admincontroller::class,"create"])->name('admin.create');
// Route::get('admins/admin', [admincontroller::class,"store"])->name('admins.store');

Route::resource('users', UserController::class);


///////Site Controllers//////
Route::group(array('prefix' => 'site'), function () {
    Route::get('/books', [SiteBookController::class, 'books'])->name('books');
    Route::get('/profile', [UserController::class, 'EditProfile'])->name('profile');
    Route::post('/profile-update',[UserController::class, 'updateProfile'])->name('profile-update');

    Route::get('/catbook/{id}/', [CatBooksController::class, 'CatBook']);

    Route::get('favourites', [FavouriteController::class, 'index']);

    Route::get('/category/{id}', [PagesController::class,'viewCategory'])->name('category');
    Route::get('/book/{id}',[PagesController::class,'viewBook'])->name('book');

    });