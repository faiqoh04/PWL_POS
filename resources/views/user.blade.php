<!DOCTYPE html>
<html>
{{-- <head>
    <title>Data User</title>
</head> --}}
<body>
    <h1>Data User</h1>
    {{-- <table border="1" cellpadding="2", cellspacing="0">
        <tr> --}}
            {{-- <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th> --}}
        {{-- </tr>
        @foreach ($data as $d )
        <tr> --}}
            {{-- <td>{{ $d->user_id }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->level_id }}</td> --}}
            
            {{-- PRAKTIKUM 2.1 JS 4 --}}
            {{-- <td>{{ $data->user_id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->level_id }}</td> --}}

            {{-- PRAKTIKUM 2.3 JS 4 --}}
                {{-- <th>Jumlah Pengguna</th>
        </tr>
        <tr>
            <td>{{ $data }}</td>
                        
        </tr>             --}}
        {{-- @endforeach --}}

        {{-- JS 4 PRAKTIKUM 2.4 --}}

            {{-- <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
        </tr>
        <tr>
            <td>{{ $data->user_id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->level_id }}</td> 
        </tr>        --}}

    {{-- JS 4 PRAKTIKUM 2.6 --}}
    <a href="/user/tambah">+ Tambah User</a>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Nama</td>
            <td>ID Level Pengguna</td>
        {{-- JS 4 PRAKTIKUM 2.7  --}}
            <td>Kode Level</td>
            <td>Nama Level</td>
            <td>Aksi</td>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->level_id }}</td>
            <td> {{$d->level->level_kode}} </td>
            <td> {{$d->level->level_nama}} </td>
            <td>
                <a href="{{ url('/user/ubah/' . $d->user_id) }}">Ubah</a>
                <a href="{{ url('/user/hapus/' . $d->user_id) }}">Hapus</a>
        </tr>
        @endforeach
    </table>
</body>
</html>