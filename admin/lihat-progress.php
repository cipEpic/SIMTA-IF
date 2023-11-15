<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Table Data Admin</title>
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
  <li>
    <a class="dropdown-item d-flex align-items-center" href="login.php">
      <i class="bi bi-box-arrow-right"></i>
      <span>Sign Out</span>
    </a>
  </li>

</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->

      </ul>
    </nav>
  </header>
  <!-- End Sidebar-->

  <!-- Start #main -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables Data</li>
          <li class="breadcrumb-item active">Tables Data Tempat Wisata</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg">
          <div class="row">

            <div class="col-12" id="tempat_wisata">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Datatables Tempat Wisata</h5>
                  <!-- Table with stripped rows -->
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Progres</th>
                        <th>Status Persetujuan</th>
                        <th>Unduh revisi</th>
                      </tr>
                    </thead>
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
                  <!-- End Table with stripped rows -->
                </div>
              </div>
            </div>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>