<!DOCTYPE html>
<html>
<head>
    <title></title>
<link rel="icon" href="../css/logo.ico">

</head>
<body>

<?php
include "../config.php";

require 'vendor/autoload.php';


?>


<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if(isset($_POST['sbtn']) and isset($_POST['qname']) and isset($_POST['qnos']) and isset($_POST['timing']) and isset($_POST['section']) and isset($_POST['qtype'])){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["uplfile"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $qname = './quiz/'.$_POST['qname'];
    $filedb = $_POST['qname'];
    $qtype = $_POST['qtype'];
    $section = $_POST['section'];
    $qno = $_POST['qnos'];
    $timing = $_POST['timing'];

    if($FileType != "xlsx") {
      echo "Sorry, only xlsx files are allowed. ".$FileType." is your uploaded file type ... ".$_FILES['uplfile']['tmp_name']." is the name of the file";
    }
    else {

        if(!(file_exists($qname))){

            move_uploaded_file($_FILES['uplfile']['tmp_name'], $target_file);

            $file = fopen($qname,"w");
            $txt = "var myJson = ";
            fwrite($file,$txt);

            $QFile =  $_FILES['uplfile']["name"];
            $exfile = "./".$QFile;

            $spreadsheet = new Spreadsheet();
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::load($target_file);

            $dataArr = $reader->getActiveSheet()
            ->rangeToArray(
                $section,
                NULL,
                TRUE,
                TRUE,
                TRUE
            );

            $arr = array();

            foreach($dataArr as $row=>$r){
                $i=0;
                $ext = array();
                foreach ($r as $col=>$c){
                    switch($i) {
                        case 0 : 
                            $ext['qno']=$c;
                            $i+=1;
                            break;
                        case 1:
                            $ext['qn']=$c;
                            $i+=1;
                            break;
                        case 2 :
                            $ext['option1']=$c;
                            $i+=1;
                            break;
                        case 3 : 
                            $ext['option2']=$c;
                            $i+=1;
                            break;
                        case 4:
                            $ext['option3']=$c;
                            $i+=1;
                            break;
                        case 5 :
                            $ext['option4']=$c;
                            $i+=1;
                            break;
                        case 6 :
                            $ext['answer']=$c;
                            $i+=1;
                            break;
                    }

                    if($i==7){
                        array_push($arr, $ext);
                    }

                }
                echo "<br>";

            }

            $final = json_encode($arr);
            //echo $final;


            if(file_put_contents($qname,$final,FILE_APPEND)){
                echo "quiz created";
                $count = count($dataArr);


                //echo $qname;
                $qsql = "INSERT INTO quizzes(quizname,type,status, tqnos,qnos,timing,attmpt,crdate) VALUES ('$filedb', '$qtype', 'active', '$count', '$qno', '$timing', '0', NOW())";
                if(mysqli_query($conn,$qsql)){
                  //echo "<script>window.location.href='setupAction.php?cquiz=".$filedb."';</script>";
                    echo "<script>window.location.href='uplquiz.php';</script>";
                  fclose($file);
                }
                else{
                  echo "<script>
                  alert('".$conn->error."');
                  </script>";
                }
                fclose($file);
            }
        }
        else {
            echo "<script>
            alert('Quiz Name Already Exists. Give new Quiz name <strong> (~_~) (~_~) (~_~) </strong>');
            window.location.href='uplquiz.php';
            </script>";

        }
    }
}

?>


</body>
</html>