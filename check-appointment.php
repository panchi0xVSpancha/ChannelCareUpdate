<?php
session_start();
//error_reporting(0);

require_once('includes/database.php');


$keyword1 = null;
$keyword2 = null;

if (isset($_POST['search']) && $_POST['specialization'] && $_POST['Region']) {
    $doctorsList = null;
    $query = "SELECT * FROM doctor WHERE user_accepted=1 AND specialization='" . $_POST['specialization'] . "' AND region Like '%" . $_POST['Region'] . "%';";
    $doctorsList = mysqli_query($connection, $query);
} else if (isset($_POST['search']) && $_POST['specialization']) {
    $doctorsList = null;
    $query = "SELECT * FROM doctor WHERE user_accepted=1 AND specialization='" . $_POST['specialization'] . "';";
    $doctorsList = mysqli_query($connection, $query);
} else if (isset($_POST['search']) && $_POST['Region']) {

    $doctorsList = null;
    $query = "SELECT * FROM doctor WHERE user_accepted=1 AND region Like '%" . $_POST['Region'] . "%';";
    $doctorsList = mysqli_query($connection, $query);
} else {

    $doctorsList = null;
    $query = "SELECT * FROM doctor WHERE user_accepted=1";
    $doctorsList = mysqli_query($connection, $query);
}

if (isset($_POST['specialization']) ) {
    $keyword1 = $_POST['specialization'];
}

if (isset($_POST['Region']) ) {
    $keyword2 = $_POST['Region'];
}

if (isset($_POST['submit-book'])) {

    if (!isset($_SESSION['email'])) {
        echo '<script>alert("You need to login first. Before access this.")</script>';
        echo "<script>window.location.href ='./views/login.php'</script>";
    }else {
        echo "<script>window.location.href ='./index.php'</script>";
    }

}

?>



<!doctype html>
<html lang="en">

<head>
    <title>Doctor Appointment Management System || Home Page</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/owl.carousel.min.css" rel="stylesheet">

    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <link href="css/templatemo-medic-care.css" rel="stylesheet">
    <!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script>

    </script>
</head>

<body id="top">

    <main>

        <?php include_once('includes/header.php'); ?>

        <section class="section-padding" id="booking">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 mx-auto">
                        <div class="doctor_search">

                            <h2 class="text-center mb-lg-3 mb-2">Search Doctors according to your region and specialization</h2>

                            <form role="form" method="post">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        </br>
                                        <select onchange="" name="specialization" id="specialization" class="form-control">
                                            <option value="">Select specialization</option>
                                            <option value="heart">heart</option>
                                            <option value="Orthopedics">Orthopedics</option>
                                            <option value="Internal Medicine">Internal Medicine</option>
                                            <option value="Dermatology">Dermatology</option>
                                            <option value="Pediatrics">Pediatrics</option>
                                            <option value="ENT">ENT</option>
                                            <option value="Anesthesia">Anesthesia</option>
                                            <option value="Pathology">Pathology</option>
                                            <option value="Chest Medicine">Chest Medicine</option>
                                            <option value="Family Medicine">Family Medicine</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        </br>
                                        <select onChange="" name="Region" id="Region" class="form-control">
                                            <option value="">Select Region</option>
                                            <option value="Silesian">Silesian Region</option>
                                            <option value="Pardubice">Pardubice Region</option>
                                            <option value="Ústí">Ústí Region</option>
                                            <option value="Vysočina">Vysočina Region</option>
                                            <option value="South_Bohemian">South Bohemian Region</option>
                                            <option value="Zlín">Zlín Region</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <button type="submit" class="form-control" name="search" id="submit-button">Search</button>
                                    </div>
                                </div>

                            </form>
                            <div class="row justify-content-center mt-3">
                                <?php
                                if ($keyword1 == null && $keyword2 == null) {
                                ?>
                                    <div><span>key words : <?php echo "all" ?></span></div>
                                <?php
                                } else {
                                ?>
                                    <div><span>key words : <?php echo " " . $keyword1 . ", " . $keyword2; ?></span></div>
                                <?php
                                }
                                ?>
                                <?php

                                foreach ($doctorsList as $doctor) {
                                ?>


                                    <div class="col-8 mt-3">
                                        <div class="card border-info mb-3">
                                            <div class="card-header">
                                                <h5>Dr. <?php echo $doctor['first_name'] . " " . $doctor['last_name']  ?> </h5>
                                            </div>
                                            <div class="card-body text-info">
                                                <?php
                                                $query2 = "SELECT * FROM `available_dates` WHERE `doctor_id`=" . $doctor['doctor_id'] . ";";
                                                $availability = mysqli_query($connection, $query2);

                                                if (mysqli_num_rows($availability) === 0) {
                                                ?>
                                                    <div class="row justify-content-center">
                                                        <div class="col-3"><?php echo " No available days."; ?></div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    foreach ($availability as $record) {
                                                    ?>
                                                        <div class="row justify-content-center">
                                                            <div class="col-3"><?php echo $record['available_date'] ?></div>
                                                            <div class="col-4"><?php echo "@" . $record['available_time'] ?></div>
                                                        </div>

                                                <?php
                                                    }
                                                }
                                                ?>

                                                <?php

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }

                                ?>

                            </div>
                            <form role="form" method="post" name="submit-book">
                            <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                <button type="submit" class="form-control" name="submit-book" id="submit-button">Book Now</button>
                            </div>
                            </form>
                        </div>


        </section>

    </main>
    <?php include_once('includes/footer.php'); ?>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scrollspy.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>