<?php
ob_start();
session_start();
if(isset($_SESSION['email'])){
  include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles2.css">

<link rel="icon" href="../css/logo.ico">

</head>
<body>

<div class="head"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <span class="out"><a class="nav-link" href="logout.php">Logout</a></span>
  </nav></div>


<div class="sidebar">
  <a href="index.php">MyProfile</a>
  <a href="createquiz.php">Create Quiz</a>
  <a href="uplquiz.php">Upload Quiz</a>
  <a href="viewquiz2.php">View Quiz</a>
  <a href="addstud.php">Add Student</a>
  <a href="viewstud.php">View Student</a>
  <a href="export.php">Export as Excel</a>
  <a href="timer.php">Timer</a>
</div>

<div class="content">
  <h2>my profile</h2>
  <p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px or less.</p>
  <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
  <h3>Resize the browser window to see the effect.</h3>
</div>

</body>
</html>
<?php
}
else {
  echo "Login is must <a href='../index.php'>Click Here to Login</a>";
}
ob_end_flush();
?>