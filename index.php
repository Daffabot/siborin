<?php

require 'config.php';

$text = query("SELECT * FROM tabel_text");
$pic = query("SELECT * FROM tabel_gambar");
$music = query("SELECT * FROM tabel_music");
$vid = query("SELECT * FROM tabel_video");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="./src/css/bootstrap.css" rel="stylesheet" />
    <link href="./src/css/owl.carousel.css" rel="stylesheet" />
    <link href="./src/css/owl.theme.default.css" rel="stylesheet" />


    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        .container-custom {
            height: 100vh;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .nav-custom {
            height: 20vh;
            background-color: #fff;
        }

        .carousel-item {
            height: 50vh;
            overflow: hidden;
        }

        .information {
            height: 22vh;
        }

        .owl-carousel div {
            font-size: 34px;
        }

        .loader-screen {
        height: 100vh;
        width: 100%;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .loader-content {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .loading-bar {
        margin-top: 40px;
        height: 8px;
        width: 300px;
        background-color: #e4e4e4;
      }
      .loading-line {
        height: 100%;
        width: 0;
        background-color: rgb(93, 147, 246);
        animation: loading 3s ease-in;
        animation-fill-mode: forwards;
      }
      .video-container {
        border: 5px solid black;
        max-width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Full layar */
    }

    .video-item {
        width: 100vw;
        height: auto;
        max-height: 100%;
        object-fit: cover;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 3;
    }

    .modalin {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 4;
        display: none;
    }

    .envelope {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        position: absolute;
        perspective: 1000px;
    }

    .envelope__flap {
        z-index: 3;
        position: absolute;
        height: 300px;
        width: 300px;
        overflow: hidden;
        transform-style: preserve-3d;
        transform-origin: top;
        transition: all .5s linear;
    }

    .envelope__flap::before {
        content: '';
        position: absolute;
        top: -205px;
        background-color: #D7D7D7;
        height: 100%;
        width: 100%;
        display: block;
        transform: rotate(45deg);
        border-radius: 8px;
    }

    .envelope__inside {
        z-index: 2;
        position: absolute;
        height: 300px;
        width: 300px;
        overflow: hidden;
    }

    .envelope__inside::before {
        content: '';
        position: absolute;
        top: -210px;
        background-color: #E7E7E7;
        box-shadow: inset 0 0 30px rgba(207, 207, 207, 0.75);
        height: 100%;
        width: 100%;
        display: block;
        transform: rotate(45deg);
        border-radius: 8px;
    }

    .envelope__body {
        z-index: 1;
        background-color: #F2F2F2;
        width: 300px;
        height: 200px;
        border-radius: 0 0 8px 8px;
    }

    .con {
        transition: all .1s linear;
        animation: snor 1s infinite;
    }

    @keyframes openEnvelope {
        0% {}
        25% {
            transform: rotateX(180deg);
        }
        90% {
            transform: rotateX(0);
        }
    }

    @keyframes snor {
        0% {}
        25% {
            transform: rotate(5deg);
        }
        90% {
            transform: rotate(-5deg);
        }
    }

    /* Media query untuk perangkat dengan lebar kecil (misal: mobile) */
    @media (max-width: 768px) {
        .video-item {
            width: 100%;
            height: 100vh; /* Agar video memenuhi layar */
            object-fit: cover; /* Agar video tetap proporsional */
            aspect-ratio: 9 / 16; /* Rasio 9:16 */
        }
    }
      @keyframes loading {
        0% {
          width: 0%;
        }
        75% {
          width: 40%;
        }
        100% {
          width: 100%;
        }
      }
    </style>
    <title>Subang Jawara</title>
</head>

<body>
    <div class="loader-screen">
      <div class="loader-content">
        <div class="img-loader">
          <img src="src/img/logo (1).png" alt="" />
        </div>
        <div class="loading-bar">
          <div class="loading-line"></div>
        </div>
      </div>
    </div>
        <div id="overlay" class="overlay"></div>
        <div class="modalin" id="envelopeModal">
            <div class="envelope" id="open">
                <div class="con">
                    <div class="envelope__flap"></div>
                    <div class="envelope__inside"></div>
                    <div class="envelope__body"></div>
                </div>
            </div>
        </div>
    <div class="p-0 container-custom d-none">
<!--
        <nav class="nav-custom d-flex justify-content-between align-items-center container">
            <div></div>
            <div>
                <img src="./src/img/subang-jawara.png" height="150px" alt="" />
            </div>
            <div>
            </div>
        </nav>
-->
        <!-- carousel -->
        <div class="owl-carousel">
            <?php $i = 1 ?>
                <?php foreach ($pic as $row) : ?>
                        <div style="border: 5px solid black; width: 105%;">  
                            <img src="<?= "img/" . $row['nama_file']; ?>" class="d-block w-100" alt="..." />
                        </div>
                <?php $i++; ?>
            <?php endforeach; ?>
            <?php $i = 1 ?>
                <?php foreach ($vid as $row) : ?>
                    <div class="video-container">
                        <video class="carousel-video video-item" controls loop>
                            <source src="<?= "videos/" . $row['nama_file']; ?>" type="video/mp4">
                            <source src="<?= "videos/" . $row['nama_file']; ?>" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
        <div class="row mt-3 text-center information">
            <div class="col">
                <div class="owl-carousel">
                    <?php $i = 1 ?>
                        <?php foreach ($text as $row) : ?>
                            <div class="p-2">
                                <?= $row["text"] ?>
                            </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="text-white bg-success">
            <marquee behavior="scroll" direction="left">
                <h3>
                    SMKN 1 Subang CEREN Model | We are The First, and Our Commitment is
                    Your Satisfaction
                </h3>
            </marquee>
        </footer>
        <?php $i = 1 ?>
            <?php foreach ($music as $row) : ?>
                <audio class="audioSound" loop>
                    <source src="<?= "files/" . $row['file_music']; ?>" type="audio/mp3">
                </audio>
            <?php $i++; ?>
        <?php endforeach; ?>
    </div>
    <audio id="notifSound" src="./src/notif-sound.mp3" preload="auto"></audio>
    <script src="./src/js/jquery.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="./src/js/scripts.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="./src/js/bootstrap.js"></script>
    <script src="./src/js/owl.carousel.js"></script>
    <script>
        // Mendapatkan ID media terbaru dari PHP
        let latestImageId = <?php 
            $latest_image_result = $conn->query("SELECT id FROM tabel_gambar ORDER BY id DESC LIMIT 1");
            $latest_image = $latest_image_result->fetch_assoc();
            echo $latest_image ? $latest_image['id'] : 'null'; 
        ?>;

        let latestMusicId = <?php 
            $latest_music_result = $conn->query("SELECT id FROM tabel_music ORDER BY id DESC LIMIT 1");
            $latest_music = $latest_music_result->fetch_assoc();
            echo $latest_music ? $latest_music['id'] : 'null'; 
        ?>;

        let latestVideoId = <?php 
            $latest_video_result = $conn->query("SELECT id FROM tabel_video ORDER BY id DESC LIMIT 1");
            $latest_video = $latest_video_result->fetch_assoc();
            echo $latest_video ? $latest_video['id'] : 'null'; 
        ?>;
    </script>

</body>

</html>
