<?php
//error_reporting(E_ERROR | E_PARSE);
include "../config.php";
session_start();

if(isset($_SESSION['cquiz']) and isset($_SESSION['email'])) {

	$cquiz = $_SESSION['cquiz'];
	$cemail = $_SESSION['email'];


	$sql = "SELECT timing FROM quizzes WHERE quizname = '$cquiz'";

	if($res = mysqli_query($conn,$sql)){
		while($row = mysqli_fetch_assoc($res)){
			$timing = $row['timing'];
		}


		if(!isset($_SESSION['endTimes'])){
			$_SESSION['endTimes'] = time() + $timing * 60;
			echo "Your Time Starts Now!";
		}
		else if($_SESSION['endTimes'] >= time()){

			$mytime = $_SESSION['endTimes'] - time();

			$h = $mytime / 3600 % 24;
			$m = $mytime / 60 % 60;
			$s = $mytime % 60;

			echo "Time Left => ".$h.":".$m.":".$s;


		}
		else {
			
			//unset($_SESSION['qnstatus']);
			unset($_SESSION['endTimes']);
			echo "Time is up.";
			
			//header("location:index.php");
		}

	}
	else {
		echo "<script>alert('Server ERROR');</script>";
		header('location:index.php');
	}
}

?>