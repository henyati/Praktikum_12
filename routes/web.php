<?php

// manggil controller
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;




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

Route::get('/', function () {
    return view('welcome');
});

// buat routing ke halaman dashboard pake controller

Route::get('/dashboard', [DashboardController::class, 'index']);

// buat routing ke halaman produk

Route::get('/produk', [ProdukController::class, 'index']);

// buat routing ke halaman form tambah data menggunakan create

Route::get('/produk/create', [ProdukController::class, 'create']);

// buat routing ke fungsi store

Route::post('/produk/store', [ProdukController::class, 'store']);

// buat routing untuk form edit

Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);

// buat routing untuk validasi data edit update

Route::put('/produk/update/{id}', [ProdukController::class, 'update']);

// buat routing delete data

Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy']);




// buat routing ke halaman home

Route::get('/home', [FrontendController::class, 'index']);

// buat routing ke halaman about

Route::get('/about', [FrontendController::class, 'about']);

