<?php
  include_once('./view/pages/session.php');
  $msg = !empty($msg) ? $msg : "";

  if ( (!isset($_SESSION['cart']))  ||  (count($_SESSION['cart']) == 0) ) {
    if ($msg == ""){
      $msg = '<div class="alert alert-danger" role="alert">There are no products added to the shopping cart.</div>';
    }
    $_SESSION['cart'] = [];
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Supermarket</title>

  <link href="./view/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="./view/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="./view/vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="./view/build/css/custom.min.css" rel="stylesheet">

  <!-- Datatables -->
  <link href="./view/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="./view/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="./view/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="./view/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="./view/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <style>
    .avatar2 {
      vertical-align: middle;
      width: 20x;
      height: 20px;
      border-radius: 50%;
    }
  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php include_once './view/pages/top-bar.php'; ?>
      <?php include_once './view/pages/main-menu.php'; ?>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Products</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for..." disabled>
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <form class="form-horizontal" action="cartadd" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-shopping-cart"></i> Cart <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="cartlist" class="text-dark" title="back"><i class="fa fa-reply-all"></i></a></li>
                      <li><a href="cartcls"   class="text-dark" title="Clear Cart"><img src="./view/src/img/supermarket-clear-cart.png" width="32" height="32"></a></li>
                      <li><button type="submit" class="btn" title="Confirm Check-Out"><img src="./view/src/img/supermarket-check-out.png" width="36" height="32"></button></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php echo $msg;?>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th><b>#</b></th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Taxe Value</th>
                          <th>Quantity</th>
                          <th>Stock</th>
                          <th>Total Value</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($_SESSION['cart'] as $row) {
                            $vtotal = (($row['pvalue'] *  $row['tvalue']) * $row['qtde']);
                            ?>
                              <tr> 
                                <th scope="row"><img src="./view/src/img/supermarket-product.svg" class="avatar2" alt="Avatar2"></th>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['pvalue'] ?></td>
                                <td><?php echo $row['tvalue'] ?></td>
                                <td><?php echo $row['qtde'] ?></td>
                                <td><?php echo $row['stock'] ?></td>
                                <td><?php echo number_format($vtotal, 2, ',', '.') ?></td>
                              </tr>
                            <?php
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /page content -->
      <!-- footer content -->
      <?php include_once './view/pages/footer.php'; ?>
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
  <!-- FullCalendar -->
  <script src="./view/vendors/moment/min/moment.min.js"></script>
  <script src="./view/vendors/fullcalendar/dist/fullcalendar.min.js"></script>

  <!-- Inicia Calendario -->
  <script src="./view/build/js/custom.js"></script>

  <!-- Datatables -->
  <script src="./view/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="./view/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="./view/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="./view/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="./view/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="./view/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="./view/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="./view/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="./view/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="./view/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="./view/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="./view/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="./view/vendors/jszip/dist/jszip.min.js"></script>
  <script src="./view/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="./view/vendors/pdfmake/build/vfs_fonts.js"></script>
</body>

</html>