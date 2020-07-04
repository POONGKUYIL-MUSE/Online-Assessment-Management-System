<?php
ob_start();
session_start();
if(isset($_SESSION['email'])){
  include "../config.php";

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles2.css">
<link rel="icon" href="../css/logo.ico">
<style>
  .sidebar .logoutmenu {
    display: none;
  }
  @media screen and (max-width: 600px) {
    .sidebar .logoutmenu {
      display: inline;
      text-align: center;
    }
  }
</style>
<script>

//Right Click Disabler
document.addEventListener("contextmenu", event=>event.preventDefault());

//Keyboard Right-Click disabler
/*
KEYCODES
67 - C
85 - U
86 - V
117 - u
83 - S
80 - P
73 - I
105 - i
*/

document.onkeydown = function(e) {
  if((e.ctrlKey) && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117 || e.keyCode === 83 || e.keyCode === 80)) {
    alert("Not Allowed");
  return false;
  }
  else if((e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 105 ))){
    alert("Not Allowed");
    return false;
  }
  else {
    return true;
  }
};
</script>
</head>
<body>

<div class="head"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <span class="out"><a class="nav-link" href="logout.php">Logout</a></span>
  </nav></div>


<div class="sidebar">
  <a align='center'><img src="../css/logo.ico" width="100px"/></a>
  <a href="index.php">My Profile</a>
  <a href="tests2.php">Attempt Quiz</a>
  <a href="scores.php">Score Board</a>
  <a href="logout.php" class="logoutmenu">Logout</a>
</div>

<div class="content container">

<?php
if(isset($_GET['cquiz'])){
//echo $_GET['cquiz'];
$cquiz = $_GET['cquiz'];
$sqlnum = "SELECT qnos FROM quizzes WHERE quizname='$cquiz' and status='deactive'";
//$n = '';
$res = mysqli_query($conn, $sqlnum);
$rowCount = mysqli_num_rows($res);
if($rowCount) {
  while($r = mysqli_fetch_assoc($res)){

    echo "<script> var n = ".$r['qnos']."</script>";
    $n = $r['qnos'];

  }
echo "<script src='../admin/quiz/".$cquiz."'></script>";

?>
<div class="panel">
  <?php
  $i = 0; 
  for($i=0; $i<$n; $i++) {  
    echo "
      <div class='qhead'>
        <span id='questionno'><script>document.write(myJson[".$i."].qno);</script></span>. &nbsp;
        <span id='question'><script>document.write(myJson[".$i."].qn);</script></span>
      </div>
      <div class='qbody'>
        <div>A. <span id='opt1'><script>document.write(myJson[".$i."].option1);</script></span></div>
        <div>B. <span id='opt2'><script>document.write(myJson[".$i."].option2);</script></span></div>
        <div>C. <span id='opt3'><script>document.write(myJson[".$i."].option3);</script></span></div>
        <div>D. <span id='opt4'><script>document.write(myJson[".$i."].option4);</script></span></div>
        <div>Answer : <span id='answer'><script>document.write(myJson[".$i."].answer);</script></span></div>
      </div>";

  }


?>
</div>


<?php
}
else {
  echo "<h3>Thank You for Attending the Test. Answer Key will be uploaded regularly @3pm</h3>";
}

?>


</div>

</body>
</html>
<?php
}

}
else {
  echo "Login is must <a href='../index.php'>Click Here to Login</a>";
}
ob_end_flush();
?>