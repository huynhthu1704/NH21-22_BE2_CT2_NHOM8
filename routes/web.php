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
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminUserController as AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('admin/login', [AdminHomeController::class, 'login'])->name('admin.login');
Route::post('/actionlogin', [AdminHomeController::class, 'actionlogin'])->name('admin.actionlogin');
Route::get('admin/logout', [AdminHomeController::class, 'actionLogout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => [AuthAdmin::class]], function () {

        Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
        Route::get('/detail/{id}', [AdminProductController::class, 'getDetail'])->name('admin.product.detail');

     
        
        Route::resource('product', AdminProductController::class)->names([
            'index' => 'admin.product',
            'store' => 'admin.product.add',
            'update' => 'admin.product.update',
            'destroy' => 'admin.product.delete'
        ]);

        Route::resource('color', AdminColorController::class)->names([
            'index' => 'admin.color',
            'store' => 'admin.color.add',
            'update' => 'admin.color.update',
            'destroy' => 'admin.color.delete'
        ]);

        Route::resource('brand', AdminBrandController::class)->names([
            'index' => 'admin.brand',
            'store' => 'admin.brand.add',
            'update' => 'admin.brand.update',
            'destroy' => 'admin.brand.delete'
        ]);

        Route::resource('category', AdminCategoryController::class)->names([
            'index' => 'admin.category',
            'store' => 'admin.category.add',
            'update' => 'admin.category.update',
            'destroy' => 'admin.category.delete'
        ]);

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
                    'index' => 'admin.order',
                    'store' => 'admin.order.add',
                    'update' => 'admin.order.update',
                    'destroy' => 'admin.order.delete',
                ]
            ]
        );
        Route::resource(
            'review',
            AdminReviewController::class,
            [
                'names' => [
                    'index' => 'admin.review',
                    'store' => 'admin.review.add',
                    'update' => 'admin.review.update',
                    'destroy' => 'admin.review.delete',
                ]
            ]
        );
    }
);

// detail
Route::get('detail/product-{id}', [DetailController::class, 'getProductById'])->name('detail');

Route::get('cart', [CartController::class, 'index'])->name('viewcart');
Route::get('checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('placeOrder',[CheckoutController::class,'placeOrder'])->name('placeOrder');
Route::post('shipping',[CheckoutController::class,'getShipping'])->name('shipping');

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
        
        $user = User::select('*')->where('username', '=', md5($googleUser->id))
            ->where('password', '=', md5($googleUser->id . 'google'))->where('role_id', '=', 2)
            ->first();

        if (empty($user)) {
            DB::table('users')->insert([
                'fullname' => $googleUser->name,
                'email' => $googleUser->email,
                'username' => md5($googleUser->id),
                'password' => md5($googleUser->id . 'google'),
                'provider' => 'google',
                'role_id' => 2
            ]);
            $user = User::select('*')->where('username', '=', md5($googleUser->id))
                ->where('password', '=', md5($googleUser->id . 'google'))->where('role_id', '=', 2)
                ->first();
        }
        if ($user->status == 'Blocked') {
            return redirect()->route('auth.login')->withErrors(
                [
                    'loginfail' => 'Account has been locked'
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

        $user = User::select('*')->where('username', '=', md5($facebookUser->id))
            ->where('password', '=', md5($facebookUser->id . 'facebook'))->where('role_id', '=', 2)
            ->first();

        if (empty($user)) {
            $user = DB::table('users')->insert([
                'fullname' => $facebookUser->name,
                'email' => $facebookUser->email,
                'username' => md5($facebookUser->id),
                'password' => md5($facebookUser->id . 'facebook'),
                'provider' => 'facebook',
                'role_id' => 2
            ]);
            $user = User::select('*')->where('username', '=', md5($facebookUser->id))
                ->where('password', '=', md5($facebookUser->id . 'facebook'))->where('role_id', '=', 2)
                ->first();
        }
        if ($user->status == 'Blocked') {
            return redirect()->route('auth.login')->withErrors(
                [
                    'loginfail' => 'Account has been locked'
                ]
            );
        }
        session()->put('user', $user);
        return redirect()->route('index');
    });
});

Route::prefix('category')->group(function () {
    Route::get('/{brandName?}/{brandId?}', [PaginationController::class, 'index'])->name('category');
    Route::get('/category-2-col', [PaginationController::class, 'CategoryTwoCol'])->name('category.2col');
});

// Add cart
Route::prefix('/cart')->group(function () {
    Route::post('add', [CartController::class, 'addCart']);
    Route::post('remove', [CartController::class, 'deleteItem']);
    Route::post('update', [CartController::class, 'updateCart']);
    Route::post('call', [CartController::class, 'callCart']);
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/profile/edit', [DashboardController::class, 'setProfile'])->name('dashboard.edit');
    Route::post('/profile/review', [DashboardController::class, 'review'])->name('dashboard.review');
});

Route::prefix('reset')->group(function ()
{
    Route::get('/', [UserController::class,'forget'])->name('verify.form');
    Route::post('/set', [UserController::class,'setResetSession'])->name('set.reset-session');
    Route::get('/resetPass', [UserController::class,'resetPasswordForm'])->name('reset.form');
    Route::post('/update', [UserController::class,'updatePass'])->name('reset.update');
}); 