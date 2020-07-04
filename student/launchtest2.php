<?php
ob_start();
session_start();
if(isset($_SESSION['email'])){
	include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>LaunchTest</title>
	<link rel='stylesheet' type='text/css' href='../css/styles2.css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>

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
	if(isset($_GET['cquiz'])){
		$cquiz = $_GET['cquiz'];
		$_SESSION['cquiz'] = $cquiz;
		echo $cquiz;
		$cuser = $_SESSION['email'];

			$sqlnum = "SELECT tqnos,qnos FROM quizzes WHERE quizname='$cquiz'";
			if($result = mysqli_query($conn,$sqlnum)){
				while($r = mysqli_fetch_assoc($result)){
				echo "<script>var n = ".$r['tqnos']."; var nn = ".$r['qnos'].";</script>";
			}	
	?>

	<script>
	var i = 0;
	var correctCount = 0;
	var j=0;
	var rand = [];


	for(j=0;j<n;j++){
		rand.push(j);
	}


	rand.sort(function(a,b){ return 0.5 - Math.random()});

	console.log(rand);

	</script>

	<div id="timer" name="timer" style='font-size: 30px;color:red;margin:auto auto;'></div>

	<div class="qpanel">
		<div class="qhead"><span id="questionno"></span>. &nbsp;<span id="question"></span></div>
		<div class="qbody">
		<div><input type="radio" id="opt1" name="options" value="a"><span id="optt1"></span></div>
		<div><input type="radio" id="opt2" name="options" value="b"><span id="optt2"></span></div>
		<div><input type="radio" id="opt3" name="options" value="c"><span id="optt3"></span></div>
		<div><input type="radio" id="opt4" name="options" value="d"><span id="optt4"></span></div>
		</div>
		
		<button onclick="next()" class="btn btn-primary nextbtn" id="btn" name="btn">Next</button>
	</div>
	<?php echo "<script src='../admin/quiz/".$cquiz."'></script>"; ?>
	<!--<script src="testlayout.js"></script>-->

<script>

//sgenerate(0);
var sncount = 1;

function generate(index) {
	//document.getElementById("questionno").innerHTML = myJson[index].qno;
	document.getElementById("questionno").innerHTML = sncount;
	document.getElementById("question").innerHTML = myJson[index].qn;
	document.getElementById("optt1").innerHTML = myJson[index].option1;
	document.getElementById("optt2").innerHTML = myJson[index].option2;
	document.getElementById("optt3").innerHTML = myJson[index].option3;
	document.getElementById("optt4").innerHTML = myJson[index].option4;

	document.getElementById('opt1').checked = false;
	document.getElementById('opt2').checked = false;
	document.getElementById('opt3').checked = false;
	document.getElementById('opt4').checked = false;

	console.log(rand);
	sncount += 1;
}

function checkAnswer(index) {
	console.log("yeah in");
	if(document.getElementById('opt1').checked && myJson[index].answer == "a"){
		correctCount++;
		console.log("Selected option 1"+correctCount);
	}else{console.log("wrong1=>"+index);}
	if(document.getElementById('opt2').checked && myJson[index].answer == "b"){
		correctCount++;
		console.log("Selected option 2"+correctCount);
	}else { console.log("wrong2=>"+index); }
	if(document.getElementById('opt3').checked && myJson[index].answer == "c"){
		correctCount++;
		console.log("Selected option 3"+correctCount);
	}else { console.log("wrong3=>"+index); }
	if(document.getElementById('opt4').checked && myJson[index].answer == "d"){
		correctCount++;
		console.log("Selected option 4"+correctCount);
	}else { console.log("wrong4=>"+index);}
	
	window.location.href="launchtest2.php?indiscore="+correctCount;
}

j=0;
generate(rand[j]);
//checkAnswer(rand[j]);
//j++;
function next(){
		checkAnswer(rand[j]);
		j++;
	if(j<nn){
		generate(rand[j]);
	}
	else {
		var score = correctCount;
		//document.write("your score : "+correctCount);
		window.location.href="launchtest2.php?scores="+score;
		//window.location.href="launchtest.php";
	}
}
</script>

<script>
var freq = setInterval(()=>{
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open('GET','countdownSession.php',false);
	xmlhttp.send(null);
	if(xmlhttp.responseText != "Time is up.") {
	document.getElementById('timer').innerHTML = xmlhttp.responseText;
	}
	else {
		clearInterval(freq);
		document.getElementById('btn').addEventListener("click",next());
		//window.location.href="launchtest.php?scores="+score;
	}
},1000);
</script>

<?php
}
}


if(isset($_GET['indiscore'])){
	
	echo "<script>console.log(".$_GET['indiscore'].");</script>";

	$randsql = "INSERT INTO evaluations(quiz, email, name, order, marks, averagePercent, evaldate) VALUES ()";
}


if(isset($_GET['scores'])){
	//echo $_SESSION['cquiz'];
	//echo $_GET['scores'];

	$cquiz = $_SESSION['cquiz'];
	$marks = $_GET['scores'];
	$cemail = $_SESSION['email'];
	$cname = $_SESSION['name'];

	/*
	*  Calculating average percent
	*/

	$total=$avg=0;
	$attmpt=0;
	$avgsql = "SELECT tqnos,qnos,attmpt FROM quizzes WHERE quizname='$cquiz'";
	if($totqns = mysqli_query($conn,$avgsql)){
		while($row=mysqli_fetch_assoc($totqns)){
			$total = $row['tqnos'];
			$qnos = $row['qnos'];
			$attmpt = $row['attmpt'];
		}
	}
	$avg = ($marks/$qnos)*100;
	$coupon = mt_rand(10000,99999);

	if( !($avg >= 60)){
		$coupon = "No Coupon";
	}

	$sql = "INSERT INTO evaluations (quiz,email,name,marks,averagePercent,coupon,evaldate) VALUES('$cquiz','$cemail','$cname','$marks','$avg','$coupon',NOW())";

	if(mysqli_query($conn,$sql)){
		$attmpt += 1;
		$updsql = "UPDATE quizzes SET attmpt='$attmpt' WHERE quizname='$cquiz'";
		if(mysqli_query($conn,$updsql)){

			if($avg >= 60) {

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
