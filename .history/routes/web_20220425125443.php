<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Route::get('index', function () {
//     return view('index');
// });

// Route::get('/{viewName?}', function ($viewName = 'index') {
//     return view($viewName);
// });

Route::get('/index', [CategoryController :: class, 'getAllCategories' ]);