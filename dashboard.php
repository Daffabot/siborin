<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: signin.php");
    exit;
}

include 'config.php';

$text = query("SELECT * FROM tabel_text");
$pic = query("SELECT * FROM tabel_gambar");
$music = query("SELECT * FROM tabel_music");
$vid = query("SELECT * FROM tabel_video");

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Dashboard</title>
</head>

<body>
    <div class="container mt-5 shadow p-3 bg-body rounded rounded">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand fs-3 fw-bold" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-light btn btn-danger">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row mt-5">
            <div class="col">
                <h4>Data Gambar</h4>
                <a class="btn btn-outline-primary mt-3" href="addpic.php">Tambah Data</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($pic as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><img src="<?= "img/" . $row['nama_file']; ?>" style="width: 100px; height=100px;" alt=""></td>
                                <td>
                                    <a class="btn btn-danger" href="delpic.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin?')" ;>Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="col mt-5">
            <h4>Data Text</h4>
            <a class="btn btn-outline-primary mt-3" href="addtext.php">Tambah Data</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Pengumuman</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($text as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td style="width: 40%;"><?= $row["text"] ?></td>
                            <td>
                                <a class="btn btn-primary" href="edittext.php?id=<?= $row["id"] ?>">Ubah</a>
                                <a class="btn btn-danger" href="deltext.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin?');">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> -->
        <div class="row mt-5">
            <div class="col">
                <h4>Data Musik</h4>
                <a class="btn btn-outline-primary mt-3" href="addmusic.php">Tambah Data</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($music as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td style="width: 40%;"><?= $row["file_music"] ?></td>
                                <td>
                                    <a class="btn btn-danger" href="delmusic.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin?')" ;>Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h4>Data Video</h4>
                <a class="btn btn-outline-primary mt-3" href="addvid.php">Tambah Data</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Video</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($vid as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td>
                                <video width="320" height="240" controls>
                                <source src="<?= "./videos/" . $row['nama_file']; ?>" type="video/mp4">
                                Your browser does not support the video tag.
                                </video>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="delvid.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin?')" ;>Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <footer class="text text-center p-3">V3.0 - <a href="https://github.com/Daffabot" target="_blank">Daffabot</a></footer>

    <script src="js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>