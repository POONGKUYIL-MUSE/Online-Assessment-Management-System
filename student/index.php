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

<style>
  .sidebar .logoutmenu {
    display: none;

  }
  .swipper {
    display : none;
  }
  @media screen and (max-width: 600px) {
    .sidebar .logoutmenu {
      display: inline;
      text-align: center;
    }
    .table {
      width: 60%;
    }
    .swipper {
      display: inline-block;
    }
  }
</style>

<script>

//Right Click Disabler
document.addEventListener("contextmenu", event=>event.preventDefault());

//Keyboard Right-Click disabler
/*
KEYCODES
67 - C
85 - U
86 - V
117 - u
83 - S
80 - P
73 - I
105 - i
*/

document.onkeydown = function(e) {
  if((e.ctrlKey) && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117 || e.keyCode === 83 || e.keyCode === 80)) {
    alert("Not Allowed");
  return false;
  }
  else if((e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 105 ))){
    alert("Not Allowed");
    return false;
  }
  else {
    return true;
  }
};

</script>

</head>
<body>

<div class="head"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <span class="out"><a class="nav-link" href="logout.php">Logout</a></span>
  </nav></div>


<div class="sidebar">
  <a align='center'><img src="../css/logo.ico" width="100px"/></a>
  <a href="index.php">My Profile</a>
  <a href="tests2.php">Attempt Quiz</a>
  <a href="scores.php">Score Board</a>
  <a href="logout.php" class="logoutmenu">Logout</a>
</div>

<div class="content">
  <h2>My Profile</h2>
  <h5 class="swipper">Swipe left to See full details</h5>
  <?php

    $cemail = $_SESSION['email'];
    $cname = $_SESSION['name'];

  ?>

<div class="responsive-table" style="overflow-x: auto;">
    <table class="table table-hover" style="width:60%;">

<?php
    $sql = "SELECT * FROM users WHERE email='$cemail' and access='user'";
    if($result = mysqli_query($conn,$sql)){
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>Name</td><td>".$row['name']."</td></tr>
        <tr><td>Email</td><td>".$row['email']."</td></tr>
        <tr><td>Mobile</td><td>".$row['mbl']."</td></tr>
        <tr><td>Role</td><td>".$row['role']."</td></tr>
        <tr><td>School/College/Company</td><td>".$row['field1']."</td></tr>
        <tr><td>Class/Degree/Designation</td><td>".$row['field2']."</td></tr>
        <tr><td>City</td><td>".$row['city']."</td></tr>
        <tr><td>Password</td><td>".$row['pswd']."</td></tr>
        ";

      }
    }
    else {

    }

?>

  </table>
  </div>

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