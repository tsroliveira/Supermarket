<?php
$msg = "";
require_once './controllers/WebRequest.php';
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
              <h3>Types of Products</h3>
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
                  <h2><i class="fa fa-shopping-cart"></i> Operation <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="#"></a></li>
                    <li><a class="#"></a></li>
                    <li><a href="typeadd" class=""><img src="./view/src/img/supermarket-plus.svg" class="avatar2" alt="Avatar2"></a></li>
                    <li><a href="home" class="text-dark" title="back"><i class="fa fa-reply-all"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Product Type</th>
                        <th>Description</th>
                        <th>Sector</th>
                        <th>Taxe</th>
                        <th>#Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($response->response as $row) {
                        ?>
                          <tr>
                            <th scope="row"><img src="./view/src/img/supermarket-bag.svg" class="avatar2" alt="Avatar2"></th>
                            <td><?php echo $row->name ?></td>
                            <td><i class="fa fa-shirtsinbulk"></i> <?php echo $row->description ?></td>
                            <td><i class="fa fa-cutlery"></i> <?php echo $row->sector ?></td>
                            <td>
                              <i class="fa fa-bitcoin"></i> 
                              <?php 
                                $taxeName = webRequest('taxes/'.$row->id_tx, 'GET');
                                echo $taxeName->response->taxe;
                              ?> 
                            </td>
                            <td>
                              <a href="/typeupd?id=<?php echo $row->id ?>" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                              <a href="/typedel?id=<?php echo $row->id ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>                              
                            </td>
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