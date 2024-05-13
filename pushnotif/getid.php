<?php

// Mendapatkan pembaruan terbaru dari API Telegram
$url = "https://api.telegram.org/bot6994480912:AAGYjTeMCSXuF2oaOcqfTXN2odp9RBaKSZE/getUpdates"; // Ganti <token> dengan token bot Anda
$response = file_get_contents($url);
$data = json_decode($response, true);

// Memproses pembaruan
if ($data && isset($data['result'])) {
    foreach ($data['result'] as $update) {
        $message = $update['message'];
        
        // Mendapatkan data yang ingin disimpan ke database
        $chat_id = $message['chat']['id'];
        $text = $message['text'];
        $timestamp = $message['date'];
        
        // Menyimpan data ke dalam database
        simpan_pesan_ke_database($chat_id, $text, $timestamp);
    }
}

?>
