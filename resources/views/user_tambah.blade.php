<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data User</title>
</head>
<body>
    <h1>Tambah Data User</h1>
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
        <a href="/user">Kembali</a>
    </form>
</body>
</html>
