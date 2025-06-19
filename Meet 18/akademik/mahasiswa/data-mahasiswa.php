<h1>Data Mahasiswa</h1>
<a href="index.php?folder=mahasiswa&page=form-mahasiswa" class="btn btn-success">Input Data Mahasiswa</a>
<form action="mahasiswa/proses-mahasiswa.php" method="POST">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">NAMA</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
              //query untuk megambil data dari tabel_mahasiswa
              include 'koneksi.php';
              $mahasiswa = $koneksi->query("SELECT * FROM tabel_mahasiswa ORDER BY nim");
              $nomor = 1;
              //looping pengambilan data tabel
              while($row = $mahasiswa->fetch_assoc()){
            ?>
            <tr>
                <th scope="row"><?= $nomor++ ?></th>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="index.php?folder=mahasiswa&page=update-mahasiswa&id=<?= $row['id'] ?>"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="mahasiswa/proses-mahasiswa.php" method="POST">
                            <input type="hidden" name="id" value="<?=$row['id']?>">
                            <input onclick="return confirm('apakah anda yakin ingin menghapus data ini?')" type="submit"
                                name="delete" value="Hapus" class="btn btn-danger btn-sm">
                        </form>
                    </div>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>