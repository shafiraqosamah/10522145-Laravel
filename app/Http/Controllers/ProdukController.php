<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function create()
    {
        return view('produk.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'kategori_produk' => 'required',
            'nama_produk'     => 'required|string|max:100', 
            'stok'            => 'required|integer|min:1',
            'harga_produk'    => 'required|numeric|min:1000',
            'foto_produk'     => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $namaFile = time().'_'.$file->getClientOriginalName();

            // PERBAIKAN DI SINI
            $file->storeAs('produk', $namaFile, 'public');
            $validatedData['foto_produk'] = $namaFile;
        }

        Produk::create($validatedData);

        return redirect('/produk/list');
    }

    public function index()
    {
        $result = Produk::orderBy('id', 'desc')->get();
        return view('produk.list', compact('result'));
    }
}