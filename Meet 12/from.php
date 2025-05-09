<html lang="en">
    <head>

    </head>
    <body>
        <h1>Penanganan Form</h1>
        <form action ="postform.php"method="POST">
            <label for"">Nama :</label>
            <input for = "text" name="nama"><br></br>
            <label for = "">Usia :</label>
            <input type = "number" name="usia"><br></br>
            <input type ="submit" name="tombol" value="simpan">
        </form>
        <?php
            if(isset($_GET['tombol'])){
                echo "Nama : ".$_GET['nama']."<br>";
                echo "Usia : ".$_GET['usia']."<br>";
            } 
        ?>
    </body>
</html>