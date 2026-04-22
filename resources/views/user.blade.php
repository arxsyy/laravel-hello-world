<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <form method="post" action="/user/tambah">
        {{ csrf_field() }}
        
        <label>Username</label>
        <input type="text" name="username" placeholder="Masukan Username">
        <br><br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukan Nama">
        <br><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukan Password">
        <br><br>
        <label>Level ID</label>
        <input type="number" name="level_id" placeholder="Masukan ID Level">
        <br><br>
        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
    
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Level ID</th>
            <th>Level Nama</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->level_id }}</td>
            <td>{{ $d->level->level_nama }}</td>
            <td><a href="/user/ubah/{{ $d->user_id }}">Ubah</a> | <a href="/user/hapus/{{ $d->user_id }}">Hapus</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>