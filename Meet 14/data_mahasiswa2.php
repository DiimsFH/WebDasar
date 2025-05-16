<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Data Mahasiswa</h1>
            <a href="form-mahasiswa.php" class="btn btn-dark">Input Mahasiswa</a>
            <form action="proses-mahasiswa.php" method="POST">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //query untuk megambil data dari tabel_mahasiswa
                            include 'koneksi.php';
                            $mahasiswa = $koneksi->query("SELECT * FROM tabel_mahasiswa ORDER BY nim");
                            $nomor = 1;
                        //looping
                            while($row = $mahasiswa->fetch_assoc())
                                                                    {
                    ?>
                <tr>
                    <th scope="row"><?= $nomor++ ?></th> 
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td>
                        <a href="update_mahasiswa.pnp?id=<?= $row['id'] ?>"
                            class = "btn btn-warning 
                            btn-sm">Edith</a>
                        <form action="" method="post">
                            <input type="submit" name="delete"
                            value="hapus" class = "btn btn-warning 
                            btn-sm">
                         </form>
                    </td>
                </tr>
                    <?php
                                                                    } 
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>