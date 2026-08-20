<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $result = Pelanggan::when($q, function ($query, $q) {
            $query->where('nama_lengkap', 'like', '%'.$q.'%')
                ->orWhere('jenis_kelamin', 'like', '%'.$q.'%')
                ->orWhere('nomor_hp', 'like', '%'.$q.'%')
                ->orWhere('email', 'like', '%'.$q.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(5)
        ->withQueryString();

        return view('pelanggan.list', compact('result', 'q'));
    }

    public function create()
    {
        return view('pelanggan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required|email'
        ]);

        Pelanggan::create($request->all());

        return redirect('/pelanggan')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.form', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required|email'
        ]);

        $pelanggan->update($request->all());

        return redirect('/pelanggan')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect('/pelanggan')->with('success', 'Data berhasil dihapus');
    }
}