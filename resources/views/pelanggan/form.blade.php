<!DOCTYPE html>
<html>
<head>
    <title>Form Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>{{ isset($pelanggan) ? 'Edit' : 'Tambah' }} Pelanggan</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ isset($pelanggan) ? url('pelanggan/'.$pelanggan->id.'/update') : url('pelanggan/create') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control"
                value="{{ old('nama_lengkap', $pelanggan->nama_lengkap ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">- Pilih -</option>
                <option value="Laki-laki" {{ old('jenis_kelamin', $pelanggan->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $pelanggan->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control"
                value="{{ old('no_hp', $pelanggan->no_hp ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                value="{{ old('email', $pelanggan->email ?? '') }}">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>

</div>
</body>
</html>