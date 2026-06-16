<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

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

Route::get('/pelanggan', function () {
    return view('pelanggan.form');
});

Route::post('/pelanggan/store', [App\Http\Controllers\PelangganController::class, 'store']);

Route::get('/pelanggan/list', [App\Http\Controllers\PelangganController::class, 'index']);

// --KODE UNTUK TUGAS Tantangan 2 Controller--
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk/create', [ProdukController::class, 'store']);
Route::get('/produk/list', [ProdukController::class, 'index']);