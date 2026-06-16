Ini adalah view produk.<br/>
Data ditampilkan dalam bentuk tabel.<br/>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <td>Nama Produk</td>
        <td>Warna</td>
        <td>Ukuran</td>
        <td>Jumlah Stok</td>
    </tr>
    <tr>
        <td>{{ $nama_produk }}</td>
        <td>{{ $warna }}</td>
        <td>{{ $ukuran }}</td>
        <td>{{ $stok }}</td>
    </tr>
</table>