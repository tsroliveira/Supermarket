<?php
  $msg = "";
  include_once('./view/pages/session.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Supermarket</title>

    <!-- Bootstrap -->
    <link href="./view/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./view/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./view/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="./view/build/css/custom.min.css" rel="stylesheet">
    <link rel="icon" href="./view/src/img/favicon.ico" type="image/ico" />
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
                <h3>Create Category</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group row pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." disabled>
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Wizards <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="typelist" class="text-dark" title="back"><i class="fa fa-reply-all"></i></a></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><!-- Smart Wizard -->
                    <?php echo $msg;?>
                    <?php echo $ok;?>
                    <form class="form-horizontal form-label-left" action="typeadd" method="post" enctype="multipart/form-data">
                      <div id="wizard" class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">
                          <li>
                            <a href="#step-1">
                              <span class="step_no">1</span>
                              <span class="step_descr">
                                Step 1<br />
                                <small>&nbsp;&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;&nbsp;</small>
                              </span>
                            </a>
                          </li>
                          <li>
                            <a href="#step-2">
                              <span class="step_no">2</span>
                              <span class="step_descr">
                                Step 2<br />
                                <small>&nbsp;&nbsp;&nbsp;&nbsp; Value Data &nbsp;&nbsp;&nbsp;</small>
                              </span>
                            </a>
                          </li>
                        </ul>
                        <div id="step-1">
                          <div class="form-group row">
                            <div class="col-md-2 col-sm-2 "></div>
                            <div class="col-md-8 col-sm-8 ">
                              Category Name 
                              <input type="text" id="name" name="name" required="required" class="form-control  ">
                            </div>
                            <div class="col-md-2 col-sm-2"></div>
                            <div class="col-md-2 col-sm-2"></div>
                            <div class="col-md-8 col-sm-8">
                              <br>
                              Description
                              <input id="description" name="description" class="form-control col" type="text" required>
                              <br>
                            </div>
                          </div>
                        </div>
                        <div id="step-2">
                          <div class="form-group row">
                            <div class="col-md-2 col-sm-2 "></div>
                            <div class="col-md-8 col-sm-8 ">
                              Sector 
                              <input type="text" id="sector" name="sector" required="required" class="form-control  " required>
                            </div>
                            <div class="col-md-2 col-sm-2"></div>
                            <div class="col-md-2 col-sm-2"></div>
                            <div class="col-md-8 col-sm-8">
                              <br>
                              Taxe Code
                              <select class="form-control text-secondary" id="id_tx" name="id_tx" required="required">
                              <?php
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => 'http://localhost:8000/taxes',
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => '',
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 0,
                                  CURLOPT_FOLLOWLOCATION => true,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => 'GET',
                                  CURLOPT_HTTPHEADER => array(
                                    'Authorization: Basic ZnJvbnRlbmR0b2tlbjphZG1pbg=='
                                  ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl);
                                $response = json_decode($response);
                                
                                foreach ($response->response as $row){
                                  echo '<option value="'.$row->id.'">'.$row->taxe.'</option>';
                                }                        
                                ?>
                              </select>
                              <br>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>           
                  </div><!-- End SmartWizard Content --> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php include_once './view/pages/footer.php';?>
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
    <!-- jQuery Smart Wizard -->
    <script src="./view/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard_AddAnalista.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="./view/build/js/custom.min.js"></script>
    <!-- jQuery Input Mask -->
    <script src="./view/vendors/jquery.mask/jquery.mask.min.js"></script>
	
  </body>
</html>