<?php

    session_start();
    
    if( !isset($_SESSION["login"]) ){
        header("Location: signin.php");
        exit;
    }
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include 'config.php';

    if( isset($_POST["submit"]) ) {

        if( addvid($_POST) > 0 ) {
            echo "<script>
                    alert('Video berhasil di tambahkan !');
                    document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "<script>
                    alert('Video gagal di tambahkan! Error: ". mysqli_error($conn) ."');
            </script>";
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

    <title>Tambah Data</title>
  </head>
  <body>

  <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row">
            <div class="shadow p-3 mb-5 bg-body rounded rounded">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Tambah Data</h4>
                    </div>
                        <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="file_video" class="form-label">Video</label>
                                <!-- Multiple file input for videos -->
                                <input type="file" class="form-control" id="file_video" name="file_video[]" multiple accept="video/*">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                            <a class="btn btn-outline-primary" href="dashboard.php">Kembali</a>
                        </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
