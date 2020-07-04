
<?php
ob_start();
include "config.php";
session_start();
$i=1;
if(isset($_SESSION['mymbl'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify Mobile</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="css/logo.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/styles2.css">
<link rel="icon" href="css/logo.ico">
<style>
body {
  margin: 0;
  //padding:50px 100px;
  font-family: Arial, Helvetica, sans-serif;
}
.success{
    padding:20px;
    background-color:#4CAF50;
    color:white;
  }
  .error{
    padding:20px;
    background-color:#f44336;
    color:white;
  }
.topnav {
  overflow: hidden;
  background-color: #333;
  padding-left:100px;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>

</head>
<body>

<div class="topnav navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="myTopnav">
  <a><img src="css/logo.ico" width="100px"/></a>
  <a href="index.php" class="nav-link">Home</a>
  <a href="login.php" class="nav-link">Login</a>
  <a href="signup.php" class="nav-link">Sign-Up</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div id="home" class="container-fluid" style="padding-top:150px; padding-bottom:50px; padding-left:100px; padding-right: 100px;">
  <div id="status"></div>

  <h2>Verify OTP</h2>
  <form method="post" action="" enctype="multipart/form-data">

	<div class="form-group">
		<label for="sotp">Enter the OTP sent to the above provided mobile phone : </label>
	    <input type="text" name="otp" placeholder="Enter your OTP" class="form-control">
	</div>

	<input type="submit" class="btn btn-primary" name="votp" value="Verify OTP">

  </form>
</div>

<?php

$mobile = $_SESSION['mymbl'];
$mblotp = $mobile."otp";

// 9638527410otp = generate_otp


if(isset($_POST['votp'])){
  $otp = $_POST['otp'];
  if($_SESSION[$mblotp] == $otp){

    $sqlVotp = "UPDATE users SET votp='yes',activate='yes' WHERE mbl = '$mobile' AND sotp='yes'";
    if($conn->query($sqlVotp)){
      echo "<script>
        document.getElementById('status').innerHTML = 'OTP Verified and Account Activated. Please Login!';
        document.getElementById('status').setAttribute('class','success');
        </script>";
            
    }
    else {
      $err = $conn->error;
      echo "<div class='error'>".$err." (~_~) (~_~) (~_~) Error in Activating the Account</div>";
    }
    
  }
  else {
    echo "Please enter correct OTP";
  }
}


}
ob_end_flush();
?>

</body>
</html>