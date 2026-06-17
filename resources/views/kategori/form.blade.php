<!DOCTYPE html>
<html>
<head>
    <title>Form Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>{{ isset($kategori) ? 'Edit' : 'Tambah' }} Kategori</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ isset($kategori) ? url('kategori/'.$kategori->id.'/update') : url('kategori/create') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control"
                value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>

</div>
</body>
</html>