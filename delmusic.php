<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: signin.php");
    exit;
}


require 'config.php';

$id = $_GET["id"];

if( delmusic($id) > 0 ) {
    echo "<script script>
    alert('Musik berhasil dihapus !');
    document.location.href = 'dashboard.php';
</script>";
} else {
    echo "<script>
    alert('Musik gagal dihapus !');
</script>";
}

?>