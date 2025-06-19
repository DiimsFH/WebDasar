<h1>Data Prodi</h1>
<a href="index.php?folder=prodi&page=form-prodi" class="btn btn-outline-dark">Form Prodi</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';

        $prodi = $koneksi->query("SELECT * FROM tabel_prodi ORDER BY kode_prodi");
        $nomor = 1;
        while ($row = $prodi->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?= $nomor++ ?></th>
                <td><?= htmlspecialchars($row['kode_prodi']) ?></td>
                <td><?= htmlspecialchars($row['nama_prodi']) ?></td>
                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                <td class="text-nowrap">
                    <div class="d-flex gap-1">
                        <a href="index.php?folder=prodi&page=update-prodi&id=<?= $row['id'] ?>"
                            class="btn btn-outline-warning btn-sm">Edit</a>
                        <form action="prodi/proses-prodi.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input onclick="return confirm('Apakah kamu yakin mau menghapus data ini??')" type="submit"
                                name="delete" value="Hapus" class="btn btn-outline-danger btn-sm">
                        </form>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
