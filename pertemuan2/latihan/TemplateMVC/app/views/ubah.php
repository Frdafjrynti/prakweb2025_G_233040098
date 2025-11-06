<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Ubah Data Pengguna</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Ubah Data Pengguna</h1>

    <form action="<?= BASEURL; ?>/user/ubah" method="post">
      <input type="hidden" name="id" value="<?= htmlspecialchars($data['user']['id']); ?>">

      <div>
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($data['user']['name']); ?>" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['user']['email']); ?>" required>
      </div>
      <button type="submit" class="btn">Ubah Data</button>
      <a href="<?= BASEURL; ?>/user" class="btn">Kembali</a>
    </form>

  </div>
</body>

</html>