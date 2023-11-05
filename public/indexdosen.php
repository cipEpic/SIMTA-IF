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
    <a href="..\admin\login.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right no-underline"><i class="fa fa-user"></i> LOGIN </a>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <h2>Pilih Mahasiswa dan Lihat Progres Bimbingan</h2>

  <form action="" method="post">
    <label for="mahasiswaInput">Cari Mahasiswa:</label>
    <input type="text" id="mahasiswaInput" oninput="filterMahasiswa()">
    <input type="submit" name="submit" value="Lihat Progres">
  </form>

  <p id="progresTitle">Progress bimbingan meliputi:</p>
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
        <td>
          <fieldset>
            <input type="checkbox" name="progress[]" value="Sampul depan"> Sampul depan
            <br>
            <input type="checkbox" name="progress[]" value="Lembar judul"> Lembar judul
            <br>
            <input type="checkbox" name="progress[]" value="Lembar pengesahan"> Lembar pengesahan
            <br>
            <input type="checkbox" name="progress[]" value="Abstrak"> Abstrak
            <br>
            <input type="checkbox" name="progress[]" value="Kata pengantar"> Kata pengantar
            <br>
            <input type="checkbox" name="progress[]" value="Daftar isi"> Daftar isi
            <br>
            <input type="checkbox" name="progress[]" value="Daftar table"> Daftar table
            <br>
            <input type="checkbox" name="progress[]" value="Daftar gambar"> Daftar gambar
          </fieldset>
        </td>
        <td><input type="file" name="file_pendahuluan"></td>
      </tr>
      <tr>
        <td>2.</td>
        <td>BAB I</td>
        <td>
          <fieldset>
            <input type="checkbox" name="progress[]" value="Latar belakang"> a. Latar belakang
            <br>
            <input type="checkbox" name "progress[]" value="Rumusan masalah"> b. Rumusan masalah
            <br>
            <input type="checkbox" name="progress[]" value="Batasan masalah"> c. Batasan masalah
            <br>
            <input type="checkbox" name="progress[]" value="Tujuan"> d. Tujuan
            <br>
            <input type="checkbox" name="progress[]" value="Manfaat"> e. Manfaat
            <br>
            <input type="checkbox" name="progress[]" value="Sistematika Penulisan"> f. Sistematika Penulisan
          </fieldset>
        </td>
        <td><input type="file" name="file_Bab1"></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>BAB II</td>
        <td>
          <fieldset>
            <input type="checkbox" name="progress[]" value="Tinjauan teori"> a. Tinjauan teori
            <br>
            <input type="checkbox" name="progress[]" value="Tinjauan Empiris"> b. Tinjauan Empiris
          </fieldset>
        </td>
        <td><input type="file" name="file_Bab2"></td>
      </tr>
      <tr>
        <td>4.</td>
        <td>BAB III</td>
        <td>
          <fieldset>
            <input type="checkbox" name="progress[]" value="Latar belakang"> a. Data dan Metode Pengumpulan Data
            <br>
            <input type="checkbox" name="progress[]" value="Rumusan masalah"> b. Desain sistem/Metode
            <br>
            <input type="checkbox" name="progress[]" value="Batasan masalah"> c. Desain Evaluasi Sistem/Metode
          </fieldset>
        </td>
        <td><input type="file" name="file_Bab3"></td>
      </tr>
      <tr>
        <td>5.</td>
        <td>BAB IV</td>
        <td>
          <fieldset>
            <input type="checkbox" name="progress[]" value="Latar belakang"> a. Proses Pengumpulan Data
            <br>
            <input type="checkbox" name="progress[]" value="Rumusan masalah"> b. Implementasi Sistem/Metode
            <br>
            <input type="checkbox" name="progress[]" value="Batasan masalah"> c. Implementasi Evaluasi Sistem/Metode
          </fieldset>
        </td>
        <td><input type="file" name="file_bab4"></td>
      </tr>
      <tr>
        <td>6.</td>
        <td>BAB V</td>
        <td>
          <fieldset>
            <input type="checkbox" name="progress[]" value="Latar belakang"> a. Kesimpulan
            <br>
            <input type="checkbox" name="progress[]" value="Rumusan masalah"> b. Saran
          </fieldset>
        </td>
        <td><input type="file" name="file_bab5"></td>
      </tr>
      <tr>
        <td>7.</td>
        <td>Akhir</td>
        <td>
          <fieldset>
            <input type="checkbox" name="progress[]" value="Latar belakang"> a. Daftar Pustaka
            <br>
            <input type="checkbox" name="progress[]" value="Rumusan masalah"> b. Lampiran
          </fieldset>
        </td>
        <td><input type="file" name="file_akhir"></td>
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
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat
