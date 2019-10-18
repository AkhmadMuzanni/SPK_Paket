<?php
session_start();

require_once('db.php');

$sql = "SELECT * FROM rules WHERE deleted = 0";

$data_rules = array();

if ($result = mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
    array_push($data_rules, array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]));
  }
}

$sql = "SELECT * FROM variables";

$data_variabel_independen = array();
$data_variabel_dependen = array();
$data_kategori_independen = array();
$data_kategori_dependen = array();

if ($result = mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
    $sqlKategori = "SELECT * FROM categories WHERE idVariabel = " . $row[0];
    $temp_kategori = array();

    if ($resultKategori = mysqli_query($link, $sqlKategori)) {
      while ($rowKategori = mysqli_fetch_row($resultKategori)) {
        array_push($temp_kategori, array($rowKategori[0], $rowKategori[1], $rowKategori[2], $rowKategori[3], $rowKategori[4], $rowKategori[5], $rowKategori[6]));
      }
    }

    if ($row[4] == 0) {
      array_push($data_variabel_independen, array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]));
      array_push($data_kategori_independen, $temp_kategori);
    } else {
      array_push($data_variabel_dependen, array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]));
      array_push($data_kategori_dependen, $temp_kategori);
    }
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
                  <li>
                    <a class="page-scroll" href="variabel.php">Variabel</a>
                  </li>
                  <li class="active">
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
    <form method="post" action="saveRules.php" enctype="multipart/form-data">
      <div class="container">
        <div class="row">
          <br />
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Manajemen Rules</h2>
            </div>
          </div>
        </div>

        <div class="pull-right">
          <button class="btn btn-primary" type="button">GENERATE RULES</button>
        </div>

        <div class="clearfix"></div>

        <?php
        foreach ($data_rules as $data) {
          $temp_rule = explode(";", $data[1]);
          echo '<div class="bs-callout bs-callout-info" data-kategori="' . $data[2] . '">';
          echo '<input type="hidden" class="id_rules" name="id_rules[]" value="' . $data[0] . '"></input>';
          echo '<p> <strong> JIKA </strong> ';
          for ($i = 0; $i < count($data_variabel_independen); $i++) {
            echo ' <span class="label label-primary">' . $data_variabel_independen[$i][1] . '</span> ';
            echo ' <span class="label label-info">' . ($data_kategori_independen[$i][$temp_rule[$i] - 1][2]) . '</span> ';
            if ($i != count($data_variabel_independen) - 1) {
              echo ' <strong> , </strong> ';
            }
          }
          echo ' <strong> MAKA </strong> ';
          echo ' <span class="label label-success">' . $data_variabel_dependen[0][1] . '</span> ';
          echo ' <a><input type="hidden" class="value_rule" name="value_rule[]" value="' . $data[2] . '"></input><span class="label label-info result">' . $data_kategori_dependen[0][$data[2] - 1][2] . '</span></a> ';
          echo '</p></div>';
        } ?>
        <div class="pull-right">
          <button class="btn btn-primary" type="submit">SIMPAN DATA RULES</button>
        </div>
      </div>
    </form>
  </div>
  <!-- End About area -->



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
    var json_kategori_d = '<?php echo json_encode($data_kategori_dependen); ?>';
    var obj_kategori = JSON.parse(json_kategori_d);
    var kategori_i = [];

    for (i = 0; i < obj_kategori[0].length; i++) {
      kategori_i.push(obj_kategori[0][i]);
    }
    console.log(obj_kategori);

    $('.result').on('click', function() {
      var kategori_now = $(this).closest('.bs-callout').attr('data-kategori');
      console.log($(this).closest('.bs-callout').attr('data-kategori'));
      if (parseInt(kategori_now) == obj_kategori[0].length) {
        $(this).html(obj_kategori[0][0][2]);
        $(this).closest('.bs-callout').attr('data-kategori', '1');
        $(this).prev('.value_rule').val(1);
      } else {
        $(this).html(obj_kategori[0][kategori_now][2]);
        $(this).closest('.bs-callout').attr('data-kategori', String(parseInt(kategori_now) + 1));
        $(this).prev('.value_rule').val(parseInt(kategori_now) + 1);
      }
    });
  </script>


  <?php unset($_POST); ?>
</body>

</html>