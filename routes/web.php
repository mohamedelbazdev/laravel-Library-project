<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Site\SiteBookController;
use App\Http\Controllers\Site\FavouriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\authorController;
use App\Http\Controllers\Site\PagesController;
use App\Http\Controllers\Site\PaymentController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\isActive;



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


// Route::post('logout', [UserController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return Redirect::to('/site/books');
});

Route::get('admin/login', [AdminAuthController::class, 'index'])->middleware('isGuest');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('login.admin');

Route::group(['middleware' => 'isAdmin','prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::resource('category', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('authors', authorController::class);

});

///////Admin controllers/////

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
/////////////////////////esraaaaa/////////////////////////////
    Route::get('favourites', [FavouriteController::class, 'index'])->name('site.favourite');
    Route::post('add-to-favourite', [FavouriteController::class, 'add']);
    Route::get('count_fav', [FavouriteController::class, 'count']);
    Route::get('delete-fav/{id}', [FavouriteController::class, 'destroy'])->name('fav.destroy');

    Route::get('payments', [PaymentController::class, 'index'])->name('site.payments');
    Route::post('add-to-payments', [PaymentController::class, 'add']);
    Route::get('delete-payment/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');

    Route::get('/category/{id}', [PagesController::class,'viewCategory'])->name('category');
    Route::get('/book/{id}',[PagesController::class,'viewBook'])->name('book');

});

Route::middleware([isActive::class])->group(function(){

    Route::get('home', [HomeController::class,'home']);
});

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
