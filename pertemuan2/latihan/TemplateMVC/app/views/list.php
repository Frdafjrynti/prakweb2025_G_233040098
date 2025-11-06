<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengguna</title>
</head>
<body>
  <div class="container">
    <h1>Daftar Pengguna</h1>
    <a href="<?= BASEURL; ?>/user/tambah" class="btn">Tambah Data User</a>
    <br><br>

    <table class="user-table">
      <head>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
      </head>
      <tbody>
        <?php foreach ($data['users'] as $user): ?>
          <tr>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>

            <td>
              <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="btn-small">Detail</a>
              <a href="<?= BASEURL; ?>/user/ubah/<?= $user['id']; ?>" class="btn-small">Ubah</a>
              <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="btn-small" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>