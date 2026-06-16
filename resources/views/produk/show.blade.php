<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data Produk Berhasil Disimpan</h2>
    
    <table class="table table-bordered table-striped" style="max-width: 600px;">
        <tbody>
            <tr>
                <td class="fw-bold" width="30%">Kategori Produk</td>
                <td>{{ $validatedData['kategori_produk'] }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Nama Produk</td>
                <td>{{ $validatedData['nama_produk'] }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Stok</td>
                <td>{{ $validatedData['stok'] }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Harga Produk</td>
                <td>Rp{{ number_format($validatedData['harga_produk'], 0, ',', ',') }}</td>
            </tr>
        </tbody>
    </table>
    
    <a href="{{ url('produk/create') }}" class="btn btn-secondary mt-3">Kembali Isi Form</a>
</div>
</body>
</html>