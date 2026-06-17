<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return redirect('/route-biodata');
});

Route::get('/route-biodata', function () {
    $data['nim'] = '10522145';
    $data['nama'] = 'Shafira Qosamah';
    $data['kelas'] = 'IS4';
    $data['jurusan'] = 'Sistem Informasi';
    $data['alamat'] = 'Jalan Babakan Sukatma no 1';

    return view('view-biodata', $data);
});

Route::get('/route-dosen', function () {
    $nip = '4127.70.26.124';
    $nidn = '0423019401';
    $nama = 'Ferry Stephanus Suwita';
    $tempat_lahir = 'Bandung';
    $tanggal_lahir = '1 Januari 1985';

    return view('view-dosen', compact('nip', 'nidn', 'nama', 'tempat_lahir', 'tanggal_lahir'));
});

Route::get('/route-produk', function () {
    $nama_produk = 'Sepatu Muslimah';
    $warna = 'Maroon';
    $ukuran = '39'; 
    $stok = '100';

    return view('view-produk', compact('nama_produk', 'warna', 'ukuran', 'stok'));
});

// ROUTE PELANGGAN

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/create', [PelangganController::class, 'create']);
Route::post('/pelanggan/create', [PelangganController::class, 'store']);
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit']);
Route::post('/pelanggan/{id}/update', [PelangganController::class, 'update']);
Route::post('/pelanggan/{id}/delete', [PelangganController::class, 'destroy']);

// INI ROUTE PRODUK
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk/create', [ProdukController::class, 'store']);

Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
Route::post('/produk/{id}/update', [ProdukController::class, 'update']);
Route::post('/produk/{id}/delete', [ProdukController::class, 'destroy']);

// INI ROUTE KATEGORI


Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori/create', [KategoriController::class, 'store']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
Route::post('/kategori/{id}/update', [KategoriController::class, 'update']);
Route::post('/kategori/{id}/delete', [KategoriController::class, 'destroy']);