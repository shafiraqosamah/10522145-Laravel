<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $result = Kategori::orderBy('id', 'desc')->get();
        return view('kategori.list', compact('result'));
    }

    public function create()
    {
        return view('kategori.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100'
        ]);

        Kategori::create($request->all());

        return redirect('/kategori')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.form', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:100'
        ]);

        $kategori->update($request->all());

        return redirect('/kategori')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('/kategori')->with('success', 'Data berhasil dihapus');
    }
}