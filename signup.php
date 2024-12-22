<?php

include 'config.php';

if( isset($_POST["signup"]) ) {

    global $conn;

    if( signup($_POST) > 0 ) {
        echo "<script>
                alert('Berhasil membuat akun !');
                document.location.href = 'signin.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }

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

    <title>Sign Up</title>
  </head>
  <body>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row">
            <div class="shadow p-3 mb-5 bg-body rounded rounded">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Sign up</h4>
                    </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="username" name="username" class="form-control" id="username" aria-describedby="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <div class="mb-3">
                                    <label for="password2" class="form-label">Confirm Password</label>
                                    <input type="password" name="password2" class="form-control" id="password2">
                                </div>
                                <div class="mb-3 float-right">
                                    <div class="text-muted">
                                        Have an account?
                                        <a href="signin.php" class="text-decoration-none">Login</a>
                                    </div>
                                </div>
                                <button type="submit" 
                                name="signup" class="btn btn-primary">Sign Up</button>
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