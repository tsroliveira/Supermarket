
  <div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="home" class="site_title"><img src="./view/src/img/supermarket-logo.svg" width="40" height="40"><span> Supermarket</span></a>
      </div>
      <div class="clearfix"></div>
      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="./view/src/img/profile-avatar.png" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2><?php echo $_SESSION["name"] ?></h2>
        </div>
      </div>
      <!-- /menu profile quick info -->
      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="home">HomeDash</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-slideshare"></i> Profile Users <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="userlist">List Users</a></li>
                <li><a href="useradd">Create User</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-shopping-basket"></i> Products <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="productlist">Products</a></li>
                <li><a href="typelist">Categories</a></li>
                <li><a href="taxeList">Taxes</a></li>';
              </ul>
            </li>
            <li><a><i class="fa fa-shopping-cart"></i> Shopping cart <span + class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="cartlist">List Itens</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="reports">Reports</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>