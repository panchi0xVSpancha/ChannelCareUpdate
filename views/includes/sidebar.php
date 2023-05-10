<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)"><img class="img-responsive" src="assets/images/images.png" alt="avatar" /></a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <?php

          require_once('../includes/database.php');
          require_once('../controller/doctorAppointmentController.php');
          $email = $_SESSION['email'];

          ?>
          <h5><a href="javascript:void(0)" class="username">
              <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
            </a></h5>
          <ul>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <small>
                  <?php echo $email; ?>
                </small>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu animated flipInY">
                <li>
                  <a class="text-color" href="dashboard.php">
                    <span class="m-r-xs"><i class="fa fa-home"></i></span>
                    <span>Home</span>
                  </a>
                </li>
                <li>
                  <a class="text-color" href="profile.php">
                    <span class="m-r-xs"><i class="fa fa-user"></i></span>
                    <span>Profile</span>
                  </a>
                </li>
                <li>
                  <a class="text-color" href="change-password.php">
                    <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                    <span>Settings</span>
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a class="text-color" href="logout.php">
                    <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                    <span>logout</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
        <li class="has-submenu">
        <?php if ($_SESSION["type"]=="doctor") {?>
          <a href="dashboard.php">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>

          </a>
          <?php }else { ?>
            <a href="patient-dashboard.php">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>

          </a>
          <?php }?>

        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-pages zmdi-hc-lg"></i>
            <span class="menu-text">Appointment</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <?php if ($_SESSION["type"]=="doctor") {?>
            <ul class="submenu">
            <li><a href="new-appointment.php"><span class="menu-text">New Appointment</span></a></li>
            <li><a href="approved-appointment.php"><span class="menu-text">Approved Appointment</span></a></li>
            <li><a href="cancelled-appointment.php"><span class="menu-text">Cancelled Appointment</span></a></li>
            <li><a href="all-appointment.php"><span class="menu-text">All Appointment</span></a></li>

          </ul>
          <?php }else { ?>
            <ul class="submenu">
            <li><a href="patient-pending-appointment.php"><span class="menu-text">Pending Appointment</span></a></li>
            <li><a href="patient-approved-appointment.php"><span class="menu-text">Approved Appointments</span></a></li>
            <li><a href="patient-history-appointment.php"><span class="menu-text">History Appointments</span></a></li>
            
          </ul>
           
          <?php }?>
        
        </li>

        <li>
          <a href="search.php">
            <i class="menu-icon zmdi zmdi-search zmdi-hc-lg"></i>
            <span class="menu-text">Search</span>
          </a>
        </li>
        <!-- <li>
          <a href="appointment-bwdates.php">
            <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
            <span class="menu-text">Report</span>
          </a>
        </li> -->

      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>