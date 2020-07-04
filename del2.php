<?php
session_start();

$mobile = $_SESSION['mymbl'];
$mblotp = $mobile."otp";

if($_SESSION[$mblotp] == "1235"){
	echo "equal";
}
else {
	echo "not equal";
}
?>