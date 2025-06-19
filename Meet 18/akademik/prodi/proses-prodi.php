<?php
include __DIR__ . '/../koneksi.php';

if (isset($_POST['submit'])) {
  $kode_prodi = $_POST['kode_prodi'];
  $nama_prodi = $_POST['nama_prodi'];
  $keterangan = $_POST['keterangan'];

  // Cek duplikat data, kode_prodi
  $sql_check = "SELECT * FROM tabel_prodi WHERE kode_prodi='$kode_prodi'";
  $query_check = $koneksi->query($sql_check);
  if ($query_check->num_rows > 0) {
    echo "<script>
                alert('Kode Prodi sudah terdaftar!');
                window.location.href = '../index.php?folder=prodi&page=form-prodi';
              </script>";
    exit;
  }

  // Insert data dengan prepared statement
  $sql = "INSERT INTO tabel_prodi (kode_prodi, nama_prodi, keterangan) VALUES (?, ?, ?)";
  $query_prepare = $koneksi->prepare($sql);
  $query_prepare->bind_param("sss", $kode_prodi, $nama_prodi, $keterangan);

  if ($query_prepare->execute()) {
    echo "<script>
                alert('Data prodi berhasil disimpan!');
                window.location.href = '../index.php?folder=prodi&page=data-prodi';
              </script>";
  } else {
    echo "<script>
                alert('Data prodi gagal disimpan!');
                window.location.href = '../index.php?folder=prodi&page=form-prodi';
              </script>";
  }

  $query_prepare->close();

} elseif (isset($_POST['update'])) {
  $kode_prodi = $_POST['kode_prodi'];
  $nama_prodi = $_POST['nama_prodi'];
  $keterangan = $_POST['keterangan'];
  $id = $_POST['id'];

  $sql_check = "SELECT * FROM tabel_prodi 
                WHERE kode_prodi='$kode_prodi' AND id != '$id'";
  $query_check = $koneksi->query($sql_check);
  if ($query_check->num_rows > 0) {
    echo "<script>
              alert('Kode Prodi sudah digunakan di prodi lain!');
              window.location.href = '../index.php?folder=prodi&page=update-prodi&id=$id';
            </script>";
    exit;
  }

  // Update data prodi
  $sql = "UPDATE tabel_prodi SET kode_prodi = '$kode_prodi', nama_prodi = '$nama_prodi', keterangan = '$keterangan' WHERE id = '$id'";
  $query = $koneksi->query($sql);

  if ($query) {
    echo "<script>
              alert('Data prodi berhasil diperbarui!');
              window.location.href = '../index.php?folder=prodi&page=data-prodi';
            </script>";
  } else {
    echo "<script>
              alert('Data prodi gagal diperbarui!');
              window.location.href = '../index.php?folder=prodi&page=update-prodi&id=$id';
            </script>";
  }
} elseif (isset($_POST['delete'])) {
  $id = $_POST['id'];

  $sql = "DELETE FROM tabel_prodi WHERE id = '$id'";
  $query = $koneksi->query($sql);

  if ($query) {
    echo "<script>
                alert('Data prodi berhasil dihapus!');
                window.location.href = '../index.php?folder=prodi&page=data-prodi';
              </script>";
  } else {
    echo "<script>
                alert('Data prodi gagal dihapus!');
                window.location.href = '../index.php?folder=prodi&page=data-prodi';
              </script>";
  }
}
?>
