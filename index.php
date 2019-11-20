<?php
session_start();
require_once('db.php');
$sql = "SELECT idRule, idVariabel, idKategori, idKategoriHasil FROM ruledetails JOIN rules on ruledetails.idRule = rules.id ";

$data_responden = array();

if ($result = mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
    array_push($data_responden, array($row[0]));
  }
}

$hasil = "Belum Ditentukan";
$pendidikan = 0;

if (isset($_POST["inputPendidikan"])) {
  if ($_POST["inputPendidikan"] == "1") {
    $pendidikan = 0;
  } else if ($_POST["inputPendidikan"] == "2") {
    $pendidikan = 0;
  } else if ($_POST["inputPendidikan"] == "3") {
    $pendidikan = 0;
  } else if ($_POST["inputPendidikan"] == "4") {
    $pendidikan = 1;
  } else if ($_POST["inputPendidikan"] == "5") {
    $pendidikan = 2;
  } else if ($_POST["inputPendidikan"] == "6") {
    $pendidikan = 2;
  } else if ($_POST["inputPendidikan"] == "7") {
    $pendidikan = 2;
  }
}

if (isset($_POST["inputNama"])) {
  $str_input = "python -c \"import run; print run.main(" . $_POST["inputVonis"] . "," . $pendidikan . "," . $_POST["inputUmur"] . ")\"";
  // echo "sukses";
  // echo $str_input;
  // shell_exec("python -c \"import training_SVR; print training_SVR.main('jagung')\"";	
  $hasil = shell_exec($str_input);
  // echo $hasil;
}



