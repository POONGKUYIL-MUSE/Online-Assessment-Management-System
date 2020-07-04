<?php
ob_start();
session_start();
if(isset($_SESSION['email'])) {
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
<link rel="icon" href="../css/logo.ico">

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
  <h2>View Students</h2>      
  <div class='table-responsive'>
  <table border='0' width="100%" cellpadding="8px" class='table'>
    <tr align="center">
      <th></th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Role</th>
      <th>School/College</th>
      <th>Class/Degree</th>
      <th>City</th>
      <th>Password</th>
      <th>Activate</th>
    </tr>
<?php
  $sql = "SELECT * FROM users";
  if($result=mysqli_query($conn,$sql)){
    while($row=mysqli_fetch_assoc($result)){
      //echo $row['quizname']."=>".$row['qnos'];
      echo "<tr align='center'>
      <td><a class='btn btn-danger' href='viewstud.php?dstud=".$row['email']."' aria-label='Delete'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>
      <td>".$row['name']."</td>
      <td>".$row['email']."</td>
      <td>".$row['mbl']."</td>
      <td>".$row['role']."</td>
      <td>".$row['field1']."</td>
      <td>".$row['field2']."</td>
      <td>".$row['city']."</td>
      <td>".$row['pswd']."</td>
      <td>".$row['activate']."</td>
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
if(isset($_GET['dstud'])){
  $ddstud = $_GET['dstud'];
  
    //echo "deleted";
    $sql = "DELETE FROM users WHERE email='$ddstud'";
    if(mysqli_query($conn,$sql)){
      echo "<script>alert('User Deleted');
      window.location.href='viewstud.php';
      </script>";
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