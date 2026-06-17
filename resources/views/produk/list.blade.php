<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>Data Produk</h2>

    <!-- SEARCH + TOMBOL TAMBAH -->
    <div class="row mb-3">

        <div class="col-lg-6">
            <form action="{{ url('produk') }}" method="GET">
                <input type="text" name="q" class="form-control" 
                       placeholder="Cari" value="{{ $q ?? '' }}">
            </form>
        </div>

        <div class="col-lg-6 text-end">
            <a href="{{ url('produk/create') }}" class="btn btn-primary">
                Tambah
            </a>
        </div>

    </div>

    <!-- ALERT -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif    

    <!-- TABLE -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto Produk</th>
                <th>Kategori Produk</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($result as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('storage/produk/'.$item->foto_produk) }}" width="100">
                </td>
                <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->stok }}</td>
                <td>Rp{{ $item->harga_produk }}</td>
                <td>
                    <a href="{{ url('produk/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ url('produk/'.$item->id.'/delete') }}" method="POST" style="display: inline;">@csrf
                        <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- PAGINATION -->
    <div class="mt-3">
        {{ $result->links('pagination::bootstrap-5') }}
    </div>

</div>
</body>
</html>