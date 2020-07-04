<?php
ob_start();
session_start();
if(isset($_SESSION['email'])){
  include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <link rel="icon" href="css/logo.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="css/logo.ico">
    <link rel="stylesheet" type="text/css" href="css/styles2.css">

<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.container-fluid {
  padding-top:50px;
  padding-bottom:50px;
  padding-left:100px;
  padding-right: 100px;
}

@media screen and (max-width: 600px) {

  .container-fluid {
    margin-top: 150px;
    margin-bottom: 50px;
    margin-left: 20px;
    margin-right: 30px;
    padding:10px;
    width: 340px;
  }
  input[type=text] {
    width: 60%;
  }
}
</style>

</head>
<body>


<?php
if(isset($_GET['cquiz']))
{
$cquiz=$_GET['cquiz'];
if(isset($_POST['submit']))
{
$qname = $_POST['qname'];
$qtype = $_POST['qtype'];
$qstatus = $_POST['qstatus'];
$qnos = $_POST['qnos'];
$timing = $_POST['timing'];
$attempt = $_POST['attempts'];

$query3=mysqli_query($conn, "update quizzes set quizname='$qname', type='$qtype', status='$qstatus', qnos='$qnos', timing='$timing', attmpt='$attempt' where quizname='$cquiz'");
if($query3)
{
  
	header("location:viewquiz2.php");
    die();

}
}
$query1=mysqli_query($conn, "select * from quizzes where quizname='$cquiz'");
$query2=mysqli_fetch_array($query1);
?>

<div id="home" class="container-fluid">
  
  <h2>Settings</h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="qname">Quizname:</label>
      <input type="text" class="form-control" id="qname" placeholder="Enter Quiz Name" name="qname" autofocus="true" value="<?php echo $query2['quizname']; ?>" required>
    </div>
    <div class="form-group">
      <label for="qtype">Quiz type: (Example:- english or tamil)</label>
      <input type="text" class="form-control" id="qtype" placeholder="Enter Quiz type" name="qtype" value="<?php echo $query2['type']; ?>" required>
    </div>
    <div class="form-group">
      <label for="qstatus">Quiz Status: (Example:- active or deactive)</label>
      <input type="text" class="form-control" id="qstatus" placeholder="Enter Quiz Status" name="qstatus" value="<?php echo $query2['status']; ?>" required>
    </div>
    <div class="form-group">
      <label for="qnos">Questions to display:</label>
      <input type="text" class="form-control" id="qnos" placeholder="Enter Questions to display" name="qnos" value="<?php echo $query2['qnos']; ?>" required>
    </div>
    <div class="form-group">
      <label for="timing">Quiz Timing:</label>
      <input type="text" class="form-control" id="timing" placeholder="Enter Quiz Timing" name="timing" value="<?php echo $query2['timing']; ?>" required>
    </div>
    <div class="form-group">
      <label for="attempt">Attempts:</label>
      <input type="text" class="form-control" id="attempts" placeholder="Enter Quiz Attempts" name="attempts" value="<?php echo $query2['attmpt']; ?>" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
  </form>
  

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