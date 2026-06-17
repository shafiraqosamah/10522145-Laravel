<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'id_kategori_produk',
        'nama_produk',
        'stok',
        'harga_produk',
        'foto_produk'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori_produk');
    }
}