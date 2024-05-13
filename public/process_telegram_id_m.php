<?php
session_start();

// Include the database configuration
require_once "../config/config.php";

// Mengambil data Telegram ID dari formulir
$telegram_id = $_POST['telegram_id'];
$id_mahasiswa = $_POST['id_mahasiswa'];

// Menyimpan Telegram ID ke dalam database
$query = "UPDATE mahasiswa SET telegram_id = '$telegram_id' WHERE id_mahasiswa = '$id_mahasiswa'";
if ($host->query($query) === TRUE) {
    // Redirect ke halaman indexmahasiswa.php setelah berhasil menyimpan Telegram ID
    header("location: indexmahasiswa.php?id_mahasiswa=$id_mahasiswa");
} else {
    echo "Error: " . $query . "<br>" . $host->error;
}

// Menutup koneksi database
$host->close();
?>
