<?php
$telegram_id ='1337591560'; //ini akan masukkan semua data 
$message_text = "Ini adalah pesan yang akan dikirim ke Telegram.";
$secret_token = '6994480912:AAGYjTeMCSXuF2oaOcqfTXN2odp9RBaKSZE';
sendMessage($telegram_id, $message_text, $secret_token);

function sendMessage($telegram_id, $message_text, $secret_token) {
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
    }else{
        echo 'Pesan terkirim';
    }
}
?>

<!-- https://api.telegram.org/bot6994480912:AAGYjTeMCSXuF2oaOcqfTXN2odp9RBaKSZE/getUpdates -->


<!-- jadi diisi tanggal untuk setiap deadline bimbingan
bot ini otomatis mengirimkan pesan setiap hari apabila memang ada jadwal bimbingan pada saat hari itu 
bot akan menampilkan nama mahasiswa nama dosen yang akan melakukan bimbingan/ deadline pengumpulan? (bikin kategori pesan)
berarti nanti setiap sub bab ada tanggal bimbingannya
-->