<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <a href="form-mahasiswa.php" class="btn btn-outline-dark">Form Mahasiswa</a>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'koneksi.php';

                $mahasiswa = $koneksi->query("SELECT * FROM tabel_mahasiswa ORDER BY nim");
                $nomor = 1;
                while ($row = $mahasiswa->fetch_assoc()) {
            ?>
                <tr>
                <th scope="row"><?= $nomor++ ?></th>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td class="text-nowrap">
                    <div class="d-flex gap-1">
                        <a href="update-mahasiswa.php?id=<?= $row['id']?>" class="btn btn-outline-warning btn-sm">Edit</a>
                        <form action="proses-mahasiswa.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id']?>">
                            <input onclick="return confirm('Apakah kamu yakin mau menghapus data ini??')" type="submit" name="delete" value="Hapus" class="btn btn-outline-danger btn-sm">
                        </form>
                    </div>
                </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>