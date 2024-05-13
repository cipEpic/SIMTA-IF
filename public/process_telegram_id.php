<?php
session_start();

// Include the database configuration
require_once "../config/config.php";

// Mengambil data Telegram ID dari formulir
$telegram_id = $_POST['telegram_id'];
$id_dosen = $_POST['id_dosen'];

// Menyimpan Telegram ID ke dalam database
$query = "UPDATE dosen SET telegram_id = '$telegram_id' WHERE id_dosen = '$id_dosen'";
if ($host->query($query) === TRUE) {
    // Redirect ke halaman indexdosen.php setelah berhasil menyimpan Telegram ID
    header("location: indexdosen.php?id_dosen=$id_dosen");
} else {
    echo "Error: " . $query . "<br>" . $host->error;
}

// Menutup koneksi database
$host->close();
?>
