<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: signin.php");
    exit;
}


require 'config.php';

$id = $_GET["id"];

if( delpic($id) > 0 ) {
    echo "<script>
    alert('Gambar berhasil dihapus !');
    document.location.href = 'dashboard.php';
</script>";
} else {
    echo "<script>
    alert('Gambar gagal dihapus !');
</script>";
}

?>