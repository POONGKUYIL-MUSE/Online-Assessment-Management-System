<!DOCTYPE html>
<html>
<head>
	<title>Show Answer</title>
</head>
<body>
<?php

if(isset($_GET['show'])){
	$show = $_GET['show'];

	if($show == 'yes') {
		echo "show ans";
	}
	else {
		echo "dont show";
	}
}

?>
</body>
</html>