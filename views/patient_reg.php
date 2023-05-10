<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../resource/css/register.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	<title>Registration Form</title>

</head>

<body>
	<div class="background-img1"><img src="../resource/img/proffesionals.jpg" alt="" ></div>
	<div class="container">
		<div class="para">
			<h1><b>U</b>ser <b>R</b>egistration</h1>
			<h2 style="text-align: center">Patient</h2>
			<p style="text-align: center">Revolutionize the way you access healthcare</br> by <span>registering</span> with <span>e-channeling!</span> </br>Say goodbye to long waits and hello to seamless booking and</br> personalized care with <span>just a few clicks</span>.</br> <span>Sign up now</span> to find best <span>proffesionals</span> !</p>
		</div>
		<div class="register">
			<form method="post" id="patientReg">
				<p>Password <span class="error" id="passError"></span></p>
				<input type="password" id="password" name="password" placeholder="Enter Password">
				<p>Confirm Password <span class="error" id="cpassError"></span></p>
				<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
				<h6>*Password must contain least one uppercase lowercase and number</h6>
				<!-- <div class="agreement">
					<div class="term"><b>Term and condition</b></div> 
					<textarea name="aggrement" id="1" cols="10" rows="10">
1. This is a Web platform for finding boarding places.We do not assure you about your sensitive information(ex: creadit card details). Please create a payhere account before you making online payments.
2. We will use your location information to provide you better experience. We do not store any searching information or location information in our platform.
					</textarea>
				</div> -->
				<!-- <div class="check">
					 <input id="check"  type="checkbox" name="check">
					 <div class="agree"> I am agree with term and condition</div> 
				</div> -->
				<input type="hidden" id="email" name="email" value="<?php echo $_GET['email']; ?>">
				<input type="hidden" id="first_name" name="first_name" value="<?php echo $_GET['first_name']; ?>">
				<input type="hidden" id="last_name" name="last_name" value="<?php echo $_GET['last_name']; ?>">
				<input type="hidden" id="address" name="address" value="<?php echo $_GET['address']; ?>">
				<input type="hidden" id="phone_number" name="phone_number" value="<?php echo $_GET['phone_number']; ?>">
				<input id="register" type="submit" name="register_patient" value="Register">
			</form>
		</div>
	</div>

</body>
<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/patient_reg.js"></script>
<!-- <script src="../resource/js/checkAgree.js"></script> -->

</html>