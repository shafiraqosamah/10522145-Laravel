<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Data Produk</h2>

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

    <!-- PENTING: tambahkan enctype -->
    <form action="{{ url('produk/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Kategori Produk</label>
            <div class="col-sm-5">
                <select name="kategori_produk" class="form-control">
                    <option value="" @selected(old('kategori_produk') == '')>- Pilih Kategori Produk -</option>
                    <option value="Sepatu" @selected(old('kategori_produk') == 'Sepatu')>Sepatu</option>
                    <option value="Baju" @selected(old('kategori_produk') == 'Baju')>Baju</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-5">
                <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}" placeholder="Nama Produk">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-5">
                <input type="number" name="stok" class="form-control" value="{{ old('stok') }}" placeholder="Stok">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Harga Produk</label>
            <div class="col-sm-5">
                <input type="number" name="harga_produk" class="form-control" value="{{ old('harga_produk') }}" placeholder="Harga Produk">
            </div>
        </div>

        <!-- TAMBAHAN UNTUK TUGAS NO 1 -->
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