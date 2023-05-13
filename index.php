<?php
session_start();

require_once('includes/database.php');


if (isset($_POST['submit'])) {


    if (!isset($_SESSION['email'])) {
        echo '<script>alert("You need to login first. Before access this.")</script>';
        echo "<script>window.location.href ='./views/login.php'</script>";
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $specialization = $_POST['specialization'];
    $doctor_id = $_POST['doctor_id'];
    $message = $_POST['message'];

    $patient_id = $_SESSION['patient_id'];


    $appointment_date = $_POST['date'];
    $cdate = date('Y-m-d');

    if ($appointment_date <= $cdate) {
        echo '<script>alert("Appointment date must be greater than todays date")</script>';
    } else {

        $query = "INSERT INTO appointment (patient_id,doctor_id,appointment_date,message,status) VALUES('{$patient_id}','{$doctor_id}','{$appointment_date}','{$message}',0)";
        $result_set = mysqli_query($connection, $query);

        $_POST['first_name'] = "";
        $_POST['last_name'] = "";
        $_POST['email'] = "";
        $_POST['phone_number'] = "";
        $_POST['specialization'] = "";
        $_POST['doctor_id'] = "";
        $_POST['message'] = "";

        if ($result_set) {

            echo '<script>alert("Your Appointment Request Has Been Send. The doctor Will Contact You Soon")</script>';
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
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
    <script>
    </script>
</head>

<body id="top">

    <main>

        <?php include_once('includes/header.php'); ?>

        <section class="hero" id="hero">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/slider/portrait-successful-mid-adult-doctor-with-crossed-arms.jpg"
                                        class="img-fluid" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img src="images/slider/young-asian-female-dentist-white-coat-posing-clinic-equipment.jpg"
                                        class="img-fluid" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img src="images/slider/doctor-s-hand-holding-stethoscope-closeup.jpg"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding" id="about">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-12">
                        <h2 class="mb-lg-3 mb-3">About Us</h2>

                        <p>
                        <div>
                            <font color="#202124" face="arial, sans-serif"><b>Our mission declares our purpose of
                                    existence as a company and our objectives.</b></font>
                        </div>
                        <div>
                            <font color="#202124" face="arial, sans-serif"><b><br></b></font>
                        </div>
                        <div>
                            <font color="#202124" face="arial, sans-serif"><b>Welcome to ChannelCare, a leading provider
                                    of innovative channeling systems. We specialize in revolutionizing communication
                                    between businesses and their customers. Our cutting-edge platform offers seamless,
                                    personalized, and efficient customer experiences across multiple channels. With our
                                    intuitive channeling system, businesses can streamline communication, optimize
                                    engagement, and drive superior customer satisfaction. Discover the power of our
                                    customizable solution and join the growing community of businesses transforming
                                    their customer communication with ChannelCare.</b></font>
                        </div>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-5 col-12 mx-auto">
                        <div
                            class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                            <p class="featured-text"><span class="featured-number">2</span> Years<br> of Experiences</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="gallery">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-6 ps-0">
                        <img src="images/gallery/medium-shot-man-getting-vaccine.jpg" class="img-fluid galleryImage"
                            alt="get a vaccine" title="get a vaccine for yourself">
                    </div>

                    <div class="col-lg-6 col-6 pe-0">
                        <img src="images/gallery/female-doctor-with-presenting-hand-gesture.jpg"
                            class="img-fluid galleryImage" alt="wear a mask" title="wear a mask to protect yourself">
                    </div>

                </div>
            </div>
        </section>





        <section class="section-padding" id="booking">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="booking-form">

                            <h2 class="text-center mb-lg-3 mb-2">Book an appointment</h2>

                            <form role="form" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <?php if (!isset($_SESSION['first_name'])) {
                                            ?>
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                placeholder="First name" required='true'>
                                        <?php } else { ?>
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                placeholder="First name" required='true' value=<?php echo $_SESSION['first_name']; ?>>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <?php if (!isset($_SESSION['last_name'])) {
                                            ?>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                placeholder="Last name" required='true'>
                                        <?php } else { ?>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                placeholder="Last name" required='true' value=<?php echo $_SESSION['last_name']; ?>>
                                        <?php } ?>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <?php if (!isset($_SESSION['email'])) {
                                            ?>
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                                class="form-control" placeholder="Email address" required='true'>
                                        <?php } else { ?>
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                                class="form-control" placeholder="Email address" required='true' value=<?php echo $_SESSION['email']; ?>>
                                        <?php } ?>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <?php if (!isset($_SESSION['phone_number'])) {
                                            ?>
                                            <input type="telephone" name="phone_number" id="phone_number"
                                                class="form-control" placeholder="Enter Phone Number" maxlength="10">
                                        <?php } else { ?>
                                            <input type="telephone" name="phone_number" id="phone_number"
                                                class="form-control" placeholder="Enter Phone Number" maxlength="10"
                                                value=<?php echo $_SESSION['phone_number']; ?>>

                                        <?php } ?>
                                    </div>

                                    <div class="col-12">
                                        <select onchange="this.form.submit()" name="specialization" id="specialization"
                                            class="form-control" required>
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
                                        <!-- <select onChange="getdoctors(this.value);" name="region" id="region"
                                            class="form-control" required>
                                            <option value="">Select Region</option>
                                            <option value="Silesian_Region">Silesian Region</option>
                                            <option value="Pardubice_Region">Pardubice Region</option>
                                            <option value="Ústí_Region">Ústí Region</option>
                                            <option value="Vysočina_Region">Vysočina Region</option>
                                            <option value="South_Bohemian_Region">South Bohemian Region</option>
                                            <option value="Zlín_Region">Zlín Region</option>
                                        </select> -->
                                    </div>

                                    <div class="col-12">
                                        <select name="doctor_id" id="doctor_id" class="form-control">
                                            <option value="">Select Doctor</option>

                                            

                                        


                                        
                                            <?php


                                            $data = array();
                                            $query = "SELECT * FROM doctor WHERE user_accepted=1";
                                            $result = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $data[] = $row;
                                            }
                                            foreach ($data as $row) {
                                                ?>

                                                <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['first_name'] . ' ' . $row['last_name'] . ' - ' . $row['address']; ?>
                                                </option>

                                            <?php } ?>


                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <input type="date" name="date" id="date" value="" class="form-control">

                                    </div>

                                    <div class="col-lg-6 col-12 mt-3">
                                        <div class="alert alert-info" role="alert">
                                            2pm <span class="smallfont">&nbsp;&nbsp; time might vary depend on
                                                appointments before you.</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" id="message" name="message"
                                            placeholder="Additional Message"></textarea>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" name="submit" id="submit-button">Book
                                            Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php include_once('includes/footer.php'); ?>
    <!-- JAVASCRIPT FILES -->
    <script>
        function getSecondDropdownValues() {
            var firstDropdownValue = $("#firstDropdown").val();
            return firstDropdownValue;

        }
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scrollspy.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>