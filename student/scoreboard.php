<?php
ob_start();
session_start();
if(isset($_SESSION['email'])){
	include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Scores</title>
	<link rel='stylesheet' type='text/css' href='../css/styles2.css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>


//Right Click Disabler
document.addEventListener("contextmenu", event=>event.preventDefault());

//Keyboard Right-Click disabler
/*
KEYCODES
67 - C; 85 - U; 86 - V; 117 - u; 83 - S; 80 - P; 73 - I; 105 - i
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

//FULL SCREEN F11 OPTIONALITY
var elem = document.documentElement;
function openFullScreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}


//Back history logout
/*function backpage() { 
	alert("you cannot attempt quiz again");
	window.location.href="scores.php";
}
*/
</script>

<style>
	.scoresheet{
		display: block;
		border: 10px solid #1e272e;
		border-radius: 20px;
		background-color: #2f3640;
		height:350px;
		min-height: auto;
		width:80%;
		text-align: center;
		/*padding:5px;*/
		overflow-y: auto;
		margin:50px auto;
		box-shadow: -1px 2px 2px 0px #555, inset 0 0 10px 0 #555;
		background-size: cover;
		position: relative;
		color: #f1f2f6;
		font-family: "Walter Turncoat", cursive;
		font-size: 40px;
	}
	.skillbar{
		width:100%;
		background-color: #ddd;
	}
	.skills{
		text-align: right;
		padding-top: 10px;
		padding-bottom: 10px;
		color: #f1f2f6;
	}
	.percnt{
		width:60%;
		background-color:#808080;
	}


	/*FULL SCREEN*/
	/* Chrome, Safari and Opera syntax */
	:-webkit-full-screen {
	  background-color: yellow;
	}

	/* Firefox syntax */
	:-moz-full-screen {
	  background-color: yellow;
	}

	/* IE/Edge syntax */
	:-ms-fullscreen {
	  background-color: yellow;
	}

	/* Standard syntax */
	:fullscreen {
	  background-color: yellow;
	}

	/* COUPON GLOW */
	.glow {
	  font-size: 40px;
	  color: #fff;
	  text-align: center;
	  -webkit-animation: glow 1s ease-in-out infinite alternate;
	  -moz-animation: glow 1s ease-in-out infinite alternate;
	  animation: glow 1s ease-in-out infinite alternate;
	}

	@-webkit-keyframes glow {
	  from {
	    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
	  }
	  
	  to {
	    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
	  }
	}
	</style>
<link rel="icon" href="../css/logo.ico">
</head>

<body onload="openFullScreen();">

<div class="head"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <span class="out"><a class="nav-link" href="logout.php">Logout</a></span>
</nav></div>


<div class="sidebar">
	<a align='center'><img src="../css/logo.ico" width="100px"/></a>
  	<a href="index.php">My Profile</a>
  	<a href="tests2.php">Attempt Quiz</a>
  	<a href="scores.php">Score Board</a>
</div>

<div class="content container">
<?php

/*$cquiz = $cemail = $cname = '';
$total=$avg=$attmpt = 0;
$coupon='';

function initiate(){
	$cquiz = $_SESSION['cquiz'];
	$cemail = $_SESSION['email'];
	$cname = $_SESSION['name'];
	$coupon = mt_rand(10000,99999);

	$avgsql = "SELECT tqnos,qnos,attmpt FROM quizzes WHERE quizname='$cquiz'";
	if($totqns = mysqli_query($conn,$avgsql)){
		while($row=mysqli_fetch_assoc($totqns)){
			$total = $row['tqnos'];
			$qnos = $row['qnos'];
			$attmpt = $row['attmpt'];
		}
	}
}
*/
if(isset($_GET['autolog']) and isset($_GET['cc'])){
	$autolog = $_GET['autolog'];
	$cc = $_GET['cc'];

	if($autolog == 'yes'){

		//initiate();


		$cquiz = $_SESSION['cquiz'];
		$cemail = $_SESSION['email'];
		$cname = $_SESSION['name'];
		$coupon = mt_rand(10000,99999);

		$avgsql = "SELECT tqnos,qnos,attmpt FROM quizzes WHERE quizname='$cquiz'";
		if($totqns = mysqli_query($conn,$avgsql)){
			while($row=mysqli_fetch_assoc($totqns)){
				$total = $row['tqnos'];
				$qnos = $row['qnos'];
				$attmpt = $row['attmpt'];
			}
		}


		$avg = ($cc/$qnos)*100;
		if( !($avg >= 60)){
			$coupon = "No Coupon";
		}
		/*$sql = "INSERT INTO evaluations (
		quiz,email,name,marks,averagePercent,coupon,evaldate) VALUES ('$cquiz','$cemail', '$cname','$cc','$avg','$coupon',NOW())";*/

		$sql = "UPDATE evaluations SET marks='$cc', averagePercent='$avg', coupon='$coupon', evaldate=NOW() WHERE quiz='$cquiz' and email='$cemail'";
		if(mysqli_query($conn, $sql)){
			header("location:scores.php");
		}
		else {
			echo $conn->error;
		}
	}
}

if(isset($_GET['scores'])){

	//initiate();


	$cquiz = $_SESSION['cquiz'];
	$cemail = $_SESSION['email'];
	$cname = $_SESSION['name'];
	$coupon = mt_rand(10000,99999);

	$avgsql = "SELECT tqnos,qnos,attmpt FROM quizzes WHERE quizname='$cquiz'";
	if($totqns = mysqli_query($conn,$avgsql)){
		while($row=mysqli_fetch_assoc($totqns)){
			$total = $row['tqnos'];
			$qnos = $row['qnos'];
			$attmpt = $row['attmpt'];
		}
	}



	$marks = $_GET['scores'];
	$avg = ($marks/$qnos)*100;
	if( !($avg >= 60)){
		$coupon = "No Coupon";
	}
	$sql = "INSERT INTO evaluations (quiz,email,name,marks,averagePercent,coupon,evaldate) VALUES('$cquiz','$cemail','$cname','$marks','$avg','$coupon',NOW())";

	if(mysqli_query($conn,$sql)){
		$attmpt += 1;
		$updsql = "UPDATE quizzes SET attmpt='$attmpt' WHERE quizname='$cquiz'";
		if(mysqli_query($conn,$updsql)){
			header("location:scores.php");

			/*if($avg >= 60) {

				echo "
				<div class='scoresheet'>
				<h1 align='center' style='margin:40px 0px;'>
				Your Score : ".$marks."</h1>
		
				<div class='progress' style='width:80%; margin:0px 40px;height:30px;'>
				<div class='progress-bar progress-bar-striped' role='progress-bar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width:".$avg."%;'>
				".$avg." %</div></div>
				<h3 class='glow'>".$coupon."</h3>
				<p style='font-size:30px;'>Use this Coupon Code to get Scholarship Offers. 
				Contact 8428992535 to know about the Scholarship Offers.</p>
				</div>";

			}
			else {
				echo "
				<div class='scoresheet'>
				<h1 align='center' style='margin:40px 0px;'>
				Your Score : ".$marks."</h1>
		
				<div class='progress' style='width:80%; margin:0px 40px;height:30px;'>
				<div class='progress-bar progress-bar-striped' role='progress-bar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width:".$avg."%;'>
				".$avg." %</div></div>
				<p style='font-size:30px;'>Sorry! You didnt get a coupon. Best of Luck Next Time. 
				You can try again in next week with new set of questions.</p>
				</div>";
			}
			*/

		}
		else {
			echo $conn->error;
		}

	}
	else {
		echo "server problem";
	}

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