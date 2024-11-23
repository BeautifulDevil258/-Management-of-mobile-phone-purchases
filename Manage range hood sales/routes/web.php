<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOderControllerController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Route;

// Routes cho Admin (Middleware admin)
Route::get('/admin', [AdminController::class, 'index']);

// Routes cho Đăng ký và Đăng nhập
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
// Route cho quên mật khẩu

Route::get('/password/reset', [AuthController::class, 'showResetForm'])->name('password.request'); // Hiển thị form nhập email
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email'); // Gửi email có liên kết
Route::get('/password/reset/{token}', [AuthController::class, 'showResetFormWithToken'])->name('password.reset'); // Hiển thị form đặt lại mật khẩu
Route::post('/password/reset', [AuthController::class, 'reset'])->name('password.update'); // Xử lý cập nhật mật khẩu

// Routes cho Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [ProductController::class, 'search'])->name('search');


// Routes Resource cho Categories và Products
Route::resource('product', ProductController::class);
Route::resource('admin/categories', CategoryController::class);
Route::resource('admin/products', AdminProductController::class);

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::post('/upload-image', [AdminProductController::class, 'uploadImage'])->name('upload.image');

// Route hiển thị giỏ hàng
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Route cho trang thanh toán
Route::middleware(['auth'])->group(function () {
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::patch('orders/{id}/', [OrderController::class, 'cancel'])->name('orders.cancel');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/vnpay/return', [OrderController::class, 'vnpayReturn'])->name('vnpay.return');
});

Route::post('/vnpay/process', [OrderController::class, 'processVnpayPayment'])->name('vnpay.process');
Route::get('/vnpay/return', [OrderController::class, 'return'])->name('vnpay.return');
Route::get('/vnpay_return', [OrderController::class, 'vnpayReturn'])->name('vnpay_return');


Route::get('admin/statistics', [StatisticsController::class, 'index'])->name('statistics.index')->middleware('auth');
// Route cho đơn hàng
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/order', AdminOderControllerController::class);
});

// Trong OrderController
Route::patch('/admin/order/{id}', [AdminOderControllerController::class, 'update'])->name('order.update');
Route::get('/admin/order/{id}', [AdminOderControllerController::class, 'show'])->name('admin.order.show');