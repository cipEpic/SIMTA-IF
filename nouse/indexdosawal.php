<!DOCTYPE html>
<html lang="en">
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
.no-underline {
  text-decoration: none;
}
</style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a class="w3-bar-item" href="#">
      <img src="..\public\assets\img\fav.ico" width="100" height="auto" alt="Logo">
    </a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">MANAJEMEN TA</a>
    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right no-underline"><i class="fa fa-user"></i> LOGIN </a>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

<!DOCTYPE html>
<html>
<head>
    <title>Progress Bimbingan</title>
    <style>
        #mahasiswaInput {
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>Pilih Mahasiswa dan Lihat Progres Bimbingan</h2>

    <form action="" method="post">

        <label for="mahasiswaInput">Cari Mahasiswa:</label>
        <input type="text" id="mahasiswaInput" oninput="filterMahasiswa()">
        <input type="submit" name="submit" value="Lihat Progres">
    </form>

    <p>Progress bimbingan meliputi:</p>
    <form action="simpan_progress.php" method="post" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Progres</th>
                <th>Status Persetujuan</th>
                <th>Unggah Revisi</th>
            </tr>
            <tr>
                <td>1.</td>
                <td>Pendahuluan</td>
                <td><input type="checkbox" name="progress[]" value="Pendahuluan"></td>
                <td><input type="file" name="file_pendahuluan"></td>
            </tr>
            <tr>
                <td>2.</td>
                <td>BAB I</td>
                <td><input type="checkbox" name="progress[]" value="BAB I"></td>
                <td><input type="file" name="file_bab1"></td>
            </tr>
            <!-- Tambahkan progres-progres lainnya sesuai kebutuhan -->
        </table>
        <input type="submit" name="simpanProgress" value="Simpan Progress">
    </form>

    <script>
        function filterMahasiswa() {
            var input, filter, select, option, i, txtValue;
            input = document.getElementById("mahasiswaInput");
            filter = input.value.toUpperCase();
            select = document.getElementById("mahasiswa");
            option = select.getElementsByTagName("option");

            for (i = 0; i < option.length; i++) {
                txtValue = option[i].text;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    option[i].style.display = "";
                } else {
                    option[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>



  
<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>



</body>
</html>
