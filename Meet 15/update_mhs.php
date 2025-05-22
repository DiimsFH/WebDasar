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
        <h1>Form Edit Mahasiswa</h1>
        <?php
            include 'koneksi.php';
            $id = $_GET['id'];
            $mahasiswa = $koneksi->query("SELECT * FROM tabel_mahasiswa where id = '$id'");
            $row = $mahasiswa->fetch_assoc();
        
        ?>
        <form action="proses_mhs.php" method="POST">
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input value="<?=$row['nim']?>" type="nim" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">NAMA</label>
                <input value="<?=$row['nama']?>" type="nama" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">EMAIL</label>
                <input value="<?=$row['email']?>" type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">ALAMAT</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" require><?=$row['alamat']?>
                </textarea>
            </div>
            <input class="btn btn-dark" type="submit" name="update" value="Simpan">
            <a href="data_mhs.php" class="btn btn-dark">Kembali</a> 
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>