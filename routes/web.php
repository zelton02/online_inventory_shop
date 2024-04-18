<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

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

// Authentication Routes
Auth::routes();

// Public Routes
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])-> name('home');

// User Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// User Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);
Route::get('/registration/success', [RegisterController::class, 'registrationSuccess'])->name('registration.success');

Route::middleware(['auth'])->group(function () {
    // Product routes

    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.show');
    Route::post('/product/addToCart/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // Payment routes
    Route::post('payment/process', [PaymentController::class, 'process'])->name('payment.process');

    // User routes
    Route::view('/user/create', 'user.addUser')->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/update/{id}', [UserController::class, 'showUpdate'])->name('user.showpebUpdate');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/{id}', [UserController::class,'checkDetails'])->name('user.checkDetails');

    // Order routes
    Route::get('/orders', [OrderController::class, 'index'])->name('order.show');

    // Logout route
    Route::get('logout', [LoginController::class,'logout']);
});

// Admin protected routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', function () {
        return view('adminDashboard');
    });

    // Products routes
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::view('/product/create', 'product.addProduct')->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('products.store');
    Route::get('/product/update/{id}', [ProductController::class, 'showUpdate'])->name('product.showUpdate');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    // User routes
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    // Orders routes
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/{id}/showUpdate', [OrderController::class, 'showUpdate'])->name('admin.order.showUpdate');
    Route::post('/admin/orders/{id}/update', [OrderController::class, 'update'])->name('admin.order.update');
});
