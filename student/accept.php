<?php
ob_start();
session_start();
if(isset($_SESSION['email'])){
  include "../config.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>RULES</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="../css/logo.ico">

<script type="text/javascript">
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

<style>

.heading{
	
	padding: 15px;
	line-height: 30px;
	font-size: 25px;
	font-family: 'Blippo, fantasy';
	
}

.head {
	font-family: Impact, fantasy;
}

.section {
	padding: 15px;
	line-height: 30px;
	font-size: 20px;
	font-family: 'Blippo, fantasy';
}

.ending {
	padding: 15px;
	text-align: center;
}

</style>

</head>
<body>
<div class='container'>

<?php

if(isset($_GET['quiz'])){
  $accept = $_GET['quiz'];
  $cuser = $_SESSION['email'];
  $cusername = $_SESSION['name'];

  $sqlcheck = "SELECT * FROM evaluations WHERE quiz='$accept' and email='$cuser'";
  $res = mysqli_query($conn,$sqlcheck);
  if(mysqli_num_rows($res)>0){
  	echo "<script>alert('Quiz Attempted Already');</script>";
  	echo "<script>window.location.href='tests2.php';</script>";
  }else {

  $sql = "SELECT * FROM quizzes WHERE quizname = '$accept'";
  if($res = mysqli_query($conn,$sql)){
  	while($row = mysqli_fetch_assoc($res)){
  		$tqnos = $row['tqnos'];
  		$qnos = $row['qnos'];
  		$timing = $row['timing'];

  	}
  }

  //Random Question Pattern
  $myrand = range(0,5);
  array_rand($myrand);


  $insSql = "INSERT INTO evaluations(quiz, email, name, qnpattern, marks, averagePercent, coupon) VALUES('$accept', '$cuser', '$cusername', '$myrand', 0, 0, 'null')";
  if(mysqli_query($conn, $insSql)) {


  //$h = (int)($timing / 60);
  $m = (int)($timing);
  //$s = (int)($timing * 60);


  echo "
	<div class='heading'>
	<h3 class='head'>Quiz Details : </h3>
		<div>Quiz Name : ".$accept."</div>
		<div>Total Number of Questions : ".$qnos."</div>
		<div>Total Time provided to finish the quiz : <i class='fa fa-clock-o fa-2x btn-outline-warning fa-spin fa-fw' aria-hidden='true'></i> <b><font color='red'>".$m." Minutes.</font></b></div>
		
	</div>

	<div class='section'>
	<h3 class='head'>Rules And Regulation : </h3>
		1. Read the questions thoroughly. <br>
		2. The time allocated is for the entire quiz. So accordinly fix time for each question. <br>
		3. Click on 'Next button' once you select the answer. <br>
    4. Evaluation is completed only when all the questions are attempted and answered.<br>
    5. Quiz is terminated when a new tab is clicked, when a new window is opened, when another application is tried to open.<br>
		6. Each question has 4 options. And must select one from it. <br>
		7. Each question carry one mark. <br>
    <p style='color:red; font-weight:bold;'>8. ( PRESS F11 in WINDOWS ) [OR] ( PRESS Fn + F11 in WINDOWS ) [OR] ( Command + Shift + F in MAC ) AND START YOUR TEST.</p>
		Once you studied this. <i><b>Click on the link below to Start your Test !</b></i><br>

	</div>

	<div class='ending'>
	<a href='launchtestpanel.php?cquiz=".$accept."'><button type='submit' class='btn btn-primary'> I Read the Rules and Regulations. Now I accept the Test !</button></a>
	</div>
	

  ";

  }
  else {
    echo $conn->error;
  }
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