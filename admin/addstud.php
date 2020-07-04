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
<link rel="icon" href="../css/logo.ico">

<script src="js/scripts2.js"></script>

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
  <h2>Add Student</h2>
  <div id="status"></div><br>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <div>
    &nbsp;
    <input type="button" class="btn btn-primary" value="ADD" onclick="addRow('memberTable')">
    &nbsp;
    <input type="button" class="btn btn-primary" value="REMOVE" onclick="deleteRow('memberTable')">
    </div>
    <br>

    <table width="100%" border="0" id="memberTable" cellpadding="10px" cellspacing="5">
    <tr><td><input style="width:20px; height: 20px;" type="checkbox"  name="mycheck[]"></td>
    <td>
      
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Name</span>
        </div>
        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name[]">
        <div class="input-group-prepend">
          <span class="input-group-text">Email</span>
        </div>
        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email[]">
        <div class="input-group-prepend">
          <span class="input-group-text">mobile</span>
        </div>
        <input type="text" class="form-control" id="mbl" placeholder="Enter Mobile" name="mbl[]">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Role</span>
        </div>
        <select name="role" class="form-control">
          <option value="none">--Select any one--</option>
          <option value="work">Work</option>
          <option value="student">Student</option>
        </select>
        <div class="input-group-prepend">
          <span class="input-group-text">hh</span>
        </div>
        <input type="text" class="form-control" id="field1" placeholder="Enter School/College/Company" name="field1[]">
        <input type="text" class="form-control" id="field2" placeholder="Enter Class/Degree/Designation" name="field2[]">
        <div class="input-group-prepend">
          <span class="input-group-text">City</span>
        </div>
        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city[]">
      </div>
      <div class="input-group md-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Password</span>
        </div>
        <input type="text" class="form-control" id="pswd" placeholder="Enter Password" name="pswd[]">
        <div class="input-group-prepend">
          <span class="input-group-text">Confirm Password</span>
        </div>
        <input type="text" class="form-control" id="conpswd" placeholder="Enter Confirmation Password" name="conpswd[]">
      </div>
    </td></tr>
    <!--<tr><td><input type="submit" name="sbtn" value="Append"></td></tr>-->
    </table>
    <br>
    <input type="submit" class="btn btn-primary" name="sbtn">
  </form>
</div>

</body>
</html>

<?php

$msg = '';

if(isset($_POST['sbtn'])){
    
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mbl = $_POST['mbl'];
  $role = $_POST['role'];
  $field1 = $_POST['field1'];
  $field2 = $_POST['field2'];
  $city = $_POST['city'];
  $pswd = $_POST['pswd'];
  $conpswd = $_POST['conpswd'];
  $count = count($name);

  foreach($name as $n => $nn) {
    $sql = "INSERT INTO users (access,name,email,mbl,role,field1,field2,city,pswd,conpswd,sotp,votp,activate) values('user','$name[$n]','$email[$n]','$mbl[$n]','$role','$field1[$n]','$field2[$n]','$city[$n]','$pswd[$n]','$conpswd[$n]','yes','yes','yes')";

    if($conn->query($sql)){
      $count--;
    }
    else {
      $count++;
    }
  }

  if($count<1){
    echo "<script>
      document.getElementById('status').innerHTML = 'Sucessfully Registered !!!';
      document.getElementById('status').setAttribute('class','success');
      </script>";
  }
  else {
    $err = $conn->error;
      echo "<div class='error'>".$err." (~_~) (~_~) (~_~) Email/MobileNo. is already in use ***</div>";
  }
}


}
else {
  echo "Login is must <a href='../index.php'>Click Here to Login</a>";
}
ob_end_flush();
?>