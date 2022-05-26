<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
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

Route::get('/{name?}', [HomeController::class, 'index'])->name('index');

Route::get('/product/{id}', function ($id) {
    $categories = Category::all();
    $product = Product::find($id);
    $colors = Color::all();
    $color = Color::find($id);
    $images = Image::where('product_id', $id)->get();
    $dimension = Dimension::find($id);
    return view('product', ['product' => $product, 'categories' => $categories, 'colors' => $colors, 'color' => $color, 'images' => $images, 'dimension' => $dimension]);
});

// User authentication

Route::prefix('admin')->group(function() {
    Route::get('index', function() {
        return view('admin.index');
    });
    Route::get('data', function() {
        return view('admin.data');
    });
});
Route::prefix('auth')->group(function () {

    Route::get('login', [UserController::class, 'show_form_login'])->name('auth.login');
    Route::get('signup', [UserController::class, 'show_form_register'])->name('auth.register');

    Route::post('register-action', [UserController::class, 'process_signup'])->name('auth.register.action');
    Route::post('login-action', [UserController::class, 'process_login'])->name('auth.login.action');

});
