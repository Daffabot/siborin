<?php

session_start();

if( isset($_SESSION["login"])){
    header("Location: dashboard.php");
    exit;
}

require 'config.php';

if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //check username

    if( mysqli_num_rows($result) === 1 ){

        //check password

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            header("Location: dashboard.php");
            exit;
        }

    }

    $error = true;

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row">
            <div class="shadow p-3 mb-5 bg-body rounded rounded">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                        <?php if( isset($error) ) : ?>

                            <p class="text-danger">Username / Password salah !</p>

                        <?php endif; ?>
                    </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="username" class="form-control" id="username" aria-describedby="username" name="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-3 float-right">
                                    <div class="text-muted">
                                        Don't have an account?
                                        <a href="signup.php" class="text-decoration-none">Create One</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <footer class="text text-center pb-3">V1.0 - Pandecoder</footer>
    </div>
    <!-- Bootstrap Script -->
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>