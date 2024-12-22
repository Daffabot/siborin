<?php
// untuk di raspberry pi
// $conn = mysqli_connect("localhost", "root", "siborin2022", "siborin_db");
$conn = mysqli_connect("localhost", "root", "", "nesas");

function signup($data){
    
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // check username

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Username sudah terdaftar !');
        </script>";
        return false;
    }

    // confirm password

    if ( $password !== $password2 ) {
        echo "<script>
                alert('Password tidak sesuai !');
            </script>";
        return false;
    }

    // encrypt password

    $password = password_hash($password, PASSWORD_DEFAULT);

    // add user to database

    mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);

}

function query($query){

    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;

}

function addtext($data){

    global $conn;

    $text = htmlspecialchars($data["text"]);

    $query = "INSERT INTO tabel_text
                VALUES
            (NULL, '$text')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function addpic($data) {
    global $conn;

    $nama_files = upload();

    if (!$nama_files) {
        return false;
    }

    foreach ($nama_files as $nama_file) {
        $query = "INSERT INTO tabel_gambar (id, nama_file) VALUES (NULL, '$nama_file')";
        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function upload() {
    $files = $_FILES['nama_file'];
    $file_names = [];

    foreach ($files['name'] as $index => $filename) {
        $size = $files['size'][$index];
        $error = $files['error'][$index];
        $tmp_file = $files['tmp_name'][$index];

        if ($error === 4) {
            echo "<script>
                alert('Pilih gambar terlebih dahulu !');
                document.location.href = 'addpic.php';
            </script>";
            return false;
        }

        $ext = ['jpg', 'jpeg', 'png'];
        $extpic = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($extpic, $ext)) {
            echo "<script>
                alert('File yang anda upload bukan gambar !');
                document.location.href = 'addpic.php';
            </script>";
            return false;
        }

        $newfilename = uniqid() . '.' . $extpic;
        $dirupload = "img/";

        if (move_uploaded_file($tmp_file, $dirupload . $newfilename)) {
            $file_names[] = $newfilename;
        } else {
            return false;
        }
    }

    return $file_names; // Return array of file names
}

function delpic($id){

    global $conn;

    mysqli_query($conn, "DELETE FROM tabel_gambar WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function deltext($id){

    global $conn;

    mysqli_query($conn, "DELETE FROM tabel_text WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edittext($data){

    global $conn;

    $id = $data["id"];
    $text = htmlspecialchars($data["text"]);

    $query = "UPDATE tabel_text SET 
                text = '$text'
            WHERE id=$id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

// add music

function addmusic($data) {
    global $conn;

    $file_music = uploadmusic(); // Upload beberapa file musik

    if (!$file_music) {
        return false;
    }

    // Lakukan insert untuk setiap file musik
    foreach ($file_music as $music) {
        $query = "INSERT INTO tabel_music (id, file_music) VALUES (NULL, '$music')";
        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function uploadmusic() {
    if (!isset($_FILES['file_music']) || empty($_FILES['file_music']['name'][0])) {
        echo "<script>
                alert('Pilih file musik terlebih dahulu!');
            </script>";
        return false;
    }

    $files = $_FILES['file_music'];
    $file_names = [];

    foreach ($files['name'] as $index => $filename) {
        $size = $files['size'][$index];
        $error = $files['error'][$index];
        $tmp_file = $files['tmp_name'][$index];

        // Cek apakah ada error saat upload
        if ($error !== UPLOAD_ERR_OK) {
            echo "<script>
                    alert('Terjadi error saat upload file musik! Error code: $error');
                </script>";
            return false;
        }

        // Cek ukuran file musik (misalnya maksimal 15MB)
        if ($size > 15000000) {
            echo "<script>
                    alert('Ukuran file terlalu besar! Maksimal 15MB.');
                </script>";
            return false;
        }

        // Definisikan ekstensi yang diperbolehkan
        $ext = ['mp3', 'wav', 'flac'];
        $extfile = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($extfile, $ext)) {
            echo "<script>
                    alert('Format file tidak diperbolehkan! Hanya mp3, wav, atau flac.');
                </script>";
            return false;
        }

        // Buat nama file baru yang unik
        $newfilename = uniqid() . '.' . $extfile;
        $dirupload = "files/";

        // Pindahkan file ke direktori tujuan
        if (!move_uploaded_file($tmp_file, $dirupload . $newfilename)) {
            echo "<script>
                    alert('Gagal memindahkan file ke direktori tujuan!');
                </script>";
            return false;
        }

        $file_names[] = $newfilename;
    }

    return $file_names; // Kembalikan array nama file yang berhasil di-upload
}

function delmusic($id){

    global $conn;

    mysqli_query($conn, "DELETE FROM tabel_music WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// add video

function addvid($data) {
    global $conn;

    $files_video = uploadvid();

    if (!$files_video) {
        return false;
    }

    foreach ($files_video as $nama_file_video) {
        // Insert each video file into the database
        $query_video = "INSERT INTO tabel_video (id, nama_file) VALUES (NULL, '$nama_file_video')";
        if (!mysqli_query($conn, $query_video)) {
            echo("Error description coy: " . mysqli_error($conn));
            die();
        }
    }

    return mysqli_affected_rows($conn);
}

function uploadvid() {
    $video_files = $_FILES['file_video'];
    $video_file_names = [];

    foreach ($video_files['name'] as $index => $filename) {
        $size = $video_files['size'][$index];
        $error = $video_files['error'][$index];
        $tmp_file = $video_files['tmp_name'][$index];

        if ($error === 4) {
            echo "<script>
                alert('Pilih video terlebih dahulu!');
                document.location.href = 'addvid.php';
            </script>";
            return false;
        }

        // Define allowed video extensions
        $ext = ['mp4', 'avi', 'mov', 'mkv'];
        $extvid = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($extvid, $ext)) {
            echo "<script>
                alert('File yang Anda upload bukan video!');
                document.location.href = 'addvid.php';
            </script>";
            return false;
        }

        // Generate unique file name
        $newfilename = uniqid() . '.' . $extvid;
        $dirupload = "./videos/"; // Folder for videos
        
        if (move_uploaded_file($tmp_file, $dirupload . $newfilename)) {
            $video_file_names[] = $newfilename;
        } else {
            return false;
        }
    }

    return $video_file_names; // Return array of video file names
}

function delvid($id){

    global $conn;

    mysqli_query($conn, "DELETE FROM tabel_video WHERE id = $id");

    return mysqli_affected_rows($conn);
}