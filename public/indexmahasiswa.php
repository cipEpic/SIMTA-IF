<?php
session_start();

// Check if the user is not logged in or is not a mahasiswa
if (!isset($_SESSION['login_user']) || $_SESSION['user_type'] !== 'mahasiswa') {
    header("location: ../admin/login.php"); // Redirect to the login page if not logged in or not a dosen
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
        <a href="https://t.me/getmyid_bot?start=start" class="w3-bar-item w3-button w3-padding-large">get id</a>
        <a href="../admin/logout.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right no-underline">
            <i class="fa fa-sign-out"></i> Logout
        </a>
    </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
</div>

        <!-- Content Wrapper. Contains page content -->
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
                                <li class="breadcrumb-item active">DataMahasiswa</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
    



            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Bimbingan Mahasiswa</h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP Dosen</th>
                                                <th>Nama Dosen</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        require_once "../config/config.php";

                                        // Get the id_mahasiswa from the URL
                                        $id_mahasiswa = $_GET['id_mahasiswa'];

                                        // Query to get the progress of a specific Mahasiswa
                                        $query = "SELECT d.NIP, d.nama_dosen, p.id_progress
                                                  FROM dosen d
                                                  JOIN progress_bimbingan p ON d.id_dosen = p.id_dosen
                                                  WHERE p.id_mahasiswa = $id_mahasiswa";
                                        $result = $host->query($query);

                                        if ($result->num_rows > 0) {
                                            $no = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $no . "</td>";
                                                echo "<td>" . $row['NIP'] . "</td>";
                                                echo "<td>" . $row['nama_dosen'] . "</td>";
                                                echo "<td><a class='btn btn-primary' href='lihatmahasiswa.php?id_progress=" . $row['id_progress'] . "'>View</a></td>";
                                                echo "</tr>";
                                                $no++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>Tidak ada data progress mahasiswa</td></tr>";
                                        }
                                        ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP Dosen</th>
                                                <th>Nama Dosen</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Bagian Bawah Tabel -->
<!-- <div class="card-footer">
    <h5 class="card-title">Kirim Telegram ID Anda</h5>
    <form action="process_telegram_id.php" method="post">
        <div class="input-group mb-3">
            <input type="text" name="telegram_id" class="form-control" placeholder="Masukkan Telegram ID Anda" required>
            <input type="hidden" name="id_dosen" value="<?php echo $id_dosen; ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
        </div>
    </form>
</div> -->
<!-- Bagian Bawah Tabel -->
<br>
            <!-- Main content 2-->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Kirim Telegram ID</h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                    
    <?php
    // Query untuk mendapatkan tele_id dari database
    $query_telegram_id = "SELECT telegram_id FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";
    $result_telegram_id = $host->query($query_telegram_id);
    $row_telegram_id = $result_telegram_id->fetch_assoc();
    $telegram_id = $row_telegram_id['telegram_id'];

    // Jika tele_id sudah diisi, berikan pesan
    if (!empty($telegram_id)) {
        echo "<div class='alert alert-info' role='alert'>Tele ID sudah dikirim</div>";
    } else {
        // Jika tele_id belum diisi, tampilkan formulir untuk mengirimkan Telegram ID
        // echo "<h5 class='card-title'>Kirim Telegram ID Anda</h5>";
        echo "<h6 class='card-title'>Untuk mendapatkan Telegram id akses menu get id atau klik <a href='https://t.me/getmyid_bot?start=start' style='color: blue'>disini</a>.</h6>";
        echo "<form action='process_telegram_id_m.php' method='post'>";
        echo "<div class='input-group mb-3'>";
        echo "<input type='text' name='telegram_id' class='form-control' placeholder='Masukkan Telegram ID Anda' required>";
        echo "<input type='hidden' name='id_mahasiswa' value='$id_mahasiswa'>";
        echo "<div class='input-group-append'>";
        echo "<button class='btn btn-primary' type='submit'>Kirim</button>";
        echo "</div>";
        echo "</div>";
        echo "</form>";
    }

    // Close the database connection
    $host->close();
    ?>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>





    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>


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
