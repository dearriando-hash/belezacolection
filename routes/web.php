<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Landing Page)
Route::get('/', [LandingController::class, 'index'])->name('home');

// Route Pemesanan Pelanggan
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

// Route Auth Admin (Guest / Sebelum Login)
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Route Logout (Dapat diakses via GET & POST agar anti-404)
// Route Logout Admin (Mendukung GET dan POST)
Route::match(['get', 'post'], '/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
// Route Halaman Admin (Hanya bisa diakses jika sudah Login)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Menu Produk (Lengkap)
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Menu Kategori (Lengkap)
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Menu Pesanan Admin
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');

    // Menu Pelanggan
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

    // Menu Pengaturan
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');

});

// Redirect /admin ke /admin/login
Route::redirect('/admin', '/admin/login');