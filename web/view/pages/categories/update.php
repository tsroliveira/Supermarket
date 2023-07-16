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
                <h3>Update Categorie</h3>
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
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Update</h2>
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
                    <form class="form-horizontal form-label-left" action="typeupd?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                      <div id="demo-form2" class="form-horizontal form-label-left">
                        <div id="step-1">
                          <div class="form-group row">
                            <div class="col-sm-11 text-center"><b>Data User</b></div>
                          </div>
                          <?php 
                            if ($ok == ""){
                              ?>
                                <div class="form-group row">
                                  <div class="col-md-2 col-sm-2 "></div>
                                  <div class="col-md-8 col-sm-8 ">
                                    Categorie Name
                                    <input type="text" id="name" name="name" required="required" class="form-control  " value="<?php echo !empty($response->name)?$response->name: '';?>">
                                    <input type="hidden" id="id" name="id" value="<?php echo !empty($response->id)?$response->id: '';?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-2 col-sm-2 "></div>
                                  <div class="col-md-8 col-sm-8 ">
                                    Categorie Description
                                    <input type="text" id="description" name="description" required="required" class="form-control " value="<?php echo !empty($response->description)?$response->description: '';?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-2 col-sm-2 "></div>
                                  <div class="col-md-4 col-sm-4 ">
                                    Sector
                                    <input type="text" id="sector" name="sector" required="required" class="form-control " value="<?php echo !empty($response->sector)?$response->sector: '';?>">
                                  </div>
                                  <div class="col-md-4 col-sm-4 ">
                                    Taxe                              
                                    <select class="form-control text-secondary" id="id_tx" name="id_tx" required="required">

                                    <?php 
                                      $curl = curl_init();

                                      curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'http://localhost:8000/taxes/'.$response->id_tx,
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

                                      $taxeName = curl_exec($curl);                                      
                                      curl_close($curl);
                                      $taxeName = json_decode($taxeName);
                                    ?>
                                      <option value="<?php echo !empty($response->id_tx)?$response->id_tx: '';?>"> <?php echo $taxeName->response->taxe?> </option>
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
                                  </div>
                                </div>
                              <?php
                            }
                            else {
                              echo $ok;
                            }
                          ?>
                        </div>
                        <br>
                      </div>
                      <br>
                      <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <?php if ($ok == "") { echo '<div class="col-sm-8 text-right"><button type="submit" class="btn btn-primary">Update</button></div>';}?>
                      </div>
                    </form>           
                  </div><!-- End SmartWizard Content --> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php include './view/pages/footer.php';?>
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
    <script src="./view/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard_UpdAnalista.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="./view/build/js/custom.min.js"></script>
    <!-- jQuery Input Mask -->
    <script src="./view/vendors/jquery.mask/jquery.mask.min.js"></script>
	
  </body>
</html>