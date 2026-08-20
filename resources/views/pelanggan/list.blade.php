<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>Data Pelanggan</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- SEARCH + TOMBOL -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        
        <form method="GET" action="{{ url('pelanggan') }}" style="width: 70%;">
            <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari" class="form-control">
        </form>

        <a href="{{ url('pelanggan/create') }}" class="btn btn-primary">Tambah</a>
    </div>

    <!-- TABLE -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($result as $item)
            <tr>
                <td>{{ ($result->currentPage()-1) * $result->perPage() + $loop->iteration }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->nomor_hp }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="{{ url('pelanggan/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ url('pelanggan/'.$item->id.'/delete') }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-end">
        {{ $result->links('pagination::bootstrap-5') }}
    </div>

</div>
</body>
</html>