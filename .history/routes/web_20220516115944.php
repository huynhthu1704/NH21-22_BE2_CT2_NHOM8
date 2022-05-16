<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
<<<<<<< HEAD
use App\Http\Controllers\ProductController;
=======
use App\Http\Controllers\UserController;
>>>>>>> 2ab638b0cfade4d5d56b48ab8dda51516701fc17
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


Route::prefix('auth')->group(function () {

    Route::get('login', [UserController::class, 'show_form_login'])->name('auth.login');
    Route::get('signup', [UserController::class, 'show_form_register'])->name('auth.register');

    Route::post('register-action', [UserController::class, 'process_signup'])->name('auth.register.action');
    Route::post('login-action', [UserController::class, 'process_login'])->name('auth.login.action');

});
