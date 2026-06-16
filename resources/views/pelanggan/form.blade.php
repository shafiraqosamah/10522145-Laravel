<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Data Pelanggan</h2>

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

    <form action="/pelanggan/store" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-5">
                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-5">
                <select name="jenis_kelamin" class="form-control">
                    <option value="">- Pilih Jenis Kelamin -</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nomor HP</label>
            <div class="col-sm-5">
                <input type="text" name="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-5">
                <input type="file" name="foto" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>