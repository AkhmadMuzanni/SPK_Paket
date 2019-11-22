<?php
session_start();
require_once('db.php');


?>
<!doctype html>
<html lang="en">

<?php include 'head.php'; ?>

<body data-spy="scroll" data-target="#navbar-example" style="background-color: #00639a;">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 center-block" style="margin-top: 10%; float:none;">
        <div class="thumbnail" style="border-radius: 15px; padding: 30px;">
          <form class="form-horizontal" action="auth.php" method="post">
            <div class="text-center">
              <img src="img/logo1.png" alt="" id="logo_login">
              <h4 style="margin-bottom:20px; margin-top:10px;">Aplikasi Penentu Paket Rehabilitasi Napi Terorisme</h4>

              <p>Masuk untuk melanjutkan</p>

            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Username:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Password:</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
              </div>
            </div>
            <?php 
            if(isset($_SESSION["loginStat"]) && ($_SESSION["loginStat"] == false || $_SESSION["passwordStat"] == false)){              
              echo '<div class="text-center">';
              echo '<p style="color: red;">Username atau Password tidak sesuai</p>';
              echo '</div>';
            }
            ?>
            
            
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9 pull-right">
                <button type="submit" class="btn btn-primary pull-right">MASUK</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <!-- <script src="lib/jquery/jquery.min.js" type="text/javascript"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js" type="text/javascript"></script>
  <script src="lib/venobox/venobox.min.js" type="text/javascript"></script>
  <script src="lib/knob/jquery.knob.js" type="text/javascript"></script>
  <script src="lib/wow/wow.min.js" type="text/javascript"></script>
  <script src="lib/parallax/parallax.js" type="text/javascript"></script>
  <script src="lib/easing/easing.min.js" type="text/javascript"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js" type="text/javascript"></script>
  <script src="lib/isotope/isotope.pkgd.min.js" type="text/javascript"></script>

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