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
  <h2>Create Quiz</h2>
  <div id="status"></div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <div>
    <strong>Quiz Name : </strong><i style="color:red;">Example : Test1.js</i><input type="text" placeholder="filename.js" class="form-control" name="filename" autofocus="true" required>
    <br>
    <strong>Type of Question : </strong><i style="color:red;">Example : english or tamil</i>
      <input type='radio' name='qtype' value='english'>English
      <input type='radio' name='qtype' value='tamil'>Tamil
    <br><br>
    <strong>Quiz Status: (Example:- active or deactive)</strong>
      <input type="text" id="qstatus" placeholder="Enter Quiz Status" name="qstatus" required>
    <br>
    <strong>Enter No. of Questions to Display : </strong>
    <input type="text" placeholder="Number of Questions" class="form-control" name="qnos" required>
    <br>
    <strong>Enter Timing for Entire Quiz : </strong><i style="color:red;">Enter only minutes to complete the Quiz</i>
    <input type="text" placeholder="Timing is entered in minutes" class="form-control" name="timing" required>
    <br>
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
          <span class="input-group-text">Question No</span>
        </div>
        <input type="number" class="form-control col-1" id="no" placeholder="QNo" name="questionno[]">
        <div class="input-group-prepend">
          <span class="input-group-text">Set Question</span>
        </div>
        <input type="text" class="form-control" id="qnname" placeholder="Enter Question" name="question[]">
      </div>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Set Options</span>
        </div>
        <input type="text" class="form-control" id="option1" placeholder="Enter Option1" name="option1[]">
        <input type="text" class="form-control" id="option2" placeholder="Enter Option2" name="option2[]">
        <input type="text" class="form-control" id="option3" placeholder="Enter Option3" name="option3[]">
        <input type="text" class="form-control" id="option4" placeholder="Enter Option4" name="option4[]">
      </div>
      <div class="input-group md-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Set Correct Answer</span>
        </div>
        <input type="text" class="form-control" id="answer" placeholder="Enter Correct Answer" name="answer[]">
      </div>
    </td></tr>
    <!--<tr><td><input type="submit" name="sbtn" value="Append"></td></tr>-->
    </table>
    <br>
    <input type="submit" class="btn btn-primary" name="sbtn">
  </form>
</div>

<?php
$msg = '';

if(isset($_POST['sbtn'])){
  if(isset($_POST['filename']) and isset($_POST['questionno']) and isset($_POST['question']) and isset($_POST['option1']) and isset($_POST['option2']) and isset($_POST['option3']) and isset($_POST['option4']) and isset($_POST['answer']) and isset($_POST['qnos']) and isset($_POST['timing']) and isset($_POST['qstatus']) and isset($_POST['qtype']) ){

    $filedb = $_POST['filename'];
    $dqnos = $_POST['qnos'];
    $timing = $_POST['timing'];
    $qstatus = $_POST['qstatus'];
    $qtype = $_POST['qtype'];

    $filename = './quiz/'.$_POST['filename']; //'userDet.json';

    $qno = $_POST['questionno'];
    $qn = $_POST['question'];
    $opt1 = $_POST['option1'];
    $opt2 = $_POST['option2'];
    $opt3 = $_POST['option3'];
    $opt4 = $_POST['option4'];
    $ans = $_POST['answer'];
    $count = count($qn);

    if(!(file_exists($filename))){

      $file = fopen($filename,"w");
  
      $txt="var myJson = ";
      fwrite($file,$txt);
      
      $arrayData = array();

      foreach($qn as $n => $nn){

      $extra = array(
        'qno' => $qno[$n],
        'qn' => $qn[$n],  
        'option1' => $opt1[$n], 
        'option2' => $opt2[$n],
        'option3' => $opt3[$n],
        'option4' => $opt4[$n],
        'answer' => $ans[$n]
      );

      array_push($arrayData, $extra);
      }

      $finalData = json_encode($arrayData);
      
      if(file_put_contents($filename, $finalData,FILE_APPEND)){
        $qsql = "INSERT INTO quizzes(quizname,type,status,tqnos,qnos,timing,attmpt,crdate) VALUES ('$filedb', '$qtype', '$qstatus', '$count','$dqnos','$timing','0',NOW())";
        if(mysqli_query($conn,$qsql)){

          $evalins = "INSERT INTO evaluations("
          
/*
          $subject = "Try New Quiz : ".$filedb;
          $content = "Attend the new quiz and get more points. <br><a href='#'>Click this link to Attend the quiz</a>";
          $mailHeaders="From : poongkuyilmuse@gmail.com\r\n";
          $mailHeaders.="MIME-Version: 1.0\r\n";
          $mailHeaders.="Content-type: text/html\r\n";


          $sql = "SELECT email FROM users WHERE activate='yes'";

          if($res = mysqli_query($conn,$sql)){
            while($row = mysqli_fetch_assoc($res)){
              if(mail($row['email'], $subject, $content, $mailHeaders)){
                echo "<script>console.log('done');</script>";
              }
              else {
                echo "<script>console.log('not done');</script>";
              }
            }

            echo "<script>
                  document.getElementById('status').innerHTML = 'Quiz Created and Intimated Everyone!<strong> (^_^) (^_^) (^_^)</strong>';
                  document.getElementById('status').setAttribute('class','success');
                  </script>";
*/
          }

          
          fclose($file);
        }
        else{
          /*echo "<script>
          document.getElementById('status').innerHTML = 'Server Problem => ".$conn->error."<strong> (~_~) (~_~) (~_~) </strong>';
          document.getElementById('status').setAttribute('class','error');
          </script>";*/
          echo '<script> console.log("'.$conn->error.'"); </script>';
        }
        
      }     
    }
    else {
      echo "<script>
      document.getElementById('status').innerHTML = 'Quiz Name Already Exists. Give new Quiz name <strong> (~_~) (~_~) (~_~) </strong>';
      document.getElementById('status').setAttribute('class','error');
      </script>";
    }
  }
  else {
    echo "<script>
    document.getElementById('status').innerHTML = 'All fields must be filled. <strong> (~_~) (~_~) (~_~) </strong>';
    document.getElementById('status').setAttribute('class','success');
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