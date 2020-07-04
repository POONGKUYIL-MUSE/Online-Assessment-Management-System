<?php

session_start();
if(session_destroy()){
	unset($_SESSION['endTimes']);
	header('location:../login.php');
}

?>