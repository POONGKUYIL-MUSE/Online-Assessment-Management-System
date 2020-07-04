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
		//padding:5px;
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
	</style>
<link rel="icon" href="../css/logo.ico">
</head>

<body>

<?php
include "../config.php";
session_start();
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

<?php
if(isset($_GET['cquiz'])){
	$cquiz = $_GET['cquiz'];
	$_SESSION['cquiz'] = $cquiz;
	echo $cquiz;
	$cuser = $_SESSION['email'];

	$sqlchck = "SELECT * FROM evaluations WHERE quiz='$cquiz' and email='$cuser'";
	$res = mysqli_query($conn,$sqlchck);
	if(mysqli_num_rows($res)>0){
		echo "<script>alert('Quiz Attempted for ".mysqli_num_rows($res)." time.');</script>";
		echo "<script>window.location.href='tests2.php';</script>";
	}
	else{


		$sqlnum = "SELECT tqnos,qnos FROM quizzes WHERE quizname='$cquiz'";
		if($result = mysqli_query($conn,$sqlnum)){
			while($r = mysqli_fetch_assoc($result)){

			echo "<script>var n = ".$r['tqnos']."; var nn = ".$r['qnos'].";</script>";

		}

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


	<div class="qpanel">
		<div class="qhead"><span id="questionno"></span>. &nbsp;<span id="question"></span></div>
		<div class="qbody">
		<div><input type="radio" id="opt1" name="options"><span id="optt1"></span></div>
		<div><input type="radio" id="opt2" name="options"><span id="optt2"></span></div>
		<div><input type="radio" id="opt3" name="options"><span id="optt3"></span></div>
		<div><input type="radio" id="opt4" name="options"><span id="optt4"></span></div>
		</div>
		<button onclick="checkAnswer()"
		<button onclick="next()" class="btn btn-primary nextbtn">Next</button>
	</div>
	<?php echo "<script src='../admin/quiz/".$cquiz."'></script>"; ?>
	<!--<script src="testlayout.js"></script>-->

<script>

//sgenerate(0);

function generate(index) {
	document.getElementById("questionno").innerHTML = myJson[index].qno;
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
}

function checkAnswer(index) {
	console.log("yeah in");
	if(document.getElementById('opt1').checked && myJson[index].option1 == myJson[index].answer){
		correctCount++;
		console.log("Selected option 1"+correctCount);
	}else{console.log("wrong1=>"+index);}
	if(document.getElementById('opt2').checked && myJson[index].option2 == myJson[index].answer){
		correctCount++;
		console.log("Selected option 2"+correctCount);
	}else { console.log("wrong2=>"+index); }
	if(document.getElementById('opt3').checked && myJson[index].option3 == myJson[index].answer){
		correctCount++;
		console.log("Selected option 3"+correctCount);
	}else { console.log("wrong3=>"+index); }
	if(document.getElementById('opt4').checked && myJson[index].option4 == myJson[index].answer){
		correctCount++;
		console.log("Selected option 4"+correctCount);
	}else { console.log("wrong4=>"+index);}

	/*

	//increment i for next qn
	i++;
	if(myJson.length-1 < i){
		var score = correctCount;
		//document.write("your score : "+correctCount);
		window.location.href="launchtest.php?scores="+score;
		//window.location.href="launchtest.php";
	}
	generate(i);
	*/
	
}

j=0;
generate(rand[j]);
//checkAnswer(rand[j]);
j++;
function next(){

	if(j<nn){
		generate(rand[j]);
		//checkAnswer(rand[j]);

		/*
		if(document.getElementById('opt1').checked && myJson[j].option1 == myJson[j].answer){
			correctCount++;
			console.log("Selected option 1"+correctCount);
		}
		if(document.getElementById('opt2').checked && myJson[j].option2 == myJson[j].answer){
			correctCount++;
			console.log("Selected option 2"+correctCount);
		}
		if(document.getElementById('opt3').checked && myJson[j].option3 == myJson[j].answer){
			correctCount++;
			console.log("Selected option 3"+correctCount);
		}
		if(document.getElementById('opt4').checked && myJson[j].option4 == myJson[j].answer){
			correctCount++;
			console.log("Selected option 4"+correctCount);
		}
		*/

		j++;
	}
	else {
		var score = correctCount;
		//document.write("your score : "+correctCount);
		window.location.href="launchtest.php?scores="+score;
		//window.location.href="launchtest.php";
	}


}

</script>















<?php
}
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



	$sql = "INSERT INTO evaluations (quiz,email,name,marks,averagePercent,evaldate) VALUES('$cquiz','$cemail','$cname','$marks','$avg',NOW())";

	if(mysqli_query($conn,$sql)){
		//echo "<h1 class='changestyle'>Your score : ".$marks."</h1>";

		/*echo "<div class='scoresheet'>
		<h1 align='center' style='margin:40px 0px;'>
		Your Score : ".$marks."</h1>
		<div class='skillbar'>
			<div class='skills' style='width:".$avg.";background-color:#808080;'>".$avg."%</div>
		</div>
		</div>
		";*/

		$attmpt += 1;
		$updsql = "UPDATE quizzes SET attmpt='$attmpt' WHERE quizname='$cquiz'";
		if(mysqli_query($conn,$updsql)){

			echo "
			<div class='scoresheet'>
			<h1 align='center' style='margin:40px 0px;'>
			Your Score : ".$marks."</h1>
	
			<div class='progress' style='width:80%; margin:0px 40px;height:30px;'>
			<div class='progress-bar progress-bar-striped' role='progress-bar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width:".$avg."%;'>
			".$avg." %</div></div></div>";

		}

/*<!--<div class='progress'>
<div class='progress-bar progress-bar-striped active' role='progress-bar' aria-valuenow='<?php //echo $avg; ?>' aria-valuemin='0' aria-valuemax='100' style="width:<?php //echo $avg; ?>;%">

	<?php //echo $avg; ?>
</div></div>
*/

	}
	else {
		echo "server problem";
	}

}

?>
</div>
</body>
</html>
