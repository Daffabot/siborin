<?php

    session_start();

    if( !isset($_SESSION["login"]) ){
        header("Location: signin.php");
        exit;
    }

    require 'config.php';
    
    $id = $_GET["id"];

    $text = query("SELECT * FROM tabel_text WHERE id = $id")[0];
    

    if( isset($_POST["submit"]) ) {

        if( edittext($_POST) > 0 ) {
            echo "<script>
                    alert('Text berhasil diubah !');
                    document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "<script>
                alert('Text gagal diubah !');
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

    <title>Update Data</title>
  </head>
  <body>

  <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row">
            <div class="shadow p-3 mb-5 bg-body rounded rounded">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Update Data</h4>
                    </div>
                        <div class="card-body">
                            <form method="POST" action="">
                            <input type="hidden" name="id" value="<?= $text['id']; ?>">
                                <div class="mb-3">
                                    <label for="text" class="form-label">Text</label>
                                    <textarea class="form-control" id="text" name="text" rows="5" required><?= $text['text']; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
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