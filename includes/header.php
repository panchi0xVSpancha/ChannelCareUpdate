<nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
    <div class="container">
        <a class="navbar-brand mx-auto d-lg-none" href="index.php">
            Doctor Appointment
            <strong class="d-block">Management System</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>



                <a class="navbar-brand d-none d-lg-block" href="index.php">
                    Doctor Appointment
                    <strong class="d-block">Management System</strong>
                </a>

                <li class="nav-item">
                    <a class="nav-link" href="check-appointment.php">Check Appointment</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#booking">Booking</a>
                </li>

                
                
                <?php
                if (!isset($_SESSION['email'])) {
                    echo "<li class='nav-item'><a class='nav-link' href='#contact'>Contact</a></li>";
                } else {
                    echo "<li class='nav-item active' ><a class='nav-link' href='./views/patient-dashboard.php'><i class='bi bi-speedometer2' style='padding:0px; font-size:25px'></i><span class='username'>Dashboard </span></a></li>";
                }
                ?>

                <?php
                if (!isset($_SESSION['email'])) {
                    echo "<li class='nav-item active'><a class='nav-link' href='./views/login.php'>Login</a></li>";
                } else {
                    echo "<li class='nav-item active' style='padding:0px ; margin:0px 0px'><a class='nav-link' href='./views/patient-dashboard.php'><i class='bi bi-person-circle' style='padding:0px; font-size:25px'></i><span class='username'>Ishan </span></a></li>";
                }
                ?>

                <!-- <li class="nav-item active">
                    <a class="nav-link" href="./views/login.php">Login</a>
                </li>
                <li class="nav-item active" style="padding:0px ; margin:0px 0px">
                    <a class="nav-link" href="./views/login.php"><i class="bi bi-person-circle" style="padding:0px; font-size:30px"></i><span class="username">Ishan Ediriweera</span></a>
                </li> -->
            </ul>
        </div>

    </div>
</nav>