?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>APPARENT</title>
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
    <div id="sticker" class="header-area">
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
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1>APPARENT</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="#home">Beranda</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#about">Form</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">Hasil</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#paket">Paket</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="variabel.php">Variabel</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="rules.php">Rules</a>
                  </li>
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
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="img/slider/counter2.jpg" alt="" title="#slider-direction-1" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">APPARENT</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Aplikasi Penentu Paket Rehabilitasi <br /> Napi Terorisme</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#about">ISI FORM</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Form Rekomendasi</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <!-- <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="img/about/1.jpg" alt="">
								</a>
            </div>
          </div>
        </div> -->

        <div>
          <form method="post" action="index.php">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputNama">Nama Narapidana</label>
                  <input type="text" class="form-control" id="inputNama" name="inputNama" placeholder="Nama">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputVonis">Lama Vonis</label>
                  <input type="number" class="form-control" id="inputVonis" name="inputVonis" placeholder="Lama Vonis (dalam tahun)">
                </div>

              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputPendidikan">Pendidikan Terakhir</label>
                  <select class="form-control" id="inputPendidikan" name="inputPendidikan">
                    <option value="0">Pilih Pendidikan Terakhir</option>
                    <option value="1">Tidak Tamat SD</option>
                    <option value="2">SD/MI sederajat</option>
                    <option value="3">SMP/MTs sederajat</option>
                    <option value="4">SMA/MA sederajat</option>
                    <option value="5">Diploma</option>
                    <option value="6">S1</option>
                    <option value="7">S2</option>
                    <option value="8">S3</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputUmur">Umur</label>
                  <input type="number" class="form-control" id="inputUmur" name="inputUmur" placeholder="Umur (dalam tahun)">
                </div>

              </div>


            </div>

            <div class="pull-right">
              <button type="submit" class="btn btn-primary">TENTUKAN PAKET</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- End About area -->

  <!-- Start team Area -->
  <div id="team" class="our-team-area area-padding">
    <!-- Start Wellcome Area -->
    <div class="wellcome-area">
      <form id="form_upload" method="post" action="uploadFile.php" enctype="multipart/form-data">
        <div class="well-bg">
          <div class="test-overly"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12  text-center">
                <div class="wellcome-text">
                  <div class="well-text text-center">
                    <h2>Unggah Berkas</h2>
                    <p>
                      Unggah berkas berisi nilai dari variabel-variabel independen dan dapatkan rekomendasi paketnya.
                    </p>
                    <a href="template.xlsx"><button class="btn btn-primary" type="button"><span class="fa fa-download"></span> Download Template</button></a>
                    <div class=clearfix></div>
                    <div class="subs-feilds">
                      <div class="suscribe-input">
                        <input type="file" id="file_upload" name="file_upload" style="display: none;" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        <input type="text" class="email form-control width-80" id="filename" placeholder="Pilih File">
                        <button type="button" id="btn_browse" class="add-btn width-20">Browse</button>
                        <div id="msg_Submit" class="h3 text-center hidden"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="ready-btn" id="btn_upload">UPLOAD</a>
              </div>

            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- End Wellcome Area -->

  </div>
  <!-- End Team Area -->

  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="section-headline services-head text-center">
        <h2>Hasil Rekomendasi</h2>
      </div>
      <br />
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
                <img src="img/about/1.jpg" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="outputNama">Nama Narapidana</label>
            <input disabled type="text" class="form-control" id="outputNama" placeholder="Nama" value="<?php if (isset($_POST["inputNama"])) {
                                                                                                          echo $_POST["inputNama"];
                                                                                                        } ?>">
          </div>
          <div class="form-group">
            <label for="outputVonis">Lama Vonis</label>
            <input disabled type="text" class="form-control" id="outputVonis" placeholder="Lama Vonis" value="<?php if (isset($_POST["inputVonis"])) {
                                                                                                                echo $_POST["inputVonis"];
                                                                                                              } ?>">
          </div>
          <div class="form-group">
            <label for="outputPendidikan">Pendidikan Terakhir</label>
            <input disabled type="text" class="form-control" id="outputPendidikan" placeholder="Pendidikan" value=<?php
                                                                                                                  if (isset($_POST["inputPendidikan"])) {
                                                                                                                    if ($_POST["inputPendidikan"] == "1") {
                                                                                                                      echo "\"Belum Tamat SD\"";
                                                                                                                    } else if ($_POST["inputPendidikan"] == "2") {
                                                                                                                      echo "\"SD/MI sederajat\"";
                                                                                                                    } else if ($_POST["inputPendidikan"] == "3") {
                                                                                                                      echo "\"SMP/Mts sederajat\"";
                                                                                                                    } else if ($_POST["inputPendidikan"] == "4") {
                                                                                                                      echo "\"SMA/MA sederajat\"";
                                                                                                                    } else if ($_POST["inputPendidikan"] == "5") {
                                                                                                                      echo "\"Diploma\"";
                                                                                                                    } else if ($_POST["inputPendidikan"] == "6") {
                                                                                                                      echo "\"S1\"";
                                                                                                                    } else if ($_POST["inputPendidikan"] == "7") {
                                                                                                                      echo "\"S2\"";
                                                                                                                    } else if ($_POST["inputPendidikan"] == "8") {
                                                                                                                      echo "\"S3\"";
                                                                                                                    } else {
                                                                                                                      echo "\"-\"";
                                                                                                                    }
                                                                                                                  }
                                                                                                                  ?>>
          </div>
          <div class="form-group">
            <label for="outputUmur">Umur</label>
            <input disabled type="text" class="form-control" id="outputUmur" placeholder="Umur" value="<?php if (isset($_POST["inputUmur"])) {
                                                                                                          echo $_POST["inputUmur"];
                                                                                                        } ?>">
          </div>
          <div class="form-group">
            <label for="outputPaket">Rekomendasi Paket</label>
            <input disabled type="text" class="form-control" id="outputPaket" placeholder="Paket" value="<?php echo $hasil; ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Service area -->

  <!-- Start paket area -->
  <div id="paket" class="services-area area-padding">
    <div class="container">
      <div class="section-headline services-head text-center">
        <h2>Informasi Paket</h2>
      </div>
      <br />
      <div class="row">
        <div class="col-md-3">
          <div class="thumbnail">
            <div class="text-center" style="margin-top: 20px;">
              <span class="glyphicon glyphicon-th-large paket_icon" aria-hidden="true"></span>
            </div>
            <div class="caption">
              <h3 class="text-center">Paket 1</h3>
              <br>
              <p class="text-justify">Paket ini ditujukan untuk narapidana terorisme dengan tingkat ancaman rendah</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <div class="text-center" style="margin-top: 20px;">
              <span class="glyphicon glyphicon-th-large paket_icon" aria-hidden="true"></span>
            </div>
            <div class="caption">
              <h3 class="text-center">Paket 2</h3>
              <br>
              <p class="text-justify">Paket ini ditujukan untuk narapidana terorisme dengan tingkat ancaman rendah</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <div class="text-center" style="margin-top: 20px;">
              <span class="glyphicon glyphicon-th-large paket_icon" aria-hidden="true"></span>
            </div>
            <div class="caption">
              <h3 class="text-center">Paket 3</h3>
              <br>
              <p class="text-justify">Paket ini ditujukan untuk narapidana terorisme dengan tingkat ancaman rendah</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <div class="text-center" style="margin-top: 20px;">
              <span class="glyphicon glyphicon-th-large paket_icon" aria-hidden="true"></span>
            </div>
            <div class="caption">
              <h3 class="text-center">Paket 4</h3>
              <br>
              <p class="text-justify">Paket ini ditujukan untuk narapidana terorisme dengan tingkat ancaman rendah</p>
            </div>
          </div>
        </div>

        <div>
        </div>

    </div>
  </div>
                                                                                                      </div>
  <!-- End Service area -->





  <?php include 'footer.php'; ?>

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

  <script type="text/javascript">
    $('#btn_browse').on('click', function() {
      $('#filename').val("Uploaded");
      $('#file_upload').click();
    });

    $('#file_upload').on('change', function() {
      $('#filename').val($(this).val().replace('C:\\fakepath\\', ''));
    });

    $('#btn_upload').on('click', function() {
      $('#form_upload').submit();
    });
  </script>


  <?php unset($_POST); ?>
</body>

</html>