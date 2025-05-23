<?php

// Panggil file koneksi
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    // Insert data ke database dengan query INSERT
    // $sql = "INSERT INTO tabel_mahasiswa (nim, nama, email, alamat) VALUES ('$nim', '$nama', '$email', '$alamat')";
    // $query = $koneksi->query($sql);

    // if ($query === TRUE) {
    //     echo "Data berhasil disimpan!";
    // } else {
    //     echo "Data gagal disimpan!";
    // }

    // ---------------------------------------------------------------------------------------------------------------

   
    $sql_check = "SELECT * FROM tabel_mahasiswa WHERE nim = '$nim' OR email = 'email'";
    $query_check = $koneksi->query($sql_check);
    if($query_check->num_rows > 0){
        echo "<script>
                alert('NIM atau EMAIL sudah terdaftar');
                window.location.href = 'form-mahasiswa.php';
        </script>";
        exit;
    }

     // Insert data dengan prepared statement
    $sql = "INSERT INTO tabel_mahasiswa (nim, nama, email, alamat) VALUES (?, ?, ?, ?)";
    $query_prepare = $koneksi->prepare($sql);
    $query_prepare->bind_param("ssss", $nim, $nama, $email, $alamat);

    if ($query_prepare -> execute()) {
        echo "<script>
                alert('Data Mahasiswa berhasil disimpan');
                window.location.href = 'data-mahasiswa.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa tidak berhasil disimpan');
                window.location.href = 'form-mahasiswa.php';
        </script>";
    }

    $query_prepare -> close();
} elseif (isset($_POST["update"])) {
    $id = $_POST["id"];
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];

    $sql = "UPDATE tabel_mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', alamat = '$alamat' WHERE id = '$id'";
    $query = $koneksi->query($sql);

    if ($query) {
        echo "<script>
                alert('Data Mahasiswa berhasil diubah');
                window.location.href = 'data-mahasiswa.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa tidak berhasil diubah');
                window.location.href = 'update-mahasiswa.php';
        </script>";
    }
} elseif (isset($_POST["delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM tabel_mahasiswa WHERE id = '$id'";;
    $query = $koneksi->query($sql);

    if ($query) {
        echo "<script>
                alert('Data Mahasiswa berhasil dihapus');
                window.location.href = 'data-mahasiswa.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa tidak berhasil dihapus');
                window.location.href = 'data-mahasiswa.php';
        </script>";
    }
}

?>