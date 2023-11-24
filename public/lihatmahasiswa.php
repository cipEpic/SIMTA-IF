<?php
session_start();

// Check if the user is not logged in or is not a mahasiswa
if (!isset($_SESSION['login_user']) || $_SESSION['user_type'] !== 'mahasiswa') {
    header("location: ../admin/login.php"); // Redirect to the login page if not logged in or not a mahasiswa
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
        <title>SIMTA UNUD</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
        <link rel="stylesheet" href="styles\global.css">
        <link rel="icon" type="image/x-icon" href="public\favicon.ico">
</head>

<!-- connect ke database -->
<body class="hold-transition sidebar-mini">

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
    <a href="#" class="w3-bar-item w3-button w3-padding-large"><?php echo $_SESSION['login_user']; ?></a>
        <a href="../admin/logout.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right no-underline">
            <i class="fa fa-sign-out"></i> Logout
        </a>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
</div>


    <!-- Menampilkan data order dan customer dalam tabel menggunakan bootstrap -->
    <!-- <div class="container"> <br /> <br /> -->
    <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
     <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1>DataTables</h1> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">EditProducts</li>
                            </ol>
                        </div>
                    </div>
                </div>
				<!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-12">
			<div class="card p-lg-5">
                <div class="card-header">
                <?php
require_once "../config/config.php";

// Retrieve id_progress from the URL
$id_progress = isset($_GET['id_progress']) ? $_GET['id_progress'] : null;

// Validate if $id_progress is a valid integer (optional)
if (!ctype_digit($id_progress)) {
    // Handle invalid id_progress (e.g., redirect to an error page)
    echo "Invalid id_progress";
    exit();
}

// Convert $id_progress to an integer
$id_progress = intval($id_progress);

// Assuming you have a query to fetch data
$query = "SELECT progress_bimbingan.*, mahasiswa.nama_mahasiswa FROM progress_bimbingan
    INNER JOIN mahasiswa ON progress_bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa
    WHERE progress_bimbingan.id_progress = $id_progress";

$result = mysqli_query($host, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($host));
}

$row = mysqli_fetch_assoc($result);
$nama_mahasiswa = $row['nama_mahasiswa'] ?? "";
?>
                    <h2>Selamat datang, <?php echo $nama_mahasiswa; ?></h2>
                    <h3>Progress Bimbingan Anda</h3>
                </div>
                                
            <form id="MahasiswaForm" action="" method="post">
                <table class="table table-striped" border="1">
                <tr>
                  <th>No.</th>
                  <th>Progres</th>
                  <th>Status Persetujuan</th>
                  <th>Unduh Revisi</th>
                </tr>

                <?php
require_once "../config/config.php";

// Retrieve id_progress from the URL
$id_progress = isset($_GET['id_progress']) ? $_GET['id_progress'] : null;

// Validate if $id_progress is a valid integer (optional)
if (!ctype_digit($id_progress)) {
    // Handle invalid id_progress (e.g., redirect to an error page)
    echo "Invalid id_progress";
    exit();
}

// Convert $id_progress to an integer
$id_progress = intval($id_progress);

// Assuming you have a query to fetch data
$query = "SELECT * FROM progress_bimbingan WHERE id_progress = $id_progress";

$result = mysqli_query($host, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($host));
}

// Fetch the result (assuming only one row for a specific id_progress)
$row = mysqli_fetch_assoc($result);

// Free the result set
mysqli_free_result($result);

// Close the connection
mysqli_close($host);

// Now $row contains the data for the specified id_progress
// You can use $row to display the information as needed in your HTML
?>

      <tr>
    <td>1.</td>
    <td>Pendahuluan</td>
    <td>
        <fieldset>
            <input type="checkbox" disabled <?= $row['sampul'] ? 'checked' : ''; ?>> Sampul depan
            <br>
            <input type="checkbox" disabled <?= $row['l_judul'] ? 'checked' : ''; ?>> Lembar judul
            <br>
            <input type="checkbox" disabled <?= $row['l_pengesahan'] ? 'checked' : ''; ?>> Lembar pengesahan
            <br>
            <input type="checkbox" disabled <?= $row['abstrak'] ? 'checked' : ''; ?>> Abstrak
            <br>
            <input type="checkbox" disabled <?= $row['katpeng'] ? 'checked' : ''; ?>> Kata pengantar
            <br>
            <input type="checkbox" disabled <?= $row['dafis'] ? 'checked' : ''; ?>> Daftar isi
            <br>
            <input type="checkbox" disabled <?= $row['daftab'] ? 'checked' : ''; ?>> Daftar table
            <br>
            <input type="checkbox" disabled <?= $row['dafgam'] ? 'checked' : ''; ?>> Daftar gambar
            <!-- Repeat this for other checkboxes -->
        </fieldset>
    </td>
    <td><?php echo ($row['file_revisi_pendahuluan'] !== null) ? nl2br($row['file_revisi_pendahuluan']) : '-'; ?></td>
