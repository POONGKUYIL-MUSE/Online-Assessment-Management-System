<?php
ob_start();
session_start();
if(isset($_SESSION['email'])){
  include "../config.php";
?>

<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles2.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">

<script src="js/scripts.js"></script>
<link rel="icon"  href="../css/logo.ico">
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}


</style>


</head>
<body>

<div class="head"><nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top"><span class="out"><a class="nav-link" href="logout.php">Logout</a></span>
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

<div class="content container">
  <h2>View Quiz</h2>

  <div class='table-responsive'>
  <table border='0' width="100%" cellpadding="8px" class='table'>
    <tr align="center">
      <th></th>
      <th></th>
      <th></th>
      <th>Quiz Name</th>
      <th>Type</th>
      <th>Status</th>
      <th>No of Qns</th>
      <th>Attempts</th>
      <th>Created Date</th>
    </tr>
<?php
  $sql = "SELECT * FROM quizzes";
  if($result=mysqli_query($conn,$sql)){
    while($row=mysqli_fetch_assoc($result)){
      //echo $row['quizname']."=>".$row['tqnos'];
      echo "<tr align='center'>
      <td><a class='btn btn-danger' href='viewquiz2.php?dquiz=".$row['quizname']."' aria-label='Delete'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>
      
      <td><a class='btn btn-warning' href='settings.php?cquiz=".$row['quizname']."'><i class='fa fa-cog' aria-hidden='true'></i></a></td>

      <td><a class='btn btn-info' href='analyze.php?squiz=".$row['quizname']."'><i class='fa fa-bar-chart' aria-hidden='true'></i></a></td>
      <td>".$row['quizname']."</td>
      <td>".$row['type']."</td>
      <td>".$row['status']."</td>
      <td>".$row['tqnos']."</td>
      <td>".$row['attmpt']."</td>
      <td>".$row['crdate']."</td>
      </tr>";
    }
  }
  else {
    echo $conn->error;
  }
?>
</table>
</div>
</div>
<?php
if(isset($_GET['dquiz'])){
  $dquiz = 'quiz/'.$_GET['dquiz'];
  $ddquiz = $_GET['dquiz'];
  
    //echo "deleted";
    $sql = "DELETE FROM quizzes WHERE quizname='$ddquiz'";
    if(mysqli_query($conn,$sql)){
      if(!unlink($dquiz)){
        echo "<script>alert('Couldnot delete. ".$ddquiz." Retry');
        window.location.href='viewquiz2.php';</script>";
        //echo "couldnt delte";
      }
      else {
        echo "<script>alert('Quiz Deleted');
        window.location.href='viewquiz2.php';
        </script>";
      }
    }
    else {
      echo "<script>alert('Couldnot delete. Permenantly');</script>";
    }
  
}

?>

</body>
</html>

<?php
}
else {
  echo "Login is must <a href='../index.php'>Click Here to Login</a>";
}
ob_end_flush();
?>