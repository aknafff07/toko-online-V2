<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;

// Halaman Beranda (Home)
Route::get('/', [ProductController::class, 'home']);

// Halaman Katalog Produk
Route::get('/katalog', [ProductController::class, 'index']);
Route::get('/katalog/{id}', [ProductController::class, 'show']);

// Halaman Statis
Route::get('/tentang-kami', [PageController::class, 'about']);
Route::get('/hubungi-kami', [PageController::class, 'contact']);

use App\Http\Controllers\AdminProductController;

// Route untuk tombol "Masukkan Keranjang"
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart']);
Route::get('/cart', [ProductController::class, 'cart']);
// Route Edit Keranjang
Route::get('/cart/delete/{id}', [ProductController::class, 'deleteItem']);
Route::get('/cart/increase/{id}', [ProductController::class, 'increaseItem']);
Route::get('/cart/decrease/{id}', [ProductController::class, 'decreaseItem']);
// Jalur Halaman Checkout
Route::get('/checkout', [OrderController::class, 'checkout']);
Route::post('/checkout', [OrderController::class, 'store']);
// Route Lihat Invoice
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

// --- ROUTE ADMIN ---

// Halaman Admin (Pesanan)
Route::get('/admin/orders', [AdminController::class, 'index']);
Route::put('/admin/orders/{id}', [AdminController::class, 'updateStatus']);

// Halaman Admin (Katalog Produk CRUD)
Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::get('/admin/products/create', [AdminProductController::class, 'create']);
Route::post('/admin/products', [AdminProductController::class, 'store']);
Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit']);
Route::put('/admin/products/{id}', [AdminProductController::class, 'update']);
Route::delete('/admin/products/{id}', [AdminProductController::class, 'destroy']);
