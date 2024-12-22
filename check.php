<?php
require 'config.php';

header('Content-Type: application/json');

try {
    // Mengambil ID terbaru untuk gambar, musik, dan video
    $latest_image_result = $conn->query("SELECT id FROM tabel_gambar ORDER BY id DESC LIMIT 1");
    if (!$latest_image_result) {
        throw new Exception($conn->error);
    }
    $latestImage = $latest_image_result->fetch_assoc();

    $latest_music_result = $conn->query("SELECT id FROM tabel_music ORDER BY id DESC LIMIT 1");
    if (!$latest_music_result) {
        throw new Exception($conn->error);
    }
    $latestMusic = $latest_music_result->fetch_assoc();

    $latest_video_result = $conn->query("SELECT id FROM tabel_video ORDER BY id DESC LIMIT 1");
    if (!$latest_video_result) {
        throw new Exception($conn->error);
    }
    $latestVideo = $latest_video_result->fetch_assoc();

    echo json_encode([
        'latest_image_id' => $latestImage ? $latestImage['id'] : null,
        'latest_music_id' => $latestMusic ? $latestMusic['id'] : null,
        'latest_video_id' => $latestVideo ? $latestVideo['id'] : null
    ]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}