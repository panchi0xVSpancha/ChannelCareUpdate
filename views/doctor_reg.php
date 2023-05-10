<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../resource/css/register.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	<title>Registration Form</title>
</head>

<body>
	<div class="background-img1"><img src="../resource/img/doctor.jpg" alt=""></div>
	<div class="container">
		<div class="para">
			<h1><b>U</b>ser <b>R</b>egistration</h1>
			<h2 style="text-align: center">Doctor</h2>
			<p style="text-align: center">Hello, we would like to invite you to join our e-channeling system</br> as a registered doctor. By signing up, you'll gain access</br> to a wide range of patients seeking medical care in your specialization area.</br></br> To register, simply visit our website and enter your details,</br> including your specialization area. </br>This will allow us to match you with patients seeking care in your area of expertise.</p>
		</div>
		<div class="register">
			<form id="doctorReg" method="post">
				<p>Specialization <span class="error" id="specError"></p>
				<input type="text" id="specialization" name="specialization" placeholder="eg : heart">

				<p>License<span class="error" id="licenseError"></p>
				<input type="text" id="license" name="license" placeholder="Enter License">

				<p>Diploma<span class="error" id="diplomaError"></p>
				<input type="text" id="diploma" name="diploma" placeholder="Enter Diploma">

				<p>Password <span class="error" id="passError"></p>
				<input type="password" id="password" name="password" placeholder="Enter Password">

				<p>Confirm Password <span class="error"></p>
				<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">

				<!-- <div class="agreement">
					<div class="term"><b>Term and condition</b></div>
					<textarea name="aggrement" id="1" cols="30" rows="5">
1. This is a Web platform for Adverting boarding places. We do not assure you about your sensitive information(ex: credit card details). Please create a pay here account before you making online payments.
2. We will use your location information to provide you a better experience. We do not store any searching information or location information on our platform.	
				</textarea>
				</div>
				<div class="check">
					<input id="check" type="checkbox" name="check">
					<div class="agree"> I am agree with term and condition</div>
				</div> -->
				<input type="hidden" id="email" name="email" value="<?php echo $_GET['email']; ?>">
				<input type="hidden" id="first_name" name="first_name" value="<?php echo $_GET['first_name']; ?>">
				<input type="hidden" id="last_name" name="last_name" value="<?php echo $_GET['last_name']; ?>">
				<input type="hidden" id="address" name="address" value="<?php echo $_GET['address']; ?>">
				<input type="hidden" id="phone_number" name="phone_number" value="<?php echo $_GET['phone_number']; ?>">
				<input id="register" type="submit" name="register" value="Register">
			</form>
		</div>
	</div>
</body>
<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/doctor_reg.js"></script>
<!-- <script src="../resource/js/checkAgree.js"></script> -->

</html>