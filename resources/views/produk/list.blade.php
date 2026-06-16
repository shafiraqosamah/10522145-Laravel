<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>Data Produk</h2>

    <div class="mb-3">
        <a href="{{ url('produk/create') }}" class="btn btn-primary">Tambah</a>
    </div>

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
            <td>{{ $item->kategori_produk }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->stok }}</td>
                <td>Rp{{ $item->harga_produk }}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</body>
</html>