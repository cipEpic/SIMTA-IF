
<?php
// Mendapatkan data pembaruan dari Telegram
$update = json_decode(file_get_contents("php://input"), true);

// Memeriksa apakah pesan merupakan pesan masuk baru
if (isset($update["message"])) {
    $message = $update["message"];

    // Memeriksa apakah pesan merupakan pesan dari pengguna yang baru memulai bot
    if (isset($message["text"]) && $message["text"] == "/start") {
        // Mendapatkan ID obrolan dari pengguna yang memulai bot
        $chat_id = $message["chat"]["id"];

        // Kirim pesan selamat datang kepada pengguna
        $telegram_bot_token = '6994480912:AAGYjTeMCSXuF2oaOcqfTXN2odp9RBaKSZE';
        $welcome_message = "Selamat datang di bot kami! Terima kasih telah bergabung.";
        $url = "https://api.telegram.org/bot$telegram_bot_token/sendMessage?chat_id=$chat_id&text=" . urlencode($welcome_message);
        file_get_contents($url);
    }
}
?>
