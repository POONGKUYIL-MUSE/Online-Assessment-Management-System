<?php
ob_start();
session_start();
if(isset($_SESSION['email'])) {
  include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles2.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">

<script src="js/scripts.js"></script>
<link rel="icon"  href="../css/logo.ico">
</head>
<body>


<?php
include "../config.php";
?>

<div class="head"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top"><span class="out"><a class="nav-link" href="logout.php">Logout</a></span>
  </nav></div>


<div class="sidebar">
  <a href="index.php">MyProfile</a>
  <a href="createquiz.php">Create Quiz</a>
  <a href="uplquiz.php">Upload Quiz</a>
  <a href="viewquiz2.php">View Quiz</a>
  <a href="addstud.php">Add Student</a>
  <a href="viewstud.php">View Student</a>
</div>

<div class="content container">
  <h2>Quiz Details</h2>
	
	<?php

	include "../config.php";

	if($_GET['squiz']){
		$cquiz = $_GET['squiz'];

		$attmpts = 0;
		$emails = array();
		$names = array();
		$marks = array();
		$avgPcnt = array();
		$evaldate = array();
		$coupons = array();


		/*
		* 		<<<--- Getting attmpts --->>>
		*/
		$selectQuiz = "SELECT * FROM quizzes WHERE quizname='$cquiz'";
		if($result = mysqli_query($conn,$selectQuiz)){
			while($row = mysqli_fetch_assoc($result)){
				$attmpts = $row['attmpt'];
				$tqnos = $row['tqnos'];
				$qnos = $row['qnos'];
				$crdate = $row['crdate'];
			}
		}
		else {
			echo "<script>alert('".$conn->error."');</script>";
		}		

		/*
		* 		<<<--- Getting evaluation details and pushing into array --->>>
		*/

		$sql = "SELECT  * FROM evaluations WHERE quiz='$cquiz' ORDER BY marks DESC";
		if($res = mysqli_query($conn,$sql)){
			while($row = mysqli_fetch_assoc($res)){
				//echo $row['name']." ".$row['marks']." ".$row['averagePercent'];

				array_push($emails, $row['email']);
				array_push($names, $row['name']);
				array_push($marks, $row['marks']);
				array_push($avgPcnt, $row['averagePercent']);
				array_push($coupons, $row['coupon']);
				array_push($evaldate, $row['evaldate']);
			}
		}
		else{
			echo "<script>alert('".$conn->error."');</script>";
		}


		/* Calculating average  and displaying progress bar*/
		

		$avg = (array_sum($avgPcnt)/$attmpts);

		echo "<div class='table-responsive'><table class='table-hover table-sm' width='40%'>
		<tr><td><b>Quiz Name :</b></td><td>".$cquiz."</td></tr>
		<tr><td><b>Total Number of Questions :</b></td><td>".$tqnos."</td></tr>
		<tr><td><b>Number of Questions Displayed :</b></td><td>".$qnos."</td></tr>
		<tr><td><b>Created Date :</b></td><td>".$crdate."</td></tr></table></div>";

		echo "
			<div class='scoresheet'>
			<h1 align='center' style='margin:40px 0px;'>
			Quiz Total Average (inc all attempts) : </h1>
	
			<div class='progress' style='width:80%; margin:0px 40px;height:30px;'>
			<div class='progress-bar progress-bar-striped' role='progress-bar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width:".$avg."%;'>
			".$avg." %</div></div></div><br>";


		/*
		*		<<<--- Displaying table --->>>
		*/


			$count=count($names);

			echo "<br><div class='table-responsive'><table class='table table-hover' width='100%'><tr align='center'><th>Name</th><th>Email</th><th>Marks</th><th>Average</th><th>Coupon ID</th><th>Attempted Date</th>";

			for($i=0;$i<$count;$i+=1){
				echo "<tr align='center'><td>".$names[$i]."</td>
						<td>".$emails[$i]."</td>
						<td>".$marks[$i]."</td>
						<td>".$avgPcnt[$i]."</td>
						<td>".$coupons[$i]."</td>
						<td>".$evaldate[$i]."</td>
					</tr>";
			}

			echo "</table>";

	}

	?>

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