<?php
session_start();
//error_reporting(0);
include('views/includes/dbconnection.php');

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
                                    <div class="col-lg-6 col-12">
                                        <select onChange="getdoctors(this.value);" name="specialization" id="specialization" class="form-control" required>
                                            <option value="">Select specialization</option>
                                            <!--- Fetching States--->
                                            <?php
                                            $sql = "SELECT * FROM tblspecialization";
                                            $stmt = $dbh->query($sql);
                                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                            while ($row = $stmt->fetch()) {
                                            ?>
                                                <option value="<?php echo $row['ID']; ?>"><?php echo $row['Specialization']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <select onChange="getdoctors(this.value);" name="Region" id="Region" class="form-control" required>
                                            <option value="">Select Region</option>
                                            <option value="Silesian_Region">Silesian Region</option>
                                            <option value="Pardubice_Region">Pardubice Region</option>
                                            <option value="Ústí_Region">Ústí Region</option>
                                            <option value="Vysočina_Region">Vysočina Region</option>
                                            <option value="South_Bohemian_Region">South Bohemian Region</option>
                                            <option value="Zlín_Region">Zlín Region</option>
                                        </select>
                                    </div>
                                </div>

                            </form>
                            <div class="row justify-content-center mt-3">
                                <div class="col-8 mt-3">
                                    <div class="card border-info mb-3">
                                        <div class="card-header">
                                            <h5>Dr. Jaroslav Tvaruzek</h5>
                                        </div>
                                        <div class="card-body text-info">
                                            <div class="row justify-content-center">
                                                <div class="col-3">Mondays</div>
                                                <div class="col-4">@2pm</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-3">Tuesdays</div>
                                                <div class="col-4">@6pm</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-3">Fridays</div>
                                                <div class="col-4">@6pm</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-3">Saturday</div>
                                                <div class="col-4">@8pm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8 mt-3">
                                    <div class="card border-info mb-3">
                                        <div class="card-header">
                                            <h5>Dr. Jaroslav Tvaruzek</h5>
                                        </div>
                                        <div class="card-body text-info">
                                            <div class="row justify-content-center">
                                                <div class="col-3">Mondays</div>
                                                <div class="col-4">@2pm</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-3">Tuesdays</div>
                                                <div class="col-4">@6pm</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-3">Fridays</div>
                                                <div class="col-4">@6pm</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-3">Saturday</div>
                                                <div class="col-4">@8pm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                <button type="submit" class="form-control" name="submit" id="submit-button">Book Now</button>
                            </div>
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