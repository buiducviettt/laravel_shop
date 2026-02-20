<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
// use homecontroller
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Frontend\TrendingController;
use App\Http\Controllers\Auth\ForgotPassWordController;
use App\Http\Controllers\Auth\ResetPassWordController;
use App\Http\Controllers\Cart;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');
/* ===== AUTH ===== */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/trending', [TrendingController::class, 'index'])->name('trending');

// forgot password 
Route::get('/forgot-password', [ForgotPassWordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPassWordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])
    ->name('password.update');

// nên dùng prefix để group my-info lại 
Route::middleware('auth')->prefix('my-info')->group(function () {
    // MY PROFILE (giữ nguyên)
    Route::get('/', [AuthController::class, 'showMyInfo'])
        ->name('my-info');
    Route::post('/avatar', [ProfileController::class, 'updateAvatar'])->name('my-info.avatar');
    // ADDRESS
    Route::get('/address', [ProfileController::class, 'address'])
        ->name('my-info.address');
    Route::post('/address', [ProfileController::class, 'storeAddress'])
        ->name('my-info.address.store');
    // xóa địa chỉ 
    Route::delete('/address/{address}', [ProfileController::class, 'deleteAddress'])
        ->name('my-info.address.delete');
    // ORDERS
    Route::get('/orders', [ProfileController::class, 'orders'])
        ->name('my-info.orders');

    // COUPONS
    Route::get('/coupons', [ProfileController::class, 'coupons'])
        ->name('my-info.coupons');

    // MEMBERSHIP
    Route::get('/membership', [ProfileController::class, 'membership'])
        ->name('my-info.membership');
});

// product
// Category
// lấy category 
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

// Product
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{product:slug}', [ProductController::class, 'show'])->name('show');
});
// add to cart 
Route::prefix('cart')->name('cart.')->group(function () {
    Route::post('/add', [CartController::class, 'addToCart'])->name('add');
    Route::post('/buy-now', [CartController::class, 'buyNow'])->name('buy-now');
    Route::get('/mini', [CartController::class, 'miniCart'])->name('mini');
    Route::post('/remove', [CartController::class, 'remove'])->name('remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
});

// checkout 
Route::prefix('checkout')->name('checkout.')->middleware('auth')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/store', [CheckoutController::class, 'store'])->name('store');
});
