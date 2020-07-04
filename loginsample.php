<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="icon" href="css/logo.ico">
  <style>
  .error{
    padding:20px;
    background-color:#f44336;
    color:white;
  }
  </style>

</head>
<body>

<div class="container">
	<div style="margin-bottom: 200px;"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
		<ul class="navbar-nav">
			<li class="nav-item" style="padding-left:100px;">
				<a class="nav-link" href="index.php">HOME</a>
			</li>
		</ul>
		<div style="">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="signup.php">SIGN-UP</a></li>
			<li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
		</ul>
		</div>
	</nav></div>

  <h2>Login Form</h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" required>
    </div>
    <button type="submit" name="sbtn" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>

<?php
include "config.php";

if(isset($_POST['sbtn'])){
  
  $error = "";
  if($error == ''){

  	//storing data
  	$email = $_POST['email'];
  	$pswd = $_POST['pswd'];

  	$sql = "SELECT * FROM users WHERE email='$email' AND pswd='$pswd'";
  	$result = $conn->query($sql);
  	$rowCount = mysqli_num_rows($result);
  	//echo $rowCount;
  	if($rowCount){
 	  while($row = mysqli_fetch_assoc($result)){
 	  	session_start();
 	  	$_SESSION['email'] = $row['email'];
 	  	$_SESSION['name'] = $row['name'];
 	  	if($row['access'] == "user"){
			header('location:student/index.php');
		}
		else if($row['access'] == 'admin') {
			header('location:admin/index.php');
		}
		else {
			echo "<div class='error'>Server error (~_~) (~_~) (~_~)</div>";
		}
 	  }
  	}
  	else {
  	  echo "<div class='error'>User doesnot exists (OR) Email-Password is incorrect. (~_~) (~_~) (~_~)</div>";
  	}

  }
}
?>