<?php
session_start();

// Check if the user is not logged in or is not a dosen
if (!isset($_SESSION['login_user']) || $_SESSION['user_type'] !== 'dosen') {
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
    <a href="#" class="w3-bar-item w3-button w3-padding-large">MANAJEMEN TA</a>
    <a href="..\admin\login.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right no-underline"><i class="fa fa-user"></i> LOGIN </a>
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
                <h3 class="card-title">Progress Bimbingan nama mahasiswa</h3>
                </div>
                <?php
                  // Define or retrieve $id_progress before this point
                  $id_progress = $_GET['id_progress']; // Example, adjust based on your implementation
                  ?>             
                <form id="dosenForm" action="proses_update_bimbingan.php" method="post">
                <!-- Tambahkan input hidden untuk menyimpan id_progress -->
                <input type="hidden" name="id_progress" value="<?php echo $id_progress; ?>">


            <table class="table table-striped" border="1">

                <?php
                // Ambil data dari database
                require_once "../config/config.php";

                 // Pastikan id_progress sudah terdefinisi, atau berikan nilai default jika belum
                  $id_progress = isset($_GET['id_progress']) ? $_GET['id_progress'] : 0;

                // Gantilah "nama_tabel" dan "id_progress" dengan nama tabel dan id yang sesuai di database Anda
                $query = "SELECT * FROM progress_bimbingan WHERE id_progress = $id_progress";
                // Eksekusi query dan ambil hasilnya
                $result = mysqli_query($host, $query);

                // Pengecekan hasil query
                if ($result) {
                    $data = mysqli_fetch_assoc($result);

                    // Cek apakah $data mengandung kunci yang diperlukan
                    if (!empty($data)) {
                        ?>

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
                            <input type="checkbox" name="progress[]" value="sampul" <?php echo $data['sampul'] == 1 ? 'checked' : ''; ?>> Sampul depan
                            <br>
                            <input type="checkbox" name="progress[]" value="l_judul" <?php echo $data['l_judul'] == 1 ? 'checked' : ''; ?>> Lembar judul
                            <br>
                            <input type="checkbox" name="progress[]" value="l_pengesahan"<?php echo $data['l_pengesahan'] == 1 ? 'checked' : ''; ?>> Lembar pengesahan
                            <br>
                            <input type="checkbox" name="progress[]" value="abstrak"<?php echo $data['abstrak'] == 1 ? 'checked' : ''; ?>> Abstrak
                            <br>
                            <input type="checkbox" name="progress[]" value="katpeng"<?php echo $data['katpeng'] == 1 ? 'checked' : ''; ?>> Kata pengantar
                            <br>
                            <input type="checkbox" name="progress[]" value="dafis"<?php echo $data['dafis'] == 1 ? 'checked' : ''; ?>> Daftar isi
                            <br>
                            <input type="checkbox" name="progress[]" value="daftab"<?php echo $data['daftab'] == 1 ? 'checked' : ''; ?>> Daftar table
                            <br>
                            <input type="checkbox" name="progress[]" value="dafgam"<?php echo $data['dafgam'] == 1 ? 'checked' : ''; ?>> Daftar gambar
                          </fieldset>
                        </td>
                        <!-- <td><input type="text" name="file_pendahuluan"></td> -->
                        <td><textarea name="file_revisi_pendahuluan"><?php echo ($data['file_revisi_pendahuluan'] !== null) ? $data['file_revisi_pendahuluan'] : ''; ?></textarea></td>

                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>BAB I</td>
                        <td>
                          <fieldset>
                            <input type="checkbox" name="progress[]" value="latbel" <?php echo $data['latbel'] == 1 ? 'checked' : ''; ?>> a. Latar belakang
                            <br>
                            <input type="checkbox" name= "progress[]" value="rumusan" <?php echo $data['rumusan'] == 1 ? 'checked' : ''; ?>> b. Rumusan masalah
                            <br>
                            <input type="checkbox" name="progress[]" value="batasan" <?php echo $data['batasan'] == 1 ? 'checked' : ''; ?>> c. Batasan masalah
                            <br>
                            <input type="checkbox" name="progress[]" value="tujuan" <?php echo $data['tujuan'] == 1 ? 'checked' : ''; ?>> d. Tujuan
                            <br>
                            <input type="checkbox" name="progress[]" value="manfaat" <?php echo $data['manfaat'] == 1 ? 'checked' : ''; ?>> e. Manfaat
                            <br>
                            <input type="checkbox" name="progress[]" value="sistematika_penulisan" <?php echo $data['sistematika_penulisan'] == 1 ? 'checked' : ''; ?>> f. Sistematika Penulisan
                          </fieldset>
                        </td>
                        <!-- <td><input type="text" name="file_Bab1"></td> -->
                        <!-- <td><textarea name="file_bab1"><?php echo ($data['file_bab1'] !== null) ? $data['file_bab1'] : ''; ?></textarea></td> -->
                        <td><textarea name="file_revisi_bab1"><?php echo isset($data['file_revisi_bab1']) ? $data['file_revisi_bab1'] : ''; ?></textarea></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>BAB II</td>
                        <td>
                          <fieldset>
                            <input type="checkbox" name="progress[]" value="teoritis" <?php echo $data['teoritis'] == 1 ? 'checked' : ''; ?>> a. Tinjauan teori
                            <br>
                            <input type="checkbox" name="progress[]" value="empiris" <?php echo $data['empiris'] == 1 ? 'checked' : ''; ?>> b. Tinjauan Empiris
                          </fieldset>
                        </td>
                        <!-- <td><input type="text" name="file_Bab2"></td> -->
                        <!-- <td><textarea name="file_bab2"><?php echo ($data['file_bab2'] !== null) ? $data['file_bab2'] : ''; ?></textarea></td> -->
                        <td><textarea name="file_revisi_bab2"><?php echo isset($data['file_revisi_bab2']) ? $data['file_revisi_bab2'] : ''; ?></textarea></td>

                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>BAB III</td>
                        <td>
                          <fieldset>
                            <input type="checkbox" name="progress[]" value="metopen" <?php echo $data['metopen'] == 1 ? 'checked' : ''; ?>> a. Data dan Metode Pengumpulan Data
                            <br>
                            <input type="checkbox" name="progress[]" value="desain_sistem" <?php echo $data['desain_sistem'] == 1 ? 'checked' : ''; ?>> b. Desain sistem/Metode
                            <br>
                            <input type="checkbox" name="progress[]" value="desain_evaluasi" <?php echo $data['desain_evaluasi'] == 1 ? 'checked' : ''; ?>> c. Desain Evaluasi Sistem/Metode
                          </fieldset>
                        </td>
                        <!-- <td><input type="text" name="file_Bab3"></td> -->
                        <!-- <td><textarea name="file_bab3"><?php echo ($data['file_bab3'] !== null) ? $data['file_bab3'] : ''; ?></textarea></td> -->
                        <td><textarea name="file_revisi_bab3"><?php echo isset($data['file_revisi_bab3']) ? $data['file_revisi_bab3'] : ''; ?></textarea></td>

                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>BAB IV</td>
                        <td>
                          <fieldset>
                            <input type="checkbox" name="progress[]" value="proses_kumpul_data" <?php echo $data['proses_kumpul_data'] == 1 ? 'checked' : ''; ?>> a. Proses Pengumpulan Data
                            <br>
                            <input type="checkbox" name="progress[]" value="implementasi_sistem" <?php echo $data['implementasi_sistem'] == 1 ? 'checked' : ''; ?>> b. Implementasi Sistem/Metode
                            <br>
                            <input type="checkbox" name="progress[]" value="implementasi_evaluasi" <?php echo $data['implementasi_evaluasi'] == 1 ? 'checked' : ''; ?>> c. Implementasi Evaluasi Sistem/Metode
                          </fieldset>
                        </td>
                        <!-- <td><input type="text" name="file_bab4"></td> -->
                        <!-- <td><textarea name="file_bab4"><?php echo ($data['file_bab4'] !== null) ? $data['file_bab4'] : ''; ?></textarea></td> -->
                        <td><textarea name="file_revisi_bab4"><?php echo isset($data['file_revisi_bab4']) ? $data['file_revisi_bab4'] : ''; ?></textarea></td>

                      </tr>
                      <tr>
                        <td>6.</td>
                        <td>BAB V</td>
                        <td>
                          <fieldset>
                            <input type="checkbox" name="progress[]" value="kesimpulan" <?php echo $data['kesimpulan'] == 1 ? 'checked' : ''; ?>> a. Kesimpulan
                            <br>
                            <input type="checkbox" name="progress[]" value="saran" <?php echo $data['saran'] == 1 ? 'checked' : ''; ?>> b. Saran
                          </fieldset>
                        </td>
                        <!-- <td><input type="text" name="file_bab5"></td> -->
                        <!-- <td><textarea name="file_bab5"><?php echo ($data['file_bab5'] !== null) ? $data['file_bab5'] : ''; ?></textarea></td> -->
                        <td><textarea name="file_revisi_bab5"><?php echo isset($data['file_revisi_bab5']) ? $data['file_revisi_bab5'] : ''; ?></textarea></td>

                      </tr>
                      <tr>
                        <td>7.</td>
                        <td>Akhir</td>
                        <td>
                          <fieldset>
                            <input type="checkbox" name="progress[]" value="dafpus" <?php echo $data['dafpus'] == 1 ? 'checked' : ''; ?>> a. Daftar Pustaka
                            <br>
                            <input type="checkbox" name="progress[]" value="lampiran" <?php echo $data['lampiran'] == 1 ? 'checked' : ''; ?>> b. Lampiran
                          </fieldset>
                        </td>
                        <!-- <td><input type="text" name="file_akhir"></td> -->
                        <!-- <td><textarea name="file_akhir"><?php echo ($data['file_akhir'] !== null) ? $data['file_akhir'] : ''; ?></textarea></td> -->
                        <td><textarea name="file_revisi_akhir"><?php echo isset($data['file_revisi_akhir']) ? $data['file_revisi_akhir'] : ''; ?></textarea></td>

                      </tr>
                                        
                                    </tbody>
                                </table>
                                <tr>
                                <td></td>
                                <td><input type="submit" name="updateb" value="edit" class="btn btn-danger"></td>
                                        </tr>


                                        <?php
                    } else {
                        echo "Data not found."; // Outputkan pesan jika data tidak ditemukan
                    }
                } else {
                    echo "Error in query: " . mysqli_error($host); // Outputkan pesan kesalahan query
                }
                ?>
                            </form>
            </div>
        </div>
	</div>
    
    <script>
        $(document).ready(function() {
            $('#dosenForm').submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman form

                // Menghapus pesan error yang mungkin ada
                $('.error').remove();

                // Cek setiap input dengan class "required"
                $('.required').each(function() {
                    if ($(this).val() === '') {
                        // Mendapatkan nama kolom dari label input
                        var columnName = $(this).closest('tr').find('td:first').text();

                        // Jika input kosong, tambahkan pesan error dan beri warna merah di kolomnya
                        $(this).after('<span class="error">' + columnName + ' is required</span>');
                        $(this).css('border-color', 'red');
                    }
                });

                // Jika tidak ada input yang kosong, submit form
                if ($('.error').length === 0) {
                    $(this).unbind('submit').submit();
                }
            });

            // Menghapus pesan error dan warna merah saat input diubah
            $('.required').keyup(function() {
                $(this).next('.error').remove();
                $(this).css('border-color', '');
            });
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