</tr>
<!-- Repeat the above structure for other sections -->
<tr>
        <td>2.</td>
        <td>BAB I</td>
        <td>
          <fieldset>
          <input type="checkbox" disabled <?= $row['latbel'] ? 'checked' : ''; ?>> a. Latar belakang
            <br>
            <input type="checkbox" disabled <?= $row['rumusan'] ? 'checked' : ''; ?>> b. Rumusan masalah
            <br>
            <input type="checkbox" disabled <?= $row['batasan'] ? 'checked' : ''; ?>> c. Batasan masalah
            <br>
            <input type="checkbox" disabled <?= $row['tujuan'] ? 'checked' : ''; ?>> d. Tujuan
            <br>
            <input type="checkbox" disabled <?= $row['manfaat'] ? 'checked' : ''; ?>> e. Manfaat
            <br>
            <input type="checkbox" disabled <?= $row['sistematika_penulisan'] ? 'checked' : ''; ?>> f. Sistematika Penulisan
          </fieldset>
        </td>
        <td><?php echo ($row['file_revisi_bab1'] !== null) ? nl2br($row['file_revisi_bab1']) : '-'; ?></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>BAB II</td>
        <td>
          <fieldset>
          <input type="checkbox" disabled <?= $row['teoritis'] ? 'checked' : ''; ?>> a.	Tinjauan teori
            <br>
            <input type="checkbox" disabled <?= $row['empiris'] ? 'checked' : ''; ?>> b.	Tinjauan Empiris
          </fieldset>
        </td>
        <td><?php echo ($row['file_revisi_bab2'] !== null) ? nl2br($row['file_revisi_bab2']) : '-'; ?></td>
      </tr>
      <tr>
        <td>4.</td>
        <td>BAB III</td>
        <td>
          <fieldset>
          <input type="checkbox" disabled <?= $row['metopen'] ? 'checked' : ''; ?>> a.	Data dan Metode Pengumpulan Data
            <br>
            <input type="checkbox" disabled <?= $row['desain_sistem'] ? 'checked' : ''; ?>> b.	Desain sistem/Metode
            <br>
            <input type="checkbox" disabled <?= $row['desain_evaluasi'] ? 'checked' : ''; ?>> c.	Desain Evaluasi Sistem/Metode
           
          </fieldset>
        </td>
        <td><?php echo ($row['file_revisi_bab3'] !== null) ? nl2br($row['file_revisi_bab3']) : '-'; ?></td>
      </tr>
      <tr>
        <td>5.</td>
        <td>BAB IV</td>
        <td>
          <fieldset>
          <input type="checkbox" disabled <?= $row['proses_kumpul_data'] ? 'checked' : ''; ?>> a.	Proses Pengumpulan Data
            <br>
            <input type="checkbox" disabled <?= $row['implementasi_sistem'] ? 'checked' : ''; ?>> b.	Implementasi Sistem/Metode
            <br>
            <input type="checkbox" disabled <?= $row['implementasi_evaluasi'] ? 'checked' : ''; ?>> c.	Implementasi Evaluasi Sistem/Metode
          </fieldset>
        </td>
        <td><?php echo ($row['file_revisi_bab4'] !== null) ? nl2br($row['file_revisi_bab4']) : '-'; ?></td>
      </tr>
      <tr>
        <td>6.</td>
        <td>BAB V</td>
        <td>
          <fieldset>
          <input type="checkbox" disabled <?= $row['kesimpulan'] ? 'checked' : ''; ?>> a.	Kesimpulan
            <br>
            <input type="checkbox" disabled <?= $row['saran'] ? 'checked' : ''; ?>> b.	Saran
          </fieldset>
        </td>
        <<td><?php echo ($row['file_revisi_bab5'] !== null) ? nl2br($row['file_revisi_bab5']) : '-'; ?></td>
      </tr>
      <tr>
        <td>7.</td>
        <td>Akhir</td>
        <td>
          <fieldset>
          <input type="checkbox" disabled <?= $row['dafpus'] ? 'checked' : ''; ?>> a. Daftar Pustaka
            <br>
            <input type="checkbox" disabled <?= $row['lampiran'] ? 'checked' : ''; ?>> b. Lampiran
          </fieldset>
        </td>
        <td><?php echo ($row['file_revisi_akhir'] !== null) ? nl2br($row['file_revisi_akhir']) : '-'; ?></td>
      </tr>

                        
                    </tbody>
                </table>
                
            </form>
            </div>
        </div>
	</div>

  <!-- Footer -->
  <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
      <!-- Left -->
      <div class="me-5">
        <span>Check your Progress of Tugas Akhir Information</span>
      </div>

    </section>

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">SIMTA UDAYANA</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
            <p>
            This Project is about Sistem Monitoring Tugas Akhir.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
            <p><i class="fa fa-home mr-3"></i> Denpasar, Bali, Indonesia</p>
            <p><i class="fa fa-envelope mr-3"></i> evidnsr@gmail.com</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: black">
      © 2023 Copyright:
      <a class="text-white" href="https://github.com/cipEpic/Toko-Baju-Eduwork">cipEpic.om</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

</body>

</html>
