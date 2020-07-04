<?php

$conn = new mysqli("localhost","root","","examspot");
if($conn->connect_error){
	die("Couldnot Connect to Server");
}
else {
	//echo "connected";
}
?>