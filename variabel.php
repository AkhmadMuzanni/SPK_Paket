<?php
session_start();

require_once('db.php');

$sql = "SELECT * FROM variables where deleted = 0";

$data_variabel = array();
$data_kategori = array();

if ($result = mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
    array_push($data_variabel, array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]));
    $sqlKategori = "SELECT * FROM categories WHERE idVariabel = " . $row[0] . " and deleted = 0";
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
                  <h1>APPARENT</h1>
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
                if ($data[4] == 0) {
                  echo '<tr>';
                  echo '<input type="hidden" name="id_variabel[]" value="' . $data[0] . '"></input>';
                  echo '<input type="hidden" name="nama_variabel[]" value="' . $data[1] . '"></input><td class="editCell" contenteditable="true">' . $data[1] . '</td>';
                  echo '<input type="hidden" name="batas_bawah_variabel[]" value="' . $data[3] . '"></input><td class="editCell" contenteditable="true">' . $data[3] . '</td>';
                  echo '<input type="hidden" name="batas_atas_variabel[]" value="' . $data[2] . '"></input><td class="editCell" contenteditable="true">' . $data[2] . '</td>';
                  echo '<input type="hidden" name="jenis_variabel[]" value="' . $data[4] . '"></input><td class="editCell"><span class="label label-primary">Variabel Independen</span></td>';
                  // echo '<td><button class="btn btn-danger btn_hapus" type="button">Hapus</button></td>';
                  echo '</tr>';
                }
              }
              foreach ($data_variabel as $data) {
                if ($data[4] == 1) {
                  echo '<tr>';
                  echo '<input type="hidden" name="id_variabel[]" value="' . $data[0] . '"></input>';
                  echo '<input type="hidden" name="nama_variabel[]" value="' . $data[1] . '"></input><td class="editCell" contenteditable="true">' . $data[1] . '</td>';
                  echo '<input type="hidden" name="batas_bawah_variabel[]" value="' . $data[3] . '"></input><td class="editCell" contenteditable="true">' . $data[3] . '</td>';
                  echo '<input type="hidden" name="batas_atas_variabel[]" value="' . $data[2] . '"></input><td class="editCell" contenteditable="true">' . $data[2] . '</td>';
                  echo '<input type="hidden" name="jenis_variabel[]" value="' . $data[4] . '"></input><td class="editCell"><span class="label label-success">Variabel Dependen</span></td>';
                  echo '<td></td>';
                  echo '</tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>

        <div class="pull-right">
          <!-- <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalVariabel">TAMBAH VARIABEL</button> -->
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
            echo '<input type="hidden" class="id_variabel" name="id_variabel[]" value="' . $data_variabel[$i][0] . '"><div class="panel panel-primary">';
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
                          echo '<td><button class="btn btn-danger btn_hapus" type="button">Hapus</button></td>';
                          echo '</tr>';
                        }
                        ?>
                  </tbody>
                </table>
              </div>

              <div class="pull-right" style="margin-bottom:10px;">
                <button class="btn btn-info btn_tambah_kategori" type="button" data-toggle="modal" data-target="#modalKategori">TAMBAH KATEGORI</button>
              </div>

              <br />
            </div>
      </div>
  <?php
    }
  }
  ?>
  <?php
  for ($i = 0; $i < count($data_variabel); $i++) {
    if ($data_variabel[$i][4] == 1) {
      echo '<input type="hidden" class="id_variabel" name="id_variabel[]" value="' . $data_variabel[$i][0] . '"><div class="panel panel-success">';

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
                    echo '<td><button class="btn btn-danger btn_hapus" type="button">Hapus</button></td>';
                    echo '</tr>';
                  }
                  ?>
            </tbody>
          </table>
        </div>

        <div class="pull-right" style="margin-bottom:10px;">
          <button class="btn btn-info btn_tambah_kategori" type="button" data-toggle="modal" data-target="#modalKategori">TAMBAH KATEGORI</button>
        </div>

        <br />
      </div>
  </div>
<?php
  }
}
?>
<div class="pull-right" style="margin-bottom:10px;">
  <button class="btn btn-primary" type="submit">SIMPAN DATA KATEGORI</button>
</div>

</div>
</form>
</div>
<!-- End Service area -->

<div id="modalVariabel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Variabel</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="insertVariabel.php" id="formVariabel" method="post">
          <div class="form-group">
            <label class="control-label col-sm-5" for="namaVariabel">Nama Variabel:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control" name="namaVariabel" id="namaVariabel" placeholder="Nama Variabel">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" for="batasBawah">Batas Bawah</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="batasBawah" id="batasBawah" placeholder="Batas Bawah">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" for="batasAtas">Batas Atas</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="batasAtas" id="batasAtas" placeholder="Batas Atas">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_insert_variabel">Simpan</button>
      </div>
    </div>

  </div>
</div>

<div id="modalKategori" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="insertKategori.php" method="post" id="formKategori">
        <input type="hidden" class="form-control" name="idVariabel" id="idVariabel">
          <div class="form-group">
            <label class="control-label col-sm-5" for="namaKategori">Nama Kategori:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control" name="namaKategori" id="namaKategori" placeholder="Nama Kategori">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" for="batasBawah">Batas Bawah</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="batasBawah" id="batasBawah" placeholder="Batas Bawah">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" for="batasTengah">Batas Tengah</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="batasTengah" id="batasTengah" placeholder="Batas Tengah">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" for="batasAtas">Batas Atas</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="batasAtas" id="batasAtas" placeholder="Batas Atas">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_insert_kategori">Simpan</button>
      </div>
    </div>

  </div>
</div>

<?php include 'footer.php'; ?>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

  $("#btn_insert_variabel").click(function() {
    $("#formVariabel").submit();
  });

  $("#btn_insert_kategori").click(function() {
    $("#formKategori").submit();
  });

  $(".btn_tambah_kategori").click(function() {
    console.log('ksasa');
    console.log($(this).closest('.panel').prev('.id_variabel').val());
    $('#idVariabel').val($(this).closest('.panel').prev('.id_variabel').val());
  });

  $(".btn_hapus").click(function() {
    $(this).closest('tr').remove();
  });
</script>
<?php unset($_POST); ?>
</body>

</html>