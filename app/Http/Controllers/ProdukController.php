<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.form', compact('kategori'));
    }

    public function store(Request $request)
    {
        $rules = [
            'id_kategori_produk' => 'required',
            'nama_produk'        => 'required|string|max:100',
            'stok'               => 'required|integer|min:1',
            'harga_produk'       => 'required|numeric|min:1000',
            'foto_produk'        => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->storeAs('produk', $namaFile, 'public');
            $validatedData['foto_produk'] = $namaFile;
        }

        Produk::create($validatedData);

        return redirect('/produk')->with('success', 'Data berhasil disimpan');
    }

    public function index(Request $request)
    {
        $q = $request->get('q');

        $result = Produk::when($q, function ($query, $q) {
            $query->whereHas('kategori', function ($q2) use ($q) {
                $q2->where('nama_kategori', 'like', '%'.$q.'%');
            })
            ->orWhere('nama_produk', 'like', '%'.$q.'%')
            ->orWhere('stok', 'like', '%'.$q.'%')
            ->orWhere('harga_produk', 'like', '%'.$q.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(5)
        ->withQueryString();

        return view('produk.list', compact('result', 'q'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();

        return view('produk.form', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $rules = [
            'id_kategori_produk' => 'required',
            'nama_produk'        => 'required|string|max:100',
            'stok'               => 'required|integer|min:1',
            'harga_produk'       => 'required|numeric|min:1000',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->storeAs('produk', $namaFile, 'public');
            $validatedData['foto_produk'] = $namaFile;
        }

        $produk->update($validatedData);

        return redirect('/produk')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect('/produk')->with('success', 'Data berhasil dihapus');
    }
}