<?php
include_once('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./view/src/img/favicon.ico" type="image/ico" />

  <title>PortalAdm</title>

  <!-- Bootstrap -->
  <link href="./view/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="./view/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="./view/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="./view/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="./view/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="./view/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="./view/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="./view/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php include 'main-menu.php'; ?>
      <?php include 'top-bar.php'; ?>
      <!-- page content -->

      <div class="right_col" role="main">
        <div class="container">
          <h1>Welcome!</h1>
          <p> 
              Supermarket management and control system. In this portal it will 
              be possible to manage the quantity of products, 
              register your collaborators and carry out shopping simulations.
          </p>
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <h2>The best products here!</h2>
              &nbsp;&nbsp;<img src="./view/src/img/super-cart.png" style="width: 180; height: 180px;">
              <p>All quality certificates, the best supermarkets in the region.</p>
              <hr>
            </div>
            <div class="col-md-3">
              <h2>Sale off every week</h2>
              &nbsp;&nbsp;<img src="./view/src/img/super-descount.png" style="width: 180; height: 180px;">
              <p>Promotions every week on different days.</p>
              <hr>
            </div>
            <div class="col-md-3">
              <h2>Bakery with new Italian chef</h2>
              &nbsp;&nbsp;<img src="./view/src/img/super-paes.png" style="width: 180; height: 180px;">
              <p>You cannot miss the news from the bakery sector.</p>
              <hr>
            </div>
            <div class="col-md-3">
              <h2>Bakery with new Italian chef</h2>
              &nbsp;&nbsp;<img src="./view/src/img/super-apple.png" style="width: 180px; height: 180px;">
              <p>We always look for the best quality.</p>
              <hr>
            </div>
          </div>
          <br><br><br>
        </div>
      </div>
      <!-- /page content -->
      <?php include 'footer.php'; ?>
    </div>
  </div>

  <!-- jQuery -->
  <script src="./view/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="./view/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="./view/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="./view/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="./view/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="./view/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="./view/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="./view/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="./view/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="./view/vendors/Flot/jquery.flot.js"></script>
  <script src="./view/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="./view/vendors/Flot/jquery.flot.time.js"></script>
  <script src="./view/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="./view/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="./view/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="./view/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="./view/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="./view/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="./view/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="./view/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="./view/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="./view/vendors/moment/min/moment.min.js"></script>
  <script src="./view/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="./view/build/js/custom.min.js"></script>


</body>

</html>