<?php
//panggil file koneksi
include 'koneksi.php';

if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    /*
    $sql = "INSERT INTO tabel_mahasiswa (nim,nama,email,alamat) VALUES
        ('$nim', '$nama', '$email', '$alamat')";
    $query = $koneksi->query($sql);

    if ($query === TRUE){
        echo "Data mahasiswa berhasil disimpan";
    }else {
        echo "Data gagal disimpan!!";
    }
        */
    
    //insert data dengan statement prepare
    $sql = "INSERT INTO tabel_mahasiswa (nim,nama,email,alamat)
    VALUES (?, ?, ?, ?)";
    $query_prepare = $koneksi->prepare($sql);
    $query_prepare->bind_param("ssss",$nim,$nama,$email,$alamat);

    if ($query_prepare->execute()){
        //echo "Data mahasiswa berhasil disimpan";
        echo "<script>
            alert('Data mahasiswa berhasil disimpan');
            window.location.href = 'data_mhs.php'; 
        </script>"; //menyambungkan ke halaman web yg baru (redairect)
    }else {
        //echo "Data gagal disimpan : " . $query_prepare->error;
        echo "<script>
            alert('Data mahasiswa gagal disimpan');
            window.location.href = 'form_mhs.php'; 
        </script>";
    }
    $query_prepare->close();

}else if(isset($_POST['update'])){
    //block kode untuk update
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $id = $_POST['id'];

    $sql = "UPDATE tabel_mahasiswa SET nim='$nim',nama='$nama', alamat='$alamat'
    WHERE id='$id' ";
    $query = $koneksi->query($sql);

    if ($query){
        //echo "Data mahasiswa berhasil disimpan";
        echo "<script>
            alert('Data mahasiswa berhasil diubah');
            window.location.href = 'data_mhs.php'; 
        </script>"; //menyambungkan ke halaman web yg baru (redairect)
    }else {
        //echo "Data gagal disimpan : " . $query_prepare->error;
        echo "<script>
            alert('Data mahasiswa gagal disimpan');
            window.location.href = 'update_mhs.php?id='.$id; 
        </script>";
    }
}else if(isset($_POST['delete'])){
    $sql = "UPDATE tabel_mahasiswa SET nim='$nim',nama='$nama', alamat='$alamat'
    WHERE id='$id' ";
    $query = $koneksi->query($sql);

    if ($query){
        //echo "Data mahasiswa berhasil disimpan";
        echo "<script>
            alert('Data mahasiswa berhasil dihapus');
            window.location.href = 'data_mhs.php'; 
        </script>"; //menyambungkan ke halaman web yg baru (redairect)
    }else {
        //echo "Data gagal disimpan : " . $query_prepare->error;
        echo "<script>
            alert('Data mahasiswa gagal disimpan');
            window.location.href = 'data_mhs.php?id='.$id; 
        </script>";
    }
    }
?>