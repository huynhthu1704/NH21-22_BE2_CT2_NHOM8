<?php

use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDimensionController;
use App\Http\Controllers\Admin\AdminDiscountController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminColorController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminRatingController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminUserController as AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('admin')->group(
    function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
        Route::get('/product', [AdminProductController::class, 'index'])->name('admin.product');
        Route::get('/brand', [AdminBrandController::class, 'index'])->name('admin.brand');
        Route::get('/category', [AdminCategoryController::class, 'index'])->name('admin.category');
        Route::get('/color', [AdminColorController::class, 'index'])->name('admin.color');
        Route::get('/order', [AdminOrderController::class, 'index'])->name('admin.order');
        Route::get('/review', [AdminRatingController::class, 'index'])->name('admin.review');
        // Route::get('/banner',[AdminBannerController::class,'index'])->name('admin.banner');
        Route::resource(
            'banner',
            AdminBannerController::class,
            [
                'names' => [
                    'index' => 'admin.banner',
                    'store' => 'admin.banner.add',
                    'update' => 'admin.banner.update',
                    'destroy' => 'admin.banner.delete',
                ]
            ]
        );
        Route::resource(
            'discount',
            AdminDiscountController::class,
            [
                'names' => [
                    'index' => 'admin.discount',
                    'store' => 'admin.discount.add',
                    'update' => 'admin.discount.update',
                    'destroy' => 'admin.discount.delete',
                ]
            ]
        );
        Route::resource(
            'user',
            AdminUserController::class,
            [
                'names' => [
                    'index' => 'admin.user',
                    'store' => 'admin.user.add',
                    'update' => 'admin.user.update',
                    'destroy' => 'admin.user.delete',
                ]
            ]
        );
        Route::resource(
            'order',
            AdminOrderController::class,
            [
                'names' => [
                    'index' => 'admin.user',
                    'store' => 'admin.user.add',
                    'update' => 'admin.user.update',
                    'destroy' => 'admin.user.delete',
                ]
            ]
        );
        Route::resource(
            'review',
            AdminReviewController::class,
            [
                'names' => [
                    'index' => 'admin.user',
                    'store' => 'admin.user.add',
                    'update' => 'admin.user.update',
                    'destroy' => 'admin.user.delete',
                ]
            ]
        );
    }
);

// detail
Route::get('detail/product-{id}', [DetailController::class, 'getProductById'])->name('detail');

Route::get('cart', [CartController::class, 'index'])->name('viewcart');

// User authentication
Route::prefix('auth')->group(function () {

    //Normal auth 
    Route::get('login', [UserController::class, 'show_form_login'])->name('auth.login');
    Route::get('signup', [UserController::class, 'show_form_register'])->name('auth.register');
    Route::post('register-action', [UserController::class, 'process_signup'])->name('auth.register.action');
    Route::post('login-action', [UserController::class, 'process_login'])->name('auth.login.action');
    Route::get('logout-action', [UserController::class, 'logout'])->name('auth.logout.action');

    // Socialite auth
    Route::get('/google/redirect', function () {
        return Socialite::driver('google')->redirect();
    })->name('google-login');

    Route::get('/google/callback', function () {
        $googleUser = Socialite::driver('google')->user();


        $user = User::where('username', '=', $googleUser->id)->first();

        if (empty($user)) {
            $user = User::updateOrCreate(
                [
                    'full_name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'username' => $googleUser->id,
                    'password' => $googleUser->id . 'google',
                    'provider' => 'google',
                    'role_id' => 2
                ]
            );
        }

        session()->put('user', $user);
        return redirect()->route('index');
    });

    Route::get('/facebook/redirect', function () {
        return Socialite::driver('facebook')->redirect();
    })->name('facebook-login');

    Route::get('/facebook/callback', function () {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = User::where('username', '=', $facebookUser->id)->first();

        if (empty($user)) {
            $user = User::updateOrCreate(
                [
                    'full_name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'username' => $facebookUser->id,
                    'password' => $facebookUser->id . 'facebook',
                    'provider' => 'facebook',
                    'role_id' => 2
                ]
            );
        }

        // Auth::login($user);
        session()->put('user', $user);
        return redirect()->route('index');
    });
});

Route::prefix('category')->group(function () {
    Route::get('/', [PaginationController::class, 'index'])->name('category');
    Route::get('/category-2-col', [PaginationController::class, 'CategoryTwoCol'])->name('category.2col');
});

// Add cart
Route::post('/cart/add', [CartController::class, 'addCart']);
Route::post('/cart/remove', [CartController::class, 'deleteItem']);
Route::post('/cart/update', [CartController::class, 'updateCart']);
Route::post('/cart/call', [CartController::class, 'callCart']);

// 