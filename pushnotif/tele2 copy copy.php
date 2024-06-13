<?php
// Koneksi ke database
require_once "../config/config.php";

// Get tomorrow's date
$tomorrowDate = date('Y-m-d', strtotime('+1 day'));

// Query untuk mengambil data bimbingan dengan deadline besok
$queryBimbingan = "SELECT pb.*, m.nama_mahasiswa, d.nama_dosen FROM progress_bimbingan pb
                   INNER JOIN mahasiswa m ON pb.id_mahasiswa = m.id_mahasiswa
                   INNER JOIN dosen d ON pb.id_dosen = d.id_dosen
                   WHERE next_deadline = ?";
$stmtBimbingan = mysqli_prepare($host, $queryBimbingan);
mysqli_stmt_bind_param($stmtBimbingan, "s", $tomorrowDate);
mysqli_stmt_execute($stmtBimbingan);
$resultBimbingan = mysqli_stmt_get_result($stmtBimbingan);

// Jika tidak ada bimbingan besok, kirim pesan bahwa tidak ada bimbingan
if (mysqli_num_rows($resultBimbingan) == 0) {
    // Kirim pesan ke semua dosen
    $queryDosen = "SELECT * FROM dosen WHERE telegram_id IS NOT NULL";
    $resultDosen = mysqli_query($host, $queryDosen);
    while ($rowDosen = mysqli_fetch_assoc($resultDosen)) {
        $telegram_id = $rowDosen['telegram_id'];
        $message_text = "Tidak ada bimbingan yang dijadwalkan besok.";
        sendMessage($telegram_id, $message_text);
    }
    // Kirim pesan ke semua mahasiswa
    $queryMahasiswa = "SELECT * FROM mahasiswa WHERE telegram_id IS NOT NULL";
    $resultMahasiswa = mysqli_query($host, $queryMahasiswa);
    while ($rowMahasiswa = mysqli_fetch_assoc($resultMahasiswa)) {
        $telegram_id = $rowMahasiswa['telegram_id'];
        $message_text = "Tidak ada bimbingan yang dijadwalkan besok.";
        sendMessage($telegram_id, $message_text);
    }
} else {
    // Jika ada bimbingan besok, kirim pesan bimbingan besok ke dosen dan mahasiswa yang terkait
    while ($rowBimbingan = mysqli_fetch_assoc($resultBimbingan)) {
        $dosenId = $rowBimbingan['id_dosen'];
        $mahasiswaId = $rowBimbingan['id_mahasiswa'];
        $namaDosen = $rowBimbingan['nama_dosen'];
        $namaMahasiswa = $rowBimbingan['nama_mahasiswa'];

        // Kirim pesan ke dosen
        $queryDosen = "SELECT * FROM dosen WHERE id_dosen = ? AND telegram_id IS NOT NULL";
        $stmtDosen = mysqli_prepare($host, $queryDosen);
        mysqli_stmt_bind_param($stmtDosen, "i", $dosenId);
        mysqli_stmt_execute($stmtDosen);
        $resultDosen = mysqli_stmt_get_result($stmtDosen);
        while ($rowDosen = mysqli_fetch_assoc($resultDosen)) {
            $telegram_id = $rowDosen['telegram_id'];
            $message_text = "Ada bimbingan yang dijadwalkan besok dengan $namaMahasiswa.";
            sendMessage($telegram_id, $message_text);
        }
        // Kirim pesan ke mahasiswa
        $queryMahasiswa = "SELECT * FROM mahasiswa WHERE id_mahasiswa = ? AND telegram_id IS NOT NULL";
        $stmtMahasiswa = mysqli_prepare($host, $queryMahasiswa);
        mysqli_stmt_bind_param($stmtMahasiswa, "i", $mahasiswaId);
        mysqli_stmt_execute($stmtMahasiswa);
        $resultMahasiswa = mysqli_stmt_get_result($stmtMahasiswa);
        while ($rowMahasiswa = mysqli_fetch_assoc($resultMahasiswa)) {
            $telegram_id = $rowMahasiswa['telegram_id'];
            $message_text = "Ada bimbingan yang dijadwalkan besok dengan $namaDosen.";
            sendMessage($telegram_id, $message_text);
        }
    }
}

// Fungsi untuk mengirim pesan ke Telegram
function sendMessage($telegram_id, $message_text) {
    // Ganti dengan token bot Telegram Anda
    $secret_token = '6994480912:AAGYjTeMCSXuF2oaOcqfTXN2odp9RBaKSZE';

    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message_text);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
       echo 'Pesan gagal terkirim, error :' . $err;
    } else {
        echo 'Pesan terkirim';
    }
}
?>

