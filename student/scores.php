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
  @media screen and (max-width: 600px) {
    .sidebar .logoutmenu {
      display: inline;
      text-align: center;
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

<div class="content container">

<?php


$cemail = $_SESSION['email'];
$cname = $_SESSION['name'];

?>

  <h2>Score Board</h2>
	
  <div class="table-responsive">
  <table border="0" width="100%" class="table">
  <tr align="center"><th>Answer Key</th><th>Quiz Attempted</th><th>Marks Obtained</th><th>Average Percent</th><th>Coupon ID</th><th>Attempted Date</th></tr>	
  <?php

  	$sql = "SELECT * FROM evaluations WHERE email='$cemail'";

  	if($res = mysqli_query($conn,$sql)){
  		while($row=mysqli_fetch_assoc($res)){
  			//echo $row['quiz']." ".$row['marks'];
  			echo "<tr align='center'>
        <td><a href='showAns.php?cquiz=".$row['quiz']."'>View Answer</a></td>
  			<td>".$row['quiz']."</td>
  			<td>".$row['marks']."</td>
  			<td>".$row['averagePercent']."%</td>
        <td>".$row['coupon']."</td>
  			<td>".$row['evaldate']."</td>
  			</tr>";

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