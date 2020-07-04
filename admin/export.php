<?php
ob_start();
session_start();
if(isset($_SESSION['email'])){
  include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="css/logo.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/styles2.css">

<link rel="icon" href="../css/logo.ico">

<style>
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
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
  <h2>Export as Excel</h2><br>
  <h4>Choose the Table : </h4>
  <form method='post' name='exportform' action=''>
      
    <select name='tables'> 
    <?php

      $sTable = "SHOW TABLES";
      if( $res = mysqli_query($conn, $sTable)) {
        while($row = mysqli_fetch_assoc($res)) {
          echo "<option value='".$row['Tables_in_examspot']."'>".$row['Tables_in_examspot']."</option>";
        }
      }

    ?>
    </select>
    <br><br>
    <h4>Provide the path where the file to be placed ( with filename.csv ) : </h4>
    
    <input type='text' name='folderpath' placeholder='example : C:\\Users\\PCNAME\\Desktop\\filename.csv'>
    
    <input type='submit' value='Export as CSV file' class='btn btn-success' name='sbtn'>
  </form> 
</div>

<?php

if(isset($_POST['sbtn'])){
  $path = $_POST['folderpath'];
  $tablename = $_POST['tables'];
  //echo "<script>alert('".$path."');</script>";
  
  $sql = "SELECT * FROM ".$tablename." INTO OUTFILE '".$path."' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'";

  if(mysqli_query($conn, $sql)) {
    header("location:export.php");
  }
  else {
    echo "<script>
    alert('".$conn->error."');
    window.location.href='export.php';
    </script>";
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