<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Models\Category;

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

Route::get('/{name?}',[HomeController :: class, 'index']);
Route::get('/product/{id}', function ($id) {
    $categories = Category::all();

    return view('product',['id'=> $id, 'category'=>$categories]);
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
