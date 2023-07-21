<?php
include_once('./view/pages/session.php');
require_once('./controllers/WebCartController.php');
$msg = !empty($msg) ? $msg : "";
if(!empty($_POST))
{
  require_once('update.php');
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
              <h3>Reports</h3>
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
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-shopping-cart"></i> Moviment <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="home"  class="text-dark" title="back"><i class="fa fa-reply-all"></i></a></li>
                    <li><a class="#"></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?php echo $msg; ?>
                </div>
                <div class="x_content">
                  <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th><b>#</b></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Taxes</th>
                        <th>Final Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($response as $row) {
                          ?>
                            <tr>
                              <form class="form-horizontal" action="cartlist" method="post" name="<?php $i;?>">
                                <th scope="row"><img src="./view/src/img/supermarket-product.svg" class="avatar2" alt="Avatar2"></th>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['price']?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['type'] ?></td>
                                <td><?php echo $row['taxe'].' - '. $row['tvalue'].'%'?></td>
                                <td><?php echo $row['finalvalue']?></td>
                              </form> 
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