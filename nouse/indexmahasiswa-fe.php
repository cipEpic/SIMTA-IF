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
                    <h2>Selamat datang, Nama Mahasiswa</h2>
                    <h3>Progress Bimbingan Anda</h3>
                </div>
                                
            <form id="customerForm" action="prosesedit-jquery.php?id_product=<?php echo $id_product; ?>" method="post">
                <table class="table table-striped" border="1">
                <tr>
        <th>No.</th>
        <th>Progres</th>
        <th>Status Persetujuan</th>
        <th>Unduh Revisi</th>
      </tr>
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
                        
                    </tbody>
                </table>
                
            </form>
            </div>
        </div>
	</div>
    
    <script>
        $(document).ready(function() {
            $('#customerForm').submit(function(e) {
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
