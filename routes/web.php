<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::get('/home_guest', function () {
        return view('index');
    })->name('home.guest');


    // Route untuk pendaftaran
    Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/submit-registration', [RegistrationController::class, 'register'])->name('register');

    // Route untuk login
    Route::get('/submit-login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/submit-login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    // Route untuk pengguna yang sudah login
    Route::get('/user', [HomeController::class, 'index'])->name('user');
    Route::get('/history', [HomeController::class, 'History'])->name('history');
    
    // Route untuk form pemesanan
    Route::get('/form-pemesanan', [OrderController::class, 'create'])->name('form'); // Menampilkan form pemesanan
    Route::post('/form-pemesanan', [OrderController::class, 'submitOrder'])->name('form-store'); // Menyimpan pesanan ke session
    
    // Route untuk halaman terima kasih setelah pesanan berhasil
    Route::get('/terimakasih', [OrderController::class, 'orderSuccess'])->name('order.success'); // Halaman terimakasih
    
    // Route untuk logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// Route untuk Admin (hanya bisa diakses oleh admin)
Route::middleware(['auth', 'AdminMiddleware'])->group(function () {
    // Halaman Dashboard Admin
    Route::get('/admin/completed-orders', [AdminController::class, 'showCompletedOrders'])->name('admin.completedOrders');

    // Halaman Manajemen Produk (CRUD)
    Route::get('/admin/products', [ProductController::class, 'index'])->name('products'); // Menampilkan produk
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('products.store'); // Menambahkan produk
    Route::put('/admin/products/update/{id}', [ProductController::class, 'update'])->name('products.update'); // Mengupdate produk
    Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete'); // Menghapus produk

    // Halaman Pesanan
    Route::get('/admin/orders', [AdminController::class, 'showOrders'])->name('orders'); // Menampilkan daftar pesanan
    Route::post('/admin/orders/update/{id}', [AdminController::class, 'updateStatus'])->name('admin.orders'); // Mengupdate status pesanan
    Route::get('/admin/dashboard', [AdminController::class, 'showCompletedOrders'])->name('admin.form'); // Menampilkan daftar pesanan
});
