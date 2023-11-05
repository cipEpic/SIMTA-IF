<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Admin</title>
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



    <!-- Start Icons Navigation -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">


        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">


        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
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
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav>
    <!-- End Icons Navigation -->

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
            <a href="forms-user.php" >
              <i class="bi bi-circle" id="brand"></i><span>Add User</span>
            </a>
          </li>
          <li>
            <a href="forms-progress.php" class="active">
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

      <li class="nav-heading">Pages</li>

    </ul>
  </aside>
  <!-- End Sidebar-->

  <!-- Start #main -->
  <main id="main" class="main">

    <div class="pagetitle">
    <h1>Form Add Progress Bimbingan</h1>
    <form method="post" action="process_add_progress.php">
        <label for="mahasiswa_id">Cari Mahasiswa:</label>
        <input type="text" id="searchMahasiswa" onkeyup="searchMahasiswa()" placeholder="Cari Mahasiswa...">
        <div id="mahasiswaList"></div>
        <input type="hidden" name="mahasiswa_id" id="selectedMahasiswa">
        <br>

        <label for="dosen_id">Dosen Pembimbing:</label>
        <select name="dosen_id" id="dosen_id">
            <option value="1">Dosen 1</option>
            <option value="2">Dosen 2</option>
            <option value="3">Dosen 3</option>
            <!-- Tambahkan pilihan dosen sesuai dengan kebutuhan -->
        </select>
        <br>

        <input type="submit" value="Simpan">
    </form>

    <script>
        function searchMahasiswa() {
            var input = document.getElementById("searchMahasiswa").value.toLowerCase();
            var mahasiswaList = document.getElementById("mahasiswaList");
            mahasiswaList.innerHTML = "";

            var options = document.querySelectorAll("#mahasiswa_id option");
            options.forEach(function(option) {
                if (option.text.toLowerCase().indexOf(input) > -1) {
                    var item = document.createElement("div");
                    item.textContent = option.text;
                    item.addEventListener("click", function() {
                        document.getElementById("selectedMahasiswa").value = option.value;
                        mahasiswaList.innerHTML = "";
                    });
                    mahasiswaList.appendChild(item);
                }
            });
        }
    </script>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg">
          <div class="row">
          </div>
        </div>
        <!-- End Left side columns -->
      </div>
    </section>

  </main>
  <!-- End #main -->


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
    document.getElementById("brand").onclick = function() {myFunction()};
    document.getElementById("category").onclick = function() {myFunction()};
    document.getElementById("product").onclick = function() {myFunction()};

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