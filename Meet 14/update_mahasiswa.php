<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Form Edit Mahasiswa</h1>
        <?php>
          include 'koneksi.php';  
          $id = $_GET['id'];
          $mahasiswa = $koneksi->query['SELECT * FROM tabel_mahasiswa WHERE id = $id']
          $row = mahasiswa->fetch_assoc();
       ?>
        <a href ="data_mahasiswa2.php" class = "btn btn-success btn-sm" >Data Mahasiswa</a>
        <form action="proses-mahasiswa.php" method="POST">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input value ="$row['nim']" type="number" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input value ="$row['nama']" type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value ="$row['email']" type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="3">
                    <?=$row['alamat'];
                  </textarea>
            </div>
            <input class="btn btn-danger" type="submit" name="submit"></input>
    </div>
    
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>