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
                <h3>Delete User</h3>
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
                    <h2>Form Delete</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="userlist" class="text-dark" title="back"><i class="fa fa-reply-all"></i></a></li>
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
                  <div class="x_content">
                    <?php echo $ok;?>
                    <div id="demo-form2" class="form-horizontal form-label-left">
                      <?php 
                        if(!empty($_POST)) {
                          echo '<a href="userlist" type="btn" class="btn btn-success">Back</a>';
                        }
                        else {
                          ?>
                            <form class="form-horizontal" action="userdel?id=<?php echo $id?>" method="post">
                              <input type="hidden" name="id"   value="<?php echo $id;?>" />
                              <input type="hidden" name="name" value="<?php echo !empty($response->name)?$response->name : '';?>" />							
                              <div class="form-group row">
                                <div class="col-md-2 col-sm-2 "></div>
                                <div class="col-md-8 col-sm-8 ">
                                  Name 
                                  <input type="text" id="name" name="name" required="required" class="form-control  " value="<?php echo !empty($response->name)?$response->name: '';?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-md-2 col-sm-2 "></div>
                                <div class="col-md-8 col-sm-8 ">
                                  Username
                                  <input id="username" name="username" class="form-control col" type="text" value="<?php echo !empty($response->username)?$response->username: '';?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-md-2 col-sm-2 "></div>
                                <div class="col-md-8 col-sm-8 ">
                                  Profile
                                  <input id="profile" name="profile" class="form-control col" type="text" value="<?php echo !empty($response->profile)?$response->profile: '';?>" readonly>
                                </div>
                              </div>  
                              <div class="form-group row">
                                <div class="col-md-2 col-sm-2 "></div>
                                <div class="col-md-8 col-sm-8 ">
                                  <hr>
                                  <div class="alert alert-danger">Do you want to delete the record?</div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-md-2 col-sm-2 "></div>
                                <div class="col-md-8 col-sm-8 ">
                                  <div class="form actions">
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                    <a href="userlist" type="btn" class="btn btn-default">No</a>
                                  </div>
                                </div>
                              </div>
                            </form>
                          <?php
                        }
                      ?>                
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
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
    <!-- jQuery Smart Wizard -->
    <script src="./view/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard_AddAnalista.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="./view/build/js/custom.min.js"></script>
  </body>
</html>