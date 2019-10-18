<?php
session_start();

require_once('db.php');

$sql = "SELECT * FROM variables";

$data_variabel = array();
$data_kategori = array();

if ($result = mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
    array_push($data_variabel, array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]));
    $sqlKategori = "SELECT * FROM categories WHERE idVariabel = " . $row[0];
    $temp_kategori = array();

    if ($resultKategori = mysqli_query($link, $sqlKategori)) {
      while ($rowKategori = mysqli_fetch_row($resultKategori)) {
        array_push($temp_kategori, array($rowKategori[0], $rowKategori[1], $rowKategori[2], $rowKategori[3], $rowKategori[4], $rowKategori[5], $rowKategori[6]));
      }
    }

    array_push($data_kategori, $temp_kategori);
  }
}



// print_r($data_variabel);



?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>SPK Paket</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/editable_table.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area stick" style="background: rgba(0, 0, 0, 1);">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.php">
                  <h1>SPK Paket</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <a class="page-scroll" href="index.php">Beranda</a>
                  </li>
                  <li class="active">
                    <a class="page-scroll" href="variabel.php">Variabel</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="rules.php">Rules</a>
                  </li>

                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->


  <!-- Start Slider Area -->

  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <form method="post" action="saveVariabel.php" enctype="multipart/form-data">
      <div class="container">
        <div class="row">
          <br />
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Manajemen Variabel</h2>
            </div>
          </div>
        </div>

        <div id="table" class="table-editable">

          <table class="table" style="width:100%">
            <thead class="thead-dark">
              <tr>
                <th>Nama Variabel</th>
                <th>Batas Bawah</th>
                <th>Batas Atas</th>
                <th>Jenis</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data_variabel as $data) {
                echo '<tr>';
                echo '<input type="hidden" name="id_variabel[]" value="' . $data[0] . '"></input>';
                echo '<input type="hidden" name="nama_variabel[]" value="' . $data[1] . '"></input><td class="editCell" contenteditable="true">' . $data[1] . '</td>';
                echo '<input type="hidden" name="batas_bawah_variabel[]" value="' . $data[3] . '"></input><td class="editCell" contenteditable="true">' . $data[3] . '</td>';
                echo '<input type="hidden" name="batas_atas_variabel[]" value="' . $data[2] . '"></input><td class="editCell" contenteditable="true">' . $data[2] . '</td>';
                if ($data[4] == 0) {
                  echo '<input type="hidden" name="jenis_variabel[]" value="' . $data[4] . '"></input><td class="editCell"><span class="label label-primary">Variabel Independen</span></td>';
                } else {
                  echo '<input type="hidden" name="jenis_variabel[]" value="' . $data[4] . '"></input><td class="editCell"><span class="label label-success">Variabel Dependen</span></td>';
                }
                echo '<td><button class="btn btn-danger" type="button">Hapus</button></td>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div>

        <div class="pull-right">
          <button class="btn btn-info" type="button">TAMBAH VARIABEL</button>
          <button class="btn btn-primary" type="submit">SIMPAN DATA VARIABEL</button>
        </div>


      </div>
    </form>
  </div>
  <!-- End About area -->

  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
    <form method="post" action="saveKategori.php" enctype="multipart/form-data">
      <div class="container">
        <div class="row">
          <br />
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Manajemen Kategori</h2>
            </div>
          </div>
        </div>

        <div class="pull-right" style="margin-bottom:10px;">
          <button class="btn btn-primary" type="submit">GENERATE ULANG KATEGORI</button>
        </div>

        <div class="clearfix"></div>

        <?php
        for ($i = 0; $i < count($data_variabel); $i++) {
          if ($data_variabel[$i][4] == 0) {
            echo '<input type="hidden" name="id_variabel[]" value="' . $data_variabel[$i][0] . '"><div class="panel panel-primary">';
          } else {
            echo '<input type="hidden" name="id_variabel[]" value="' . $data_variabel[$i][0] . '"><div class="panel panel-success">';
          }
          ?>

          <div class="panel-heading"><?php echo $data_variabel[$i][1] ?></div>
          <div class="panel-body">
            <div id="table" class="table-editable">

              <table class="table" style="width:100%">
                <thead class="thead-dark">
                  <tr>
                    <th>Nama Kategori</th>
                    <th>Batas Bawah</th>
                    <th>Batas Tengah</th>
                    <th>Batas Atas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($data_kategori[$i] as $data) {
                      echo '<tr>';
                      echo '<input type="hidden" name="id_kategori_' . $data_variabel[$i][0] . '[]" value="' . $data[0] . '"></input>';
                      echo '<input type="hidden" name="nama_kategori_' . $data_variabel[$i][0] . '[]" value="' . $data[2] . '"></input><td class="editCell" contenteditable="true">' . $data[2] . '</td>';
                      echo '<input type="hidden" name="batas_bawah_kategori_' . $data_variabel[$i][0] . '[]" value="' . $data[3] . '"></input><td class="editCell" contenteditable="true">' . $data[3] . '</td>';
                      echo '<input type="hidden" name="batas_tengah_kategori_' . $data_variabel[$i][0] . '[]" value="' . $data[4] . '"></input><td class="editCell" contenteditable="true">' . $data[4] . '</td>';
                      echo '<input type="hidden" name="batas_atas_kategori_' . $data_variabel[$i][0] . '[]" value="' . $data[5] . '"></input><td class="editCell" contenteditable="true">' . $data[5] . '</td>';
                      echo '<td><button class="btn btn-danger" type="button">Hapus</button></td>';
                      echo '</tr>';
                    }
                    ?>
                </tbody>
              </table>
            </div>

            <div class="pull-right" style="margin-bottom:10px;">
              <button class="btn btn-info" type="button">TAMBAH KATEGORI</button>
            </div>

            <br />
          </div>
      </div>
    <?php
    }
    ?>
    <div class="pull-right" style="margin-bottom:10px;">
      <button class="btn btn-primary" type="submit">SIMPAN DATA KATEGORI</button>
    </div>

  </div>
  </form>
  </div>
  <!-- End Service area -->

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2>SPK_Paket</h2>
                </div>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +123 456 789</p>
                  <p><span>Email:</span> contact@example.com</p>
                  <p><span>Working Hours:</span> 9am-5pm</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="img/portfolio/1.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/2.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/3.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/4.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/5.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/6.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>SPK_Paket</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              , Created by <a href="https://bootstrapmade.com/">BEVY Digital Dev.</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
  <script src="js/editable_table.js"></script>
  <script type="text/javascript">
    $('.editCell').on('DOMSubtreeModified', function() {
      $(this).prev('input').val($(this).text());
    });
  </script>
  <?php unset($_POST); ?>
</body>

</html>