<?php
    session_start();
//cek apakah user sudah login atau belum
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
        <nav class="navbar navbar-expand-lg" style="background-color:rgb(138, 243, 192);" data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">E - Sia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php?page=home">Home</a>
                </li>
                <li class="nav-item"> <!--Link untuk ke tabel mahasiswa-->
                <a class="nav-link" href="index.php?folder=mahasiswa&page=data_mhs">Mahasiswa</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['nama']?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><?= $_SESSION['email']?></a></li>
                    <li><a class="dropdown-item" href="#"><?= $_SESSION['level']?></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
    <div class="container my-4">
        <!--Konten web berada disini-->
        <?php
        include 'koneksi.php'; 

            $folder = basename($_GET['folder']?? '');
            $page = basename($_GET['page']??'home');

            $file = $folder ? "$folder/$page.php": "$page.php";

            if(file_exists($file)){
                include $file;
            } else{
                echo "Halaman tidak tersedia.";
            }

        ?>
    </div>
    <!--Foother -->
    <div class="bg text-black text-center py-2" style="background-color:rgb(138, 243, 192);">
        Copyright &copy; <?= date('Y')?> by Dimas Fachri Husaini
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>