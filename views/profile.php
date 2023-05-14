<?php
session_start();
error_reporting(0);
require_once('../includes/database.php');
require_once('../controller/doctorAppointmentController.php');

if (!isset($_SESSION['email'])) {
  header('location:logout.php');
} else {
  if ($_SESSION['type'] !== 'doctor') {
    header('location:logout.php');
  }
  $doctor_id = $_SESSION['doctor_id'];
  $email = $_SESSION['email'];
    ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>Doctor Profile</title>

    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <!-- build:css assets/css/app.min.css -->
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- endbuild -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>

  <body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->

    <?php include_once('includes/header.php'); ?>

    <?php include_once('includes/sidebar.php'); ?>

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
      <div class="wrap">
        <section class="app-content">
          <div class="row">

            <div class="col-md-12">
              <div class="widget">
                <header class="widget-header">
                  <h3 class="widget-title">Doctor Profile</h3>
                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">

                  <form class="form-horizontal" method="post">
                    <?php 
                    $result=getADoctorDetails($connection,$email);
                    $record = mysqli_fetch_assoc($result);
                    ?>
                    <div class="form-group">
                      <label for="exampleTextInput1" class="col-sm-3 control-label">Full Name : </label>
                      <div class="col-sm-4">
                        <input id="fname" type="text" class="form-control" placeholder="First Name" name="first_name"
                          required="true" value="<?php echo $record['first_name']; ?>" readonly="true">
                      </div>

                      <div class="col-sm-5">
                        <input id="fname" type="text" class="form-control" placeholder="Last Name" name="last_name"
                          required="true" value="<?php echo $record['last_name']; ?>" readonly="true">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email2" class="col-sm-3 control-label">Contact Number:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $record['phone_number']; ?>"
                          required='true' maxlength='10' readonly="true">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email2" class="col-sm-3 control-label">Specialization:</label>
                      <div class="col-sm-9">
                        <select onChange="" name="specialization" id="specialization" readonly="true"
                          class="form-control" required>
                          <option value="<?php echo $record['specialization']; ?>"><?php echo $record['specialization']; ?></option>
                          <!-- <option value="heart">heart</option>
                          <option value="Orthopedics">Orthopedics</option>
                          <option value="Internal Medicine">Internal Medicine</option>
                          <option value="Dermatology">Dermatology</option>
                          <option value="Pediatrics">Pediatrics</option>
                          <option value="ENT">ENT</option>
                          <option value="Anesthesia">Anesthesia</option>
                          <option value="Pathology">Pathology</option>
                          <option value="Chest Medicine">Chest Medicine</option>
                          <option value="Family Medicine">Family Medicine</option> -->



                          <!-- <option value="<?php // echo $row['ID'];
                            ?>"><?php //echo $row['Specialization'];
                              ?></option> -->
                          <!--- Fetching States--->
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email2" class="col-sm-3 control-label">Regsitration Date:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email2" name="" value="<?php echo $record['reg_date']; ?>" readonly="true">
                    </div>
                  </div>

                  <!-- <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button type="submit" class="btn btn-success" name="submit">Update</button>

                    </div>
                  </div> -->
                </form>
                <hr />
                <div>
                  <h3 class="widget-title">Available Dates</h3>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-3">
                    <form class="form-horizontal" method="post" name="AddAvailableDates"
                     action="../controller/doctorAppointmentController.php" 
                     >
                     

                    
                      <select name="days" id="days" class="form-control" required>
                        <option value="">Select day</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                      </select>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <input type="time" name="time" id="time" value="" class="form-control" placeholder="Start Time"required>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id;?>" class="form-control" >
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <button type="submit" onclick="" class="btn btn-info" name="AddAvailableDates">Add Available Dates</button>
                    </div>
                  </div>

                  </form>

                  <hr />

                  <div>

                    <div class="table-responsive">
                      <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Available Day</th>
                            <th>Starting Time</th>
                            <th>Action</th>

                          </tr>
                        </thead>

                        <tbody>
                        <?php
												$cnt = 1;
												$get_doctor_dates = getADoctorAvailableDates($connection, $doctor_id);


												foreach ($get_doctor_dates as $row) {

													?>
                        
                          <tr>
                            <td>
                            <?php echo htmlentities($cnt); ?>
                            </td>
                          

                            <td>
                            <?php echo htmlentities($row['available_date']); ?>
                            </td>
                           
                        
                            <td>
                            <?php echo htmlentities($row['available_time']); ?>
                            </td>

                            <td>
                              <a href="../controller/doctorAppointmentController.php?deleteDoctorAvailableDates&&dates_id=<?php echo htmlentities($row['dates_id']); ?>&&doctor_id=<?php echo htmlentities($row['doctor_id']); ?>" class="btn btn-danger">Remove</a>
                            </td>
                           
                          </tr>
                          <?php $cnt = $cnt + 1; } ?>
                        </tbody>

                      </table>
                    </div>
                  </div>



                </div><!-- .widget-body -->
              </div><!-- .widget -->
            </div><!-- END column -->

          </div><!-- .row -->
        </section><!-- #dash-content -->
      </div><!-- .wrap -->
      <!-- APP FOOTER -->
      <?php include_once('includes/footer.php'); ?>
      <!-- /#app-footer -->
    </main>


    <!-- SIDE PANEL -->


    <!-- build:js assets/js/core.min.js -->
    <script src="libs/bower/jquery/dist/jquery.js"></script>
    <script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
    <script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="libs/bower/PACE/pace.min.js"></script>
    <!-- endbuild -->

    <!-- build:js assets/js/app.min.js -->
    <script src="assets/js/library.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- endbuild -->
    <script src="libs/bower/moment/moment.js"></script>
    <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
  </body>

  </html>
<?php } ?>