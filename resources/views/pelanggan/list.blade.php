<h2>Data Pelanggan</h2>

<a href="/pelanggan" style="padding:8px 12px; background:blue; color:white; text-decoration:none; border-radius:5px;">
    Tambah
</a><br><br>
<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width:100%;">
    <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>No HP</th>
        <th>Email</th>
    </tr>

    @foreach($pelanggan as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <img src="{{ asset('storage/pelanggan/'.$item->foto) }}" width="100">
        </td>
        <td>{{ $item->nama_lengkap }}</td>
        <td>{{ $item->jenis_kelamin }}</td>
        <td>{{ $item->nomor_hp }}</td>
        <td>{{ $item->email }}</td>
    </tr>
    @endforeach
</table>