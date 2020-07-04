<?php
ob_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="css/logo.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="css/logo.ico">
<link rel="stylesheet" type="text/css" href="css/styles2.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
  padding-left:100px;
}

.topnav .icon {
  display: none;
}

.container-fluid {
  padding-top:150px;
  padding-bottom:50px;
  padding-left:100px;
  padding-right: 100px;
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
  .topnav {
    width: 360px;
  }

  .container-fluid {
    margin-top: 150px;
    margin-bottom: 50px;
    margin-left: 20px;
    margin-right: 30px;
    padding:10px;
    width: 340px;
  }
  input[type=text] {
    width: 60%;
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
    <i class="fa fa-bars fa-3x"></i>
  </a>
</div>

<div id="home" class="container-fluid">
  
  <h2>Login Form</h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" autofocus="true" required>
    </div>
    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" required>
    </div>
    <button type="submit" name="sbtn" class="btn btn-primary">Login</button>
  </form>
  

</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<?php
include "config.php";

if(isset($_POST['sbtn'])){
  
  $error = "";
  if($error == ''){

    //storing data
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $sql = "SELECT * FROM users WHERE email='$email' AND pswd='$pswd' AND activate='yes'";
    $result = $conn->query($sql);
    $rowCount = mysqli_num_rows($result);
    //echo $rowCount;
    if($rowCount){
    while($row = mysqli_fetch_assoc($result)){
      session_start();
      $_SESSION['email'] = $row['email'];
      $_SESSION['name'] = $row['name'];
    if($row['access'] == "user"){
      header('location:student/tests2.php');
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
      echo "<div class='error'>User doesnot exists (OR) Email-Password is incorrect (OR) OTP is not yet verified. (~_~) (~_~) (~_~)</div>";
    }

  }
}
?>

</body>
</html>
<?php

ob_end_flush();
?>