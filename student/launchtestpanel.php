<!DOCTYPE html>
<html>
<head>
	<title>Test Panel</title>
	<link rel='stylesheet' type='text/css' href='../css/styles2.css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<style>

	
	@font-face {
		font-family : Bamini;
		src : url(fonts/Bamini.TTF);
	}
	
	.tamilfont {
		font-family: Bamini;
	}

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
<body>
<?php
if(isset($_GET['cquiz'])) {
?>
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
	
	<div id="timer" name="timer" style="font-size: 30px; color:red; margin:auto auto;"></div>

	<div class="navpanel">
		<script>
			var i,j=0;
			var n = 5;
			var rand = [];
			for(j=0;j<n;j++) {
				rand.push(j);
			}
			rand.sort(function(a,b){ return 0.5 - Math.random() });
			console.log(rand);
		</script>
		<?php
			$myarr = "<script>document.write(rand);</script>";
			/*echo $myarr;
			echo var_dump($myarr);*/

			$myarr = "0,1,2,3,4";
			//for($i=0;$i<strlen($myarr);$i=$i+2) {
				//echo $myarr[$i];
				echo "<script>var myrand = ".$myarr."</script>";
			//}
		?>

		<script>
			console.log(myrand);
		</script>
	</div>
	
	<div class="qpanel">
		<div class="qhead" id="qh"><span id="questionno"></span>. &nbsp;<span id="question"></span></div>

		<div class="qbody" id="qb">
			<div><input type="radio" id="opt1" name="options"><span id="optt1"></span></div>
			<div><input type="radio" id="opt2" name="options"><span id="optt2"></span></div>
			<div><input type="radio" id="opt3" name="options"><span id="optt3"></span></div>
			<div><input type="radio" id="opt4" name="options"><span id="optt4"></span></div>
		</div>

	</div>

</div>
<?php
}
?>
</body>
</html>