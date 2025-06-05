<?php
include __DIR__ . '/../koneksi.php';

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    //     $sql = "INSERT INTO tabel_mahasiswa (nim, nama, email, alamat) VALUES ('$nim', '$nama', '$email', '$alamat')";
    //     $query = $koneksi->query($sql);

    //     if($query) {
    //         echo "Data mahasiswa berhasil disimpan";
    //     }else {
    //         echo "Data mahasiswa gagal disimpan";
    //     }
    // }


    //cek duplikat data, nim atau email
    $sql_check = "SELECT * FROM tabel_mahasiswa WHERE nim='$nim' OR email='$email'";
    $query_check = $koneksi->query($sql_check);
    if ($query_check->num_rows > 0) {
        echo "<script>
                    alert('NIM atau email sudah terdaftar!');
                    window.location.href = '../index.php?folder=mahasiswa&page=form-mahasiswa';
                </script>";
        exit;
    }


    //insert data dengan statement prepare
    $sql = "INSERT INTO tabel_mahasiswa (nim, nama, email, alamat) VALUES (?, ?, ?, ?)";
    $query_prepare = $koneksi->prepare($sql);
    $query_prepare->bind_param("ssss", $nim, $nama, $email, $alamat);

    if ($query_prepare->execute()) {
        // echo "Data mahasiswa berhasil disimpan";
        echo "<script>
                    alert('Data mahasiswa berhasil disimpan!');
                    window.location.href = '../index.php?folder=mahasiswa&page=data-mahasiswa';
                </script>";
    } else {
        echo "<script>
                    alert('Data mahasiswa gagal disimpan!');
                    window.location.href = '../index.php?folder=mahasiswa&page=form-mahasiswa';
                </script>";
    }



    $query_prepare->close();
} elseif (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $id = $_POST['id'];


    $sql_check = "SELECT * FROM tabel_mahasiswa 
              WHERE (nim='$nim' OR email='$email') AND id != '$id'";
    $query_check = $koneksi->query($sql_check);
    if ($query_check->num_rows > 0) {
        echo "<script>
            alert('NIM atau email sudah digunakan oleh mahasiswa lain!');
            window.location.href = '/KELAS1/WEBDASAR/akademik/index.php?folder=mahasiswa&page=update-mahasiswa&id=$id';
        </script>";
        exit;
    }

    /*
        $sql_check = "SELECT * FROM tabel_mahasiswa WHERE nim='$nim' OR email='$email'";
        $query_check = $koneksi-> query($sql_check);
        if($query_check->num_rows> 0) {
        echo "<script>
                    alert('NIM atau email sudah terdaftar!');
                    window.location.href = '../index.php?folder=mahasiswa&page=form-mahasiswa';
                </script>";
            exit;
        }*/

    $sql = "UPDATE tabel_mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', alamat = '$alamat' WHERE id = '$id'";
    $query = $koneksi->query($sql);

    if ($query) {
        echo "<script>
                    alert('Data mahasiswa berhasil diperbarui!');
                    window.location.href = 'index.php?folder=mahasiswa&page=data-mahasiswa';
                </script>";
    } else {
        echo "<script>
                    alert('Data mahasiswa gagal diperbarui!');
                    window.location.href = 'index.php?folder=mahasiswa&page=update-mahasiswa';
                </script>";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE from tabel_mahasiswa WHERE id = '$id'";
    $query = $koneksi->query($sql);

    if ($query) {
        echo "<script>
                    alert('Data mahasiswa berhasil dihapus!');
                    window.location.href = '../index.php?folder=mahasiswa&page=data-mahasiswa';
                </script>";
    } else {
        echo "<script>
                    alert('Data mahasiswa gagal dihapus!');
                    window.location.href = '../index.php?folder=mahasiswa&page=data-mahasiswa';
                </script>";
    }
}
