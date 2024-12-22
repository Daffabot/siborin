<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: signin.php");
    exit;
}


require 'config.php';

$id = $_GET["id"];

if( delvid($id) > 0 ) {
    echo "<script>
    alert('Video berhasil dihapus !');
    document.location.href = 'dashboard.php';
</script>";
} else {
    echo "<script>
    alert('Video gagal dihapus !');
</script>";
}

?>
