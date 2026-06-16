Ini adalah view dosen.<br/>
Data ditampilkan dalam bentuk tabel.<br/>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <td>NIP</td>
        <td>{{ $nip }}</td>
    </tr>
    <tr>
        <td>NIDN</td>
        <td>{{ $nidn }}</td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>{{ $nama }}</td>
    </tr>
    <tr>
        <td>Tempat Lahir</td>
        <td>{{ $tempat_lahir }}</td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td>{{ $tanggal_lahir }}</td>
    </tr>
</table>