<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>{{ isset($produk) ? 'Edit Data Produk' : 'Tambah Data Produk' }}</h2>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <b>Perhatian</b>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($produk) ? url('produk/'.$produk->id.'/update') : url('produk/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Kategori Produk</label>
        <div class="col-sm-5">
            <select name="id_kategori_produk" class="form-control">
                <option value="">- Pilih Kategori -</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}"
                        {{ old('id_kategori_produk', $produk->id_kategori_produk ?? '') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-5">
                <input type="text" name="nama_produk" class="form-control"
                value="{{ old('nama_produk', $produk->nama_produk ?? '') }}" placeholder="Nama Produk">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-5">
                <input type="number" name="stok" class="form-control"
                value="{{ old('stok', $produk->stok ?? '') }}" placeholder="Stok">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Harga Produk</label>
            <div class="col-sm-5">
                <input type="number" name="harga_produk" class="form-control"
                value="{{ old('harga_produk', $produk->harga_produk ?? '') }}" placeholder="Harga Produk">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Foto Produk</label>
            <div class="col-sm-5">
                <input type="file" name="foto_produk" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>
</body>
</html>