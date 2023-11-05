<!DOCTYPE html>
<html lang="en">
<head>
  <title>W3.CSS Template</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Add DataTables CSS and JavaScript libraries -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>

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
    <a href="#" class="w3-bar-item w3-button w3-padding-large">PROGRESS TA</a>
    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right no-underline"><i class="fa fa-user"></i> LOGIN </a>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Page Title -->
  <h2>Selamat datang, Nama Mahasiswa</h2>
  <h3>Progress Bimbingan Anda</h3>

  <!-- DataTables Table -->
  <table id="progressTable" class="datatable" border="1">
    <thead>
      <tr>
        <th>No.</th>
        <th>Progres</th>
        <th>Status Persetujuan</th>
        <th>Unduh Revisi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1.</td>
        <td>Pendahuluan</td>
        <td>
          <fieldset>
            <input type="checkbox" disabled checked> Sampul depan
            <br>
            <input type="checkbox" disabled checked> Lembar judul
            <br>
            <input type="checkbox" disabled checked> Lembar pengesahan
            <br>
            <input type="checkbox" disabled checked> Abstrak
            <br>
            <input type="checkbox" disabled checked> Kata pengantar
            <br>
            <input type="checkbox" disabled checked> Daftar isi
            <br>
            <input type="checkbox" disabled checked> Daftar table
            <br>
            <input type="checkbox" disabled checked> Daftar gambar
          </fieldset>
        </td>
        <td><a href="unduh_revisi.php?file=file_pendahuluan.pdf">Unduh Revisi</a></td>
      </tr>
      <tr>
        <td>2.</td>
        <td>BAB I</td>
        <td>
          <fieldset>
            <input type="checkbox" disabled checked> a. Latar belakang
            <br>
            <input type="checkbox" disabled checked> b. Rumusan masalah
            <br>
            <input type="checkbox" disabled checked> c. Batasan masalah
            <br>
            <input type="checkbox" disabled checked> d. Tujuan
            <br>
            <input type="checkbox" disabled checked> e. Manfaat
            <br>
            <input type="checkbox" disabled checked> f. Sistematika Penulisan
          </fieldset>
        </td>
        <td><a href="unduh_revisi.php?file=file_bab1.pdf">Unduh Revisi</a></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>BAB II</td>
        <td>
          <fieldset>
            <input type="checkbox" disabled checked> a.	Tinjauan teori
            <br>
            <input type="checkbox" disabled checked> b.	Tinjauan Empiris
          </fieldset>
        </td>
        <td><a href="unduh_revisi.php?file=file_bab1.pdf">Unduh Revisi</a></td>
      </tr>
      <tr>
        <td>4.</td>
        <td>BAB III</td>
        <td>
          <fieldset>
            <input type="checkbox" disabled checked> a.	Data dan Metode Pengumpulan Data
            <br>
            <input type="checkbox" disabled checked> b.	Desain sistem/Metode
            <br>
            <input type="checkbox" disabled checked> c.	Desain Evaluasi Sistem/Metode
          </fieldset>
        </td>
        <td><a href="unduh_revisi.php?file=file_bab1.pdf">Unduh Revisi</a></td>
      </tr>
      <tr>
        <td>5.</td>
        <td>BAB IV</td>
        <td>
          <fieldset>
            <input type="checkbox" disabled checked> a.	Proses Pengumpulan Data
            <br>
            <input type="checkbox" disabled checked> b.	Implementasi Sistem/Metode
            <br>
            <input type="checkbox" disabled checked> c.	Implementasi Evaluasi Sistem/Metode
          </fieldset>
        </td>
        <td><a href="unduh_revisi.php?file=file_bab1.pdf">Unduh Revisi</a></td>
      </tr>
      <tr>
        <td>6.</td>
        <td>BAB V</td>
        <td>
          <fieldset>
            <input type="checkbox" disabled checked> a.	Kesimpulan
            <br>
            <input type="checkbox" disabled checked> b.	Saran
          </fieldset>
        </td>
        <td><a href="unduh_revisi.php?file=file_bab1.pdf">Unduh Revisi</a></td>
      </tr>
      <tr>
        <td>7.</td>
        <td>Akhir</td>
        <td>
          <fieldset>
            <input type="checkbox" disabled checked> a. Daftar Pustaka
            <br>
            <input type="checkbox" disabled checked> b. Tampilan
          </fieldset>
        </td>
        <td><a href="unduh_revisi.php?file=file_bab1.pdf">Unduh Revisi</a></td>
      </tr>
      <!-- Add more rows for other sections -->
    </tbody>
  </table>
  <br>
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

<!-- Add the DataTables initialization script -->
<script>
  $(document).ready(function () {
    $('#progressTable').DataTable({
      // Add any custom options and styling here
    });
  });
</script>

</body>
</html>
