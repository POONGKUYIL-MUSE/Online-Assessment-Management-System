<?php
ob_start();
session_start();
if(isset($_SESSION['email'])) {
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

* {box-sizing: border-box;}

.container {
  position: relative;
  width: 100%;
  /*max-width: 300px;*/
}

.image {
  display: block;
  width: 100%;
  height: 100%;
}

.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: red;
  font-size: 20px;
  padding: 20px;
  text-align: center;
  font-weight: bold;
}

.container:hover .overlay {
  opacity: 1;
}


</style>

</head>
<body>

<div class="head"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <span class="out"><a class="nav-link" href="logout.php">Logout</a></span>
  </nav></div>


<div class="sidebar">
  <a href="index.php">MyProfile</a>
  <a href="createquiz.php">Create Quiz</a>
  <a href="uplquiz.php">Upload Quiz</a>
  <a href="viewquiz2.php">View Quiz</a>
  <a href="addstud.php">Add Student</a>
  <a href="viewstud.php">View Student</a>
  <a href="export.php">Export as Excel</a>
</div>

<div class="content">
  <h2>Upload Quiz</h2>
  <h6 style="color:red;">Upload Quiz in Excel Format</h6>
<br>
  <form method="post" action="uplProcess2.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="quizname"><b>Enter Quiz Name : </b><i style="color:red;">Example : Test1.js</i></label>
      <input type="text" name="qname" placeholder="Enter filename.js" class="form-control" autofocus="true">
    </div>
    <div class="form-group">
      <label for="quizname"><b>Type of Question : </b><i style="color:red;">Example : english or tamil</i></label>
      <!--<input type="text" name="qtype" placeholder="Enter type of Question" class="form-control" autofocus="true">-->
      <input type='radio' name='qtype' value='english'>English
      <input type='radio' name='qtype' value='tamil'>Tamil
    </div>
    <div class="form-group">
      <label for="qstatus">Quiz Status: (Example:- active or deactive)</label>
      <input type="text" class="form-control" id="qstatus" placeholder="Enter Quiz Status" name="qstatus" required>
    </div>
    <div class="form-group">
      <label for=""><strong>Enter No. of Questions to Display : </strong></label>
      <input type="text" placeholder="Number of Questions" class="form-control" name="qnos" required>
    </div>
    <div class="form-group">
      <label for=""><strong>Enter Timing for Entire Quiz : </strong><i style="color:red;">Enter only minutes to complete the Quiz</i></label>
      <input type="text" placeholder="Timing is entered in minutes" class="form-control" name="timing" required>
    </div>
    <div class="form-group">
      <label for="section"><b>Enter section point : </b><i style="color:red;">Example : See the below picture</i></label>
      <input type="text" name="section" placeholder="[starting cell address] : [ending cell address] ?=> like A2:G3 " class="form-control">
    </div>
    <div class="form-group">
      <label for="files"><b>Upload File : </b></label>
      <input type="file" name="uplfile" class="form-control">
    </div>
    <input type="submit" name="sbtn" class="btn btn-info">
  </form>
  <br><br>
  <div class="container">
    <div style="color:green; font-weight: bold;">Hover on the image to know the Section point.</div>
    <img src="exceldemo.JPG" alt="Avatar" class="image">
    <div class="overlay">[ A2 : G3 ]</div>
  </div>

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