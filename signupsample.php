<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign-up Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>
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
  .hint{
    color:red;
    font-size: 14px;
    margin-left: 10px;
  }
  </style>
</head>

<body>
<div class="container">

	<div class="header" style="margin-bottom: 200px;"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
		<ul class="navbar-nav">
			<li class="nav-item" style="padding-left:100px;">
				<a class="nav-link" href="index.php">HOME</a>
			</li>
		</ul>
		<div style="" class="header-right">
      <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="signup.php">SIGN-UP</a></li>
      <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
    </ul>
    </div>
	</nav></div>



<div id="status"></div>

  <h2>Sign-up Form</h2>
  <form method="post" action="">

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" required> 
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required="">
    </div>

    <div class="form-group">
      <label for="mbl">Mobile:</label>
      <input type="text" class="form-control" id="mbl" placeholder="Enter Mobile" name="mbl" required="">
    </div>

    <div class="form-group">
      <label for="role">Role:</label>
      <select name="role" class="form-control">
        <option value="none">--Select any one--</option>
        <option value="work">Work</option>
        <option value="student">Student</option>
      </select>
    </div>

    <div class="form-group" id="fields">
      <table border=0 id="workfield" width="100%"><tr>
      <td><label for="field1">School/College/Company:</label>
      <input type="text" class="form-control" id="field1" placeholder="Enter Name of School/College/Company" name="field1" required="">
      </td><td>&nbsp;&nbsp;</td><td>
      <label for="field2">Class/Degree/Designation:</label>
      <input type="text" class="form-control" id="field2" placeholder="Enter Class/Degree/Designation" name="field2" required=""></td></tr></table>
    </div>

    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
    </div>

    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" required=""><br>
      <span class="hint">*Minimum 8 letters</span>
    </div>

    <div class="form-group">
      <label for="conpswd">Confirm Password:</label>
      <input type="password" class="form-control" id="conpswd" placeholder="Enter Confirm password" name="conpswd" required="">
    </div>

    <!--<div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>-->
    <input type="submit" class="btn btn-primary" name="sbtn" value="Submit">
    <br>
  </form>
</div>
<br>
</body>
</html>
<?php
include "config.php";

if(isset($_POST['sbtn'])) {

  //error - validation
  $error = "";
  if($_POST['pswd'] != $_POST['conpswd']){
    $error = $error."Passwords doesnot match.";
  }
  if($error == ''){
    //storing all the data in php 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mbl'];
    $role = $_POST['role'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $city = $_POST['city'];
    $pswd = $_POST['pswd'];
    $conpswd = $_POST['conpswd'];

    $sql = "INSERT INTO users (access,name,email,mbl,role,field1,field2,city,pswd,conpswd,sotp,votp,activate) values('user','$name','$email','$mobile','$role','$field1','$field2','$city','$pswd','$conpswd','yes','yes','yes')";

    if($conn->query($sql)){
      echo "<script>
      document.getElementById('status').innerHTML = 'Sucessfully Registered !!!';
      document.getElementById('status').setAttribute('class','success');
      </script>";
    }
    else {
      $err = $conn->error;
      echo "<div class='error'>".$err." (~_~) (~_~) (~_~) Email/MobileNo. is already in use ***</div>";
      //echo "<script>
      //document.getElementById('status').innerHTML = '".$err."';
      //document.getElementById('status').setAttribute('class','error');
      //</script>";
    }
  }
  else{
    echo "<script>
      document.getElementById('status').innerHTML = '".$error."';
      document.getElementById('status').setAttribute('class','error');
      </script>";
  }

}
?>
