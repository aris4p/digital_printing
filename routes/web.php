<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return view('index');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/produk', [ProductController::class, 'index'])->name('produk');
    Route::get('/admin/produk/tambah', [ProductController::class, 'show'])->name('produk-tambah');
    Route::post('/admin/produk/tambah', [ProductController::class, 'create'])->name('produk-create');
    Route::get('/admin/produk/edit/{id}', [ProductController::class, 'edit'])->name('produk-edit');
    Route::post('/admin/produk/edit/{id}', [ProductController::class, 'update'])->name('produk-update');
    Route::get('/admin/produk/delete/{id}', [ProductController::class, 'delete'])->name('produk-delete');
    
    Route::get('admin/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('admin/transaksi/print', [TransactionController::class, 'filter_transaction'])->name('filter');
    
    Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware(['guest'])->group(function (){
    
    Route::get('/admin/login', [AuthController::class, 'index'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::post('/payment', [OrderController::class, 'payment'])->name('payment');
Route::get('/order/lacak', [OrderController::class, 'lacak'])->name('lacak_pesanan');
Route::get('/payment/detail', [OrderController::class, 'get_link'])->name('get_link');
Route::get('/payment/invoice/{invoice}', [OrderController::class, 'invoice'])->name('invoice');
Route::get('payment/lihat/{invoice}', [OrderController::class, 'lihat_invoice'])->name('lihat-invoice');
Route::get('payment/cetak/{invoice}', [OrderController::class, 'cetak_invoice'])->name('cetak-invoice');
Route::get('/order', [OrderController::class, 'index'])->name('order');
