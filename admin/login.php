<?php
session_start();

require_once "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($host, $_POST['username']);
    $password = mysqli_real_escape_string($host, $_POST['password']);

    // Check admin credentials
    $admin_query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $admin_result = mysqli_query($host, $admin_query);
    $admin_count = mysqli_num_rows($admin_result);

    // Check dosen credentials
    $dosen_query = "SELECT * FROM dosen WHERE username = '$username' AND password = '$password'";
    $dosen_result = mysqli_query($host, $dosen_query);
    $dosen_count = mysqli_num_rows($dosen_result);

    // Check mahasiswa credentials
    $mahasiswa_query = "SELECT * FROM mahasiswa WHERE username = '$username' AND password = '$password'";
    $mahasiswa_result = mysqli_query($host, $mahasiswa_query);
    $mahasiswa_count = mysqli_num_rows($mahasiswa_result);

    if ($admin_count == 1) {
        $_SESSION['login_user'] = $username;
        $_SESSION['user_type'] = 'admin';
        header("location: index.php"); // Redirect to the admin dashboard
    } elseif ($dosen_count == 1) {
        // Fetch the dosen information
        $dosen_query = "SELECT id_dosen FROM dosen WHERE username = '$username'";
        $dosen_result = mysqli_query($host, $dosen_query);

        if ($dosen_result) {
            $dosen_data = mysqli_fetch_assoc($dosen_result);
            $id_dosen = $dosen_data['id_dosen'];

            $_SESSION['login_user'] = $username;
            $_SESSION['user_type'] = 'dosen';
            header("location: ../public/indexdosen.php?id_dosen=$id_dosen");
        } else {
            // Handle the case where the query fails
            echo "Error fetching dosen information: " . mysqli_error($host);
        }
    } elseif ($mahasiswa_count == 1) {
        $_SESSION['login_user'] = $username;
        $_SESSION['user_type'] = 'mahasiswa';
        header("location: ../public/indexmahasiswa.php"); // Redirect to the mahasiswa dashboard

        // Fetch the mahasiswa information
        $mahasiswa_query = "SELECT id_mahasiswa FROM mahasiswa WHERE username = '$username'";
        $mahasiswa_result = mysqli_query($host, $mahasiswa_query);

        if ($mahasiswa_result) {
            $mahasiswa_data = mysqli_fetch_assoc($mahasiswa_result);
            $id_mahasiswa = $mahasiswa_data['id_mahasiswa'];

            $_SESSION['login_user'] = $username;
            $_SESSION['user_type'] = 'mahasiswa';
            header("location: ../public/indexmahasiswa.php?id_mahasiswa=$id_mahasiswa");
        } else {
            // Handle the case where the query fails
            echo "Error fetching mahasiswa information: " . mysqli_error($host);
        }
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>

<!-- Rest of your HTML code -->




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                    </div>

                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Home ->> <a href="../public/index.php">SIMTA.com</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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