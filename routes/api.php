<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getNew/{categoryID}/{page}/{perPage}', [ProductController::class, 'getNewProducts']);

// filter
Route::post('/products/filter', [PaginationController::class, 'getProductByFilter']);
Route::post('/products/filter/colors', [PaginationController::class, 'getColorByProductId']);

