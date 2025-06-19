<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Update Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <h1>Edit Data Prodi</h1>
        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $prodi = $koneksi->query("SELECT * FROM tabel_prodi WHERE id = '$id'");
        $row = $prodi->fetch_assoc();

        // Validasi data ditemukan
        if (!$row) {
            echo "<script>alert('Data tidak ditemukan!'); window.location.href = 'index.php?folder=prodi&page=data-prodi';</script>";
            exit;
        }
        ?>

        <form action="prodi/proses-prodi.php" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>" />

            <div class="mb-3">
                <label for="kode_prodi" class="form-label">Kode Prodi</label>
                <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" required value="<?= htmlspecialchars($row['kode_prodi']) ?>" />
            </div>

            <div class="mb-3">
                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required value="<?= htmlspecialchars($row['nama_prodi']) ?>" />
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" required value="<?= htmlspecialchars($row['keterangan']) ?>" />
            </div>

            <input type="submit" class="btn btn-outline-dark" name="update" value="Simpan" />
            <a href="index.php?folder=prodi&page=data-prodi" class="btn btn-outline-warning">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>
