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
            <a href="form_mhs.php" class="btn btn-dark">Input Mahasiswa</a>
            <form action="proses_mhs.php" method="POST">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                        //query untuk megambil data dari tabel_mahasiswa
                        include 'koneksi.php';
                        $mahasiswa = $koneksi->query("SELECT * FROM tabel_mahasiswa ORDER BY nim");
                        $nomor = 1;
                         //looping
                         while($row = $mahasiswa->fetch_assoc()){
                        ?>
                            <tr>
                            <th scope="row"><?= $nomor++ ?></th> 
                            <td><?= $row['nim'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td class="text-nowrap">
                                <div class="d-flex gap-1">
                                <a href="update_mhs.php?id=<?= $row['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
                                <form action="proses_mhs.php" method="POST">
                                    <input type="hidden" name="id" value="<?$row['id']?>">
                                    <input onclick="return confirm('yakin?')" type="submit" name="delete" value="hapus" class="btn btn-secondary btn-sm"> 
                                </div>
                                </form>
                            </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>