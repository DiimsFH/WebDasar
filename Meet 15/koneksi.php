<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "db_akademik_tk1b";

$koneksi = new mysqli($server, $user, $password, $db);

if($koneksi->connect_error){
    die("Koneksi error : " . $koneksi->connect_error);
}
?>