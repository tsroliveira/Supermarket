        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="./view/src/img/profile-avatar.png" alt=""><?php echo $_SESSION["name"]?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="prfAnalista"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-shopping-basket"></i>
                    <span class="badge bg-green">
                      <?php
                        echo (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0; 
                      ?>
                    </span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <?php
                      $count = -1;
                      if (isset($_SESSION['cart'])) 
                      {
                        if (count($_SESSION['cart']) == 0) {
                          ?>
                            <li class="nav-item">
                              <a class="dropdown-item">
                                <span class="image"><img src="./view/src/img/shopping-cart-icon.png" alt="Profile Image" /></span>
                                <span>
                                  <span>Cart Void</span>
                                </span>
                                <span class="message">
                                  The shopping cart has no items added 
                                </span>
                              </a>
                            </li>
                          <?php
                        }
                        else {
                          foreach ($_SESSION['cart'] as $row) {
                            ?>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="./view/src/img/shopping-cart-icon.png" alt="Profile Image" /></span>
                                  <span>
                                    <span><?php echo $row['name']?></span>
                                  </span>
                                  <span class="message">
                                    <?php 
                                      $vtotal = ($row['pvalue'] * $row['tvalue']) * $row['qtde'];
                                      echo '<b>x'.$row['qtde'] .'</b> ($'.$row['pvalue'].' x '.$row['tvalue'].'%) = $'.(number_format($vtotal, 2, ',', '.'));
                                    ?>
                                  </span>
                                </a>
                              </li>
                            <?php
                          }
                        }
                      }
                      else {
                        ?>
                          <li class="nav-item">
                            <a class="dropdown-item">
                              <span class="image"><img src="./view/src/img/shopping-cart-icon.png" alt="Profile Image" /></span>
                              <span>
                                <span>Cart Void</span>
                              </span>
                              <span class="message">
                                The shopping cart has no items added 
                              </span>
                            </a>
                          </li>
                        <?php
                      }
                    ?>
                    <!--li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li-->
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->