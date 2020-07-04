<?php
session_start();
$mobile = "8428992535";
$mblotp = $mobile."otp";
$otp = "12345";



$_SESSION[$mblotp] =  $otp;
$_SESSION['mymbl'] = $mobile;
?>