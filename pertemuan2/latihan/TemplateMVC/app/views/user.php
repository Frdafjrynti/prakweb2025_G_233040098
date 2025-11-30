<div class="container mt-4">
  <h3>Daftar User</h3>

  <form action="<?= BASEURL; ?>/user/tambah" method="post">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="alamat" placeholder="Alamat" required></textarea>
    <button type="submit">Tambah User</button>
  </form>

  <table border="1" cellpadding="8" cellspacing="0" style="margin-top:20px;">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
    <?php $no = 1;
    foreach ($data['user'] as $user): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $user['nama']; ?></td>
        <td><?= $user['email']; ?></td>
        <td><?= $user['alamat']; ?></td>
        <td>
          <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" onclick="return confirm('Yakin?');">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>