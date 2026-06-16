<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::orderBy('id', 'desc')->get(); 
        return view('pelanggan.list', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required',
            'email' => 'required|email',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->storeAs('pelanggan', $namaFile);
            $data['foto'] = $namaFile;
        }

        Pelanggan::create($data);

        return redirect('/pelanggan/list');
    }
}