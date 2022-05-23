<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Image;
use App\Models\Dimension;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('admin')->group(function () {
    Route::get('index', function () {
        return view('admin.index');
    });
});

Route::get('cart', function ()
{
    return view('cart');
})->name('auth.login');

// User authentication
Route::prefix('auth')->group(function () {

    Route::get('login', [UserController::class, 'show_form_login'])->name('auth.login');
    Route::get('signup', [UserController::class, 'show_form_register'])->name('auth.register');

    Route::post('register-action', [UserController::class, 'process_signup'])->name('auth.register.action');
    Route::post('login-action', [UserController::class, 'process_login'])->name('auth.login.action');

    Route::get('logout-action', [UserController::class, 'logout'])->name('auth.logout.action');
});

Route::prefix('category')->group(function () {
    Route::get('/', [PaginationController::class, 'index'])->name('category');
    Route::get('/category-2-col', [PaginationController::class, 'CategoryTwoCol'])->name('category.2col');
});

// add cart
Route::post('/cart/add', [CartController::class, 'addCart']);
Route::post('/cart/remove', [CartController::class, 'deleteItem']);