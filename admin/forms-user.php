<?php
session_start();

// Check if the user is not logged in or is not an admin
if (!isset($_SESSION['login_user']) || $_SESSION['user_type'] !== 'admin') {
    header("location: login.php"); // Redirect to the login page if not logged in or not an admin
    exit();
}
?>

<?php
require_once "../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Start Logo -->
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->
  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      
    <!-- Start Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

       <!-- Start Forms Nav -->
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-user.php" class="active">
              <i class="bi bi-circle" id="brand"></i><span>Add User</span>
            </a>
          </li>
          <li>
            <a href="forms-progress.php" >
              <i class="bi bi-circle" id="category"></i><span>Add Data Progress Bimbingan</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Forms Nav -->

      <!-- Start Tables Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Tables Data</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="table-user.php">
            <i class="bi bi-circle"></i><span>Data Tables User</span>
          </a>
        </li>
        <li>
          <a href="table-progress.php">
            <i class="bi bi-circle"></i><span>Data Tables Progress Bimbingan</span>
          </a>
        </li>
      </ul>
    </li>
    <!-- End Tables Nav -->
    </ul>

  </aside>
  <!-- End Sidebar-->
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Start Logo -->
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['login_user']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['login_user']; ?></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
            <a class="dropdown-item d-flex align-items-center" href="logout.php"> <!-- Assuming you have a logout.php file for the logout process -->
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
            </a>
            </li>

</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->

      </ul>
    </nav>
  </header>
  <!-- Start #main -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Validation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Forms Add User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="card col-lg">
          <div class="card-body">
            <h5 class="card-title">Forms Add Data User</h5>

            <!-- Custom Styled Validation with Tooltips -->
            <form class="row g-3 needs-validation" method="post" action="proses.php" enctype="multipart/form-data" novalidate>
              <div class="row position-relative mb-3">
                <!-- <label for="validationTooltipUsername" class="form-label">Username</label> -->
                <div class="input-group has-validation">
                  <span class="input-group-text" id="id_user">Id &emsp;&emsp;&emsp;</span>
                  <input type="number" class="form-control" name="id_user" id="id_user" aria-describedby="id_user" disabled>
                  <div class="invalid-tooltip">
                    Please choose a unique and valid Id.
                  </div>
                </div>
              </div>
              <div class="row position-relative mt-3 mb-3">
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="Usertype">Tipe pengguna&emsp;&emsp;&emsp;</span>
                    </select>
                    <select class="form-select" name="userType" aria-label="Default select example">
                        <option value="admin">Admin</option>
                        <option value="dosen">Dosen</option>
                        <option value="mahasiswa">Mahasiswa</option>
                    </select>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please select a valid user type category.
                    </div>
                  </div>
                </div>
                <div class="row position-relative mb-3">
                <div class="input-group has-validation">
                  <span class="input-group-text" id="username">Username &emsp;</span>
                  <input type="text" class="form-control" name="username" id="username" aria-describedby="username" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                  <div class="invalid-tooltip">
                    Please choose a unique and valid Name.
                  </div>
                </div>
              </div>
              <div class="row position-relative mb-3">
                <div class="input-group has-validation">
                  <span class="input-group-text" id="name">Name &emsp;</span>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="name" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                  <div class="invalid-tooltip">
                    Please choose a unique and valid Name.
                  </div>
                </div>
              </div>
              <div class="row position-relative mb-3">
                <div class="input-group has-validation">
                  <span class="input-group-text" id="password">Password &emsp;</span>
                  <input class="form-control" type="password" name="password" id="password" aria-describedby="password" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                  <div class="invalid-tooltip">
                    Please choose a unique and valid Password.
                  </div>
                </div>
              </div>
              <div class="row position-relative mb-3">
                <div class="input-group has-validation">
                  <span class="input-group-text" id="email">email &emsp;</span>
                  <input class="form-control" type="email" name="email" id="email" required></input>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                  <div class="invalid-tooltip">
                    Please choose a unique and valid email.
                  </div>
                </div>
              </div>
              <div class="row position-relative mb-3">
                <div class="input-group has-validation">
                  <span class="input-group-text" id="no_telp">Nomor Telepon &emsp;</span>
                  <input class="form-control" type="text" name="no_telp" id="no_telp" required></input>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                  <div class="invalid-tooltip">
                    Please choose a unique and valid No Telepon.
                  </div>
                </div>
              </div>
              <div class="row position-relative mb-3">
                <!-- <label for="validationTooltipUsername" class="form-label">Username</label> -->
                <div class="input-group has-validation">
                  <span class="input-group-text" id="nipNim">NIP/NIM &emsp;&emsp;&emsp;</span>
                  <input type="text" class="form-control" name="nipNim" id="nipNim" aria-describedby="nipNim" >
                  <div class="invalid-tooltip">
                    Please choose a unique and valid Id.
                  </div>
                </div>
              </div>           
              <div class="row mt-4">
                <button class="btn btn-success" type="submit" name="forms-user"><i class="bi bi-file-earmark-check"></i> Submit Data</button>
              </div>

            </form>
            <!-- End Custom Styled Validation with Tooltips -->
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script>
    document.getElementById("brand").onclick = function() {
      myFunction()
    };
    document.getElementById("category").onclick = function() {
      myFunction()
    };
    document.getElementById("product").onclick = function() {
      myFunction()
    };

    function myFunction() {
      document.getElementById("brand").className = "active";
      document.getElementById("category").className = "active";
      document.getElementById("product").className = "active";
    }
  </script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>