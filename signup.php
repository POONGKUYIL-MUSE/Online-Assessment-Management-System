<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign-up Form</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="css/logo.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/styles2.css">
<link rel="icon" href="css/logo.ico">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.success{
    padding:20px;
    background-color:#4CAF50;
    color:white;
  }

  .container-fluid {
  padding-top:150px;
  padding-bottom:50px;
  padding-left:100px;
  padding-right: 100px;
}
  .error{
    padding:20px;
    background-color:#f44336;
    color:white;
  }
.topnav {
  overflow: hidden;
  background-color: #333;
  padding-left:100px;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav {
    width: 400px;
  }

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
  .mytable {
    
  }
}
</style>
</head>
<body>

<div class="topnav navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="myTopnav">
  <a><img src="css/logo.ico" width="100px"/></a>
  <a href="index.php" class="nav-link">Home</a>
  <a href="login.php" class="nav-link">Login</a>
  <a href="signup.php" class="nav-link">Sign-Up</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars fa-3x"></i>
  </a>
</div>

<div id="home" class="container-fluid">
  <div id="status"></div>

  <h2>Sign-up Form</h2>
  <form method="post" action="signupAction.php" enctype="multipart/form-data">

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" autofocus="true" required> 
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required="">
    </div>

    <div class="form-group">
      <label for="mbl">Mobile:</label>
      <input type="text" class="form-control" id="mbl" placeholder="Enter Mobile" name="mbl" required="">
    </div>

    <div class="form-group">
      <label for="role">Role:</label>
      <select name="role" class="form-control">
        <option value="none">--Select any one--</option>
        <option value="work">Work</option>
        <option value="student">Student</option>
      </select>
    </div>

    <div class="form-group mytable" id="fields">
      <table border=0 id="workfield" width="80%"><tr>
      <td><label for="field1">School/College/Company:</label>
      <input type="text" class="form-control" id="field1" placeholder="Enter Name of School/College/Company" name="field1" required="">
      </td><td>&nbsp;&nbsp;</td><td>
      <label for="field2">Class/Degree/Designation:</label>
      <input type="text" class="form-control" id="field2" placeholder="Enter Class/Degree/Designation" name="field2" required=""></td></tr></table>
    </div>

    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
    </div>

    <div class="form-group">
      <label for="pswd">Password: (*Mininum 8 letters)</label>
      <input type="password" name="pswd" class="form-control" id="pswd" placeholder="Enter Password" required="" pattern=".{8,}" title="Eight or more characters">
    </div>

    <div class="form-group">
      <label for="conpswd">Confirm Password:</label>
      <input type="password" name="conpswd" class="form-control" id="conpswd" placeholder="Enter Confirm Password" required="" pattern=".{8,}" title="Eight or more characters">
    </div>
    
    <input type="submit" class="btn btn-primary" name="sbtn" value="Submit">
  </form>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>


</body>
</html>
<?php
ob_end_flush();
?>