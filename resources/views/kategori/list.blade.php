<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>Data Kategori</h2>

    <a href="{{ url('kategori/create') }}" class="btn btn-primary mb-3">Tambah</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>

        @foreach($result as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_kategori }}</td>
            <td>
                <a href="{{ url('kategori/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ url('kategori/'.$item->id.'/delete') }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>
</body>
</html>