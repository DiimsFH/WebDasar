<h1>Form Prodi</h1>
<a href="index.php?folder=prodi&page=data-prodi" class="btn btn-outline-dark">Data Prodi</a>
<br><br>

<form action="prodi/proses-prodi.php" method="post">
  <div class="mb-3">
    <label for="kode_prodi" class="form-label">Kode Prodi</label>
    <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" required>
  </div>
  <div class="mb-3">
    <label for="nama_prodi" class="form-label">Nama Prodi</label>
    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
  </div>
  <div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
  </div>
  <input type="submit" class="btn btn-outline-dark" name="submit" value="Simpan">
</form>

