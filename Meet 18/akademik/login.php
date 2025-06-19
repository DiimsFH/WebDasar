<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h1>Hello, Login</h1>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <input type="submit" class="btn btn-primary" name="login" value="Login">
            </form>

            <!-- khusus md 5-->
            <?php
                if (isset($_POST['login'])){
                    include 'koneksi.php';
                    $email = $_POST['email'];
                    $password = md5($_POST['password']); 

                    $cek_login = $koneksi->query("SELECT * FROM tabel_user WHERE email ='$email'
                    AND password='$password'");
                
                if ($cek_login->num_rows == 1){
                    $user = $cek_login->fetch_assoc();
                    $_SESSION['login'] = TRUE;
                    $_SESSION['email'] = $email;
                    $_SESSION['nama'] = $user['nama'];
                    $_SESSION['level'] = $user['level'];
                    header("Location: index.php");
                } else {
                    echo "Email atau Password tidak valid!!";
                }
                }


            ?>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>