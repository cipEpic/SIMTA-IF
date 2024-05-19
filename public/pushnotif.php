<?php
// Include your database configuration file
require_once "../config/config.php";

// Function to send message via Telegram Bot API
function sendMessage($chatId, $message) {
    // Telegram Bot token
    $telegramBotToken = '6994480912:AAGYjTeMCSXuF2oaOcqfTXN2odp9RBaKSZE';

    // URL endpoint for sending message using Telegram Bot API
    $telegramApiUrl = "https://api.telegram.org/bot$telegramBotToken/sendMessage";

    // Data to be sent as part of HTTP POST request
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    // Initialize cURL to make HTTP POST request
    $curl = curl_init($telegramApiUrl);

    // Configure cURL to send data as JSON
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    // Execute the cURL request
    $response = curl_exec($curl);

    // Check for errors in the request
    if ($response === false) {
        // If there is an error, print the error message
        echo 'Error: ' . curl_error($curl);
    } else {
        // If successful, print success message
        echo 'Message sent successfully!';
    }

    // Close the cURL connection
    curl_close($curl);
}

// Get current time in hours
$currentHour = date('H:i');

// Check if it's 9 AM
if ($currentHour == '21:00') {
    // Get tomorrow's date
    $tomorrowDate = date('Y-m-d', strtotime('+1 day'));

    // Query to get progress with tomorrow's deadline
    $query = "SELECT * FROM progress_bimbingan WHERE next_deadline = ?";
    $stmt = mysqli_prepare($host, $query);

    // Bind the parameter to the query
    mysqli_stmt_bind_param($stmt, "s", $tomorrowDate);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Get the result of the query
    $result = mysqli_stmt_get_result($stmt);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row
        while ($row = mysqli_fetch_assoc($result)) {
            // Get dosen data
            $dosenId = $row['id_dosen'];
            $queryDosen = "SELECT * FROM dosen WHERE id_dosen = ?";
            $stmtDosen = mysqli_prepare($host, $queryDosen);
            mysqli_stmt_bind_param($stmtDosen, "i", $dosenId);
            mysqli_stmt_execute($stmtDosen);
            $resultDosen = mysqli_stmt_get_result($stmtDosen);
            $dosen = mysqli_fetch_assoc($resultDosen);

            // Get mahasiswa data
            $mahasiswaId = $row['id_mahasiswa'];
            $queryMahasiswa = "SELECT * FROM mahasiswa WHERE id_mahasiswa = ?";
            $stmtMahasiswa = mysqli_prepare($host, $queryMahasiswa);
            mysqli_stmt_bind_param($stmtMahasiswa, "i", $mahasiswaId);
            mysqli_stmt_execute($stmtMahasiswa);
            $resultMahasiswa = mysqli_stmt_get_result($stmtMahasiswa);
            $mahasiswa = mysqli_fetch_assoc($resultMahasiswa);

            // Compose message for dosen
            $messageDosen = "Halo Dosen {$dosen['nama_dosen']}, deadline progress untuk mahasiswa {$mahasiswa['nama_mahasiswa']} adalah besok. Pastikan untuk memberikan bimbingan sesuai jadwal.";

            // Compose message for mahasiswa
            $messageMahasiswa = "Halo {$mahasiswa['nama_mahasiswa']}, deadline progress Anda adalah besok. Pastikan untuk menyelesaikan tugas sesuai jadwal.";

            // Send message to dosen
            sendMessage($dosen['telegram_id'], $messageDosen);

            // Send message to mahasiswa
            sendMessage($mahasiswa['telegram_id'], $messageMahasiswa);
        }
    } else {
        // If no progress with tomorrow's deadline found, print a message
        echo "No progress with tomorrow's deadline found.";
    }

    // Close database connection
    mysqli_stmt_close($stmt);
    mysqli_close($host);
} else {
    // If it's not 9 AM, exit the script
    exit();
}
?>
