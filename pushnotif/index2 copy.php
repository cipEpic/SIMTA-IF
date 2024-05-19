<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Api Telegram</title>

    <style>
        .form-input {
            display: block;
            margin-top : 5px;
        }
        .form{
            width :180px;
            margin : 200px auto;
            padding: 20px;
            background-color: lightgrey;
            border-radius: 20px;
        }
        .form button{
            margin-top: 10px;
        }
        #clock {
            font-size: 20px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="form">
    <form id="sendMessageForm" action="tele2.php" method="post">
        <button type="submit">Kirim Pesan</button>
    </form>
</div>

<div id="clock"></div>

<script>
// Fungsi untuk menampilkan waktu berjalan
function displayClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeString = addZeroBefore(hours) + ":" + addZeroBefore(minutes) + ":" + addZeroBefore(seconds);
    document.getElementById('clock').innerHTML = "Waktu saat ini: " + timeString;

    // Pemeriksaan untuk mengirim pesan pada waktu tertentu (misalnya jam 08:00)
    if (hours == 13 && minutes == 22 && seconds == 0) { //ubah
        document.getElementById('sendMessageForm').submit(); // Mengirim formulir secara otomatis
    }
}

// Fungsi untuk menambahkan angka 0 sebelum angka < 10
function addZeroBefore(number) {
    return (number < 10 ? '0' : '') + number;
}

// Panggil fungsi displayClock setiap detik
setInterval(displayClock, 1000);
</script>
    
</body>
</html>
