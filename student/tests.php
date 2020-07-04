<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles2.css">

</head>
<body>

<div class="head"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <span class="out"><a class="nav-link" href="logout.php">Logout</a></span>
  </nav></div>


<div class="sidebar">
  <a href="index.php">My Profile</a>
  <a href="tests2.php">Attempt Quiz</a>
  <a href="scores.php">Score Board</a>
  <a href="#" class="logoutmenu">Logout</a>
</div>

<div class="content">
  <h2>Attempt Tests</h2>
  <?php
    $dir = "../admin/quiz/";

  	if(is_dir($dir)){
    	if($dh = opendir($dir)) {
      		while(($file = readdir($dh)) !== false){
        		if($file!='.' and $file!='..'){
        			//echo "Filename : <a href='".$dir.$file."' target='_blank'>".$file."</a><br>";
        			echo "Filename : <a href='launchtest.php?cquiz=".$file."' target='_blank'>".$file."</a><br>";
        		}
        		
      		}
      		closedir($dh);

    	}
  	}
?>
</div>

</body>
</html>
