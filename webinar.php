<!DOCTYPE html>
<html>
<head>
	<title>Webinar Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="icon" href="css/logo.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="css/logo.ico">
	<style>
	body {
	  font-family: Arial, Helvetica, sans-serif;
	  background-image: url("colorbg2.jpg");
	  background-repeat: no-repeat;
	  background-size: cover;
	  background-position: center;
	}
	.container-fluid {
	  background-color: white;
	  border: white solid 1px;
	  border-radius: 25px;
	  width: 550px;
	  margin: 25px auto;
	}
	.title {
		padding : 15px;
		text-align: center;
	}
	label {
		font-size: 20px;
	}
	input[type=text] {
		width: 100%;
	}
	input[type=radio] {
	  	width: 25px;
	  	height: 25px;
	  }
	button {
		margin: 20px;
	}
	.success {
		margin: 15px 400px;
		color: green;
		background-color: yellow;
		width: 550px;
	}
	.error {
		margin: 15px 400px;
		color: red;
		background-color: yellow;
		width: 550px;
	}
	@media screen and (max-width: 600px) {
		.container-fluid {
	    /*margin-top: 20px;
	    margin-bottom: 50px;*/
	    /*margin-left: 20px;
	    margin-right: 30px;*/
	    margin:20px auto;
	    padding:10px;
	    width: 450px;
	  }
	  .success {
	  	margin: 15px auto;
	  	color: green;
	  	background-color: yellow;
	  	width: 450px;
	  }
	  .error {
	  	margin: 15px auto;
	  	color: red;
	  	background-color: yellow;
	  	width: 450px;
	  }
	  input[type=text] {
	    width: 100%;
	  }
	  input[type=radio] {
	  	width: 20px;
	  	height: 20px;
	  }
	}
	</style>

</head>
<body>

<?php
include "config.php";

if(isset($_POST['sbtn'])) {

	if(strlen($_POST['mbl']) == 10){

	date_default_timezone_set('Asia/Kolkata');
	$time = time();
	$atime = date('d-m-y @ H:i:s', $time);

	$name = $_POST['name'];
	$email = $_POST['email'];
	$mbl = $_POST['mbl'];
	$deg = $_POST['degree'];
	$dept = $_POST['dept'];
	$year = $_POST['year'];
	$clg = $_POST['clg'];
	$city = $_POST['city'];
	$courseType = $_POST['courseType'];

	$sql = "INSERT INTO webinar(name, email, mobile, course, degree, department, year, college, city, rtime) VALUES('$name', '$email', '$mbl', '$courseType', '$deg', '$dept', '$year', '$clg', '$city', '$atime')";
	if(mysqli_query($conn, $sql)) {
		echo "<h4 class='success'>Successfully Registered !</h4>";
	}
	else {
		echo "<h4 class='error'>Error in Registering. Error : ".$conn->error.".<br>If you have any problem in registering, Please contact 8428992535.</h4>";
	}

	}
	else {
		echo "<script>alert('Must Provide 10-Digit-Number.');</script>";
	}
}


?>

<div class="container-fluid">
	<h2 class="title">TNIT Online Class on</h2>
	<h6>C Programming, Python Programming, Data Structures & Algorithms and Mysql Database</h6>
	<h6 style='color:red;'>* All Fields are Required</h6>
	
	<form method="post" onsubmit="validate();">
		<div class="form-group">
			<label for="name">Full Name</label>
			<input type="text" class="form-control" id="name" placeholder="Enter Your Full Name" name="name" autofocus="true" required>
		</div>

		<div class="form-group">
			<label for="email">Email ID</label>
			<input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email" required>
		</div>

		<div class="form-group">
			<label for="mobile">Mobile Number</label>
			<input type="text" class="form-control" id="mbl" placeholder="Enter Your Whatsapp Mobile Number" name="mbl" required>
		</div>
		
		<div class="form-group">
			<label for="degree">Degree</label>
			<input type="text" class="form-control" id="degree" placeholder="Enter Your Degree" name="degree" required>
		</div>

		<div class="form-group">
			<label for="dept">Department</label>
			<input type="text" class="form-control" id="dept" placeholder="Enter Your Department" name="dept"  required>
		</div>

		<div class="form-group">
			<label for="year">Year Currently Pursuing</label><br>
			<!--<input type="text" class="form-control" id="year" placeholder="Enter Year Currently Pursuing" name="year" required>-->
			<input type="radio" name='year' value='I'>Ist Year
			&nbsp;
			<input type="radio" name='year' value='II'>IInd Year
			&nbsp;
			<input type="radio" name='year' value='III'>IIIrd Year
			&nbsp;
			<input type="radio" name='year' value='IV'>IV Year
			&nbsp;

		</div>

		<div class="form-group">
			<label for="clg">College Name</label>
			<input type="text" class="form-control" id="clg" placeholder="Enter Your College Name" name="clg" required>
		</div>

		<div class="form-group">
			<label for="city">City</label>
			<input type="text" class="form-control" id="city" placeholder="Enter Your City" name="city" required>
		</div>

		<div class="form-group">
			<label for="course">Select the Course</label>
			<select class="form-control" required name="courseType">
				<option value="none">Select Course</option>
				<option value="C_Program">C Programming</option>
				<option value="Python">Python Programming</option>
				<option value="DSA">Data Structures & Algorithm</option>
				<option value="Mysql">Mysql Database</option>
			</select>
		</div>

		<div align="center">
		<button type="submit" name="sbtn" class="btn btn-danger">Submit My Response</button>
		</div>

	</form>
</div>

</body>
</html>