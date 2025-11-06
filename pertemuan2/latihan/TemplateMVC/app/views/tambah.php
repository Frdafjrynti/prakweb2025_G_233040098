<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Tambah Data Pengguna</h1>

    <form action="<?= BASEURL; ?>/user/tambah" method="post">
        <div>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit" class="btn">Tambah Data</button>
        <a href="<?= BASEURL; ?>/user" class="btn">Kembali</a>
    </form>

</div>
</body>
</html>