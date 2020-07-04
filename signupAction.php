<?php
ob_start();
session_start();
include "config.php";

$name = $email = $mobile = $role = $field1 = $field2 = $city = $pswd = $conpswd = "";

if(isset($_POST['sbtn']) ) {

/*
Checking for errors and generating OTP */


  //error - validation
  $error = "";
  if($_POST['pswd'] != $_POST['conpswd']){
    $error = $error."Passwords doesnot match.";
  }

  if($error == ''){

    //storing all the data in php 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mbl'];
    $role = $_POST['role'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $city = $_POST['city'];
    $pswd = $_POST['pswd'];
    $conpswd = $_POST['conpswd'];

    $sqlcheck = "SELECT * FROM users WHERE email = '$email' OR mbl='$mobile' OR (email='$email' AND mbl='$mobile')";
    $res = mysqli_query($conn,$sqlcheck);
    if(mysqli_num_rows($res)>0){
      echo "<script>alert('Email or Mobile Number already in use. If already registered Please Login.');</script>";
      echo "<script>window.location.href='index.php';</script>";
    }else {
      
      /* OTP GENERATION
      require('textlocal.class.php');
      require('credential.php');

      $textlocal = new Textlocal(false,false,API_KEY);

      $numbers = array($mobile);
      $sender = 'TXTLCL';
      $otp = mt_rand(10000,99999);
      $message = "Hi ".$name."!! Your OTP is ".$otp;

      try{
        $result = $textlocal->sendSms($numbers,$message,$sender);
        //setcookie($email,$otp);
        $mblotp = $mobile."otp";
        $_SESSION[$mblotp] = $otp;
      
        
        $sql = "INSERT INTO users (access,name,email,mbl,role,field1,field2,city,pswd,conpswd,sotp,votp,activate) values('user','$name','$email','$mobile','$role','$field1','$field2','$city','$pswd','$conpswd','yes','no','no')";

        if($conn->query($sql)){
          //echo "<script>
            //document.getElementById('status').innerHTML = 'OTP sent to the provided number';
            //document.getElementById('status').setAttribute('class','success');
            //</script>";
            
            $_SESSION['mymbl'] = $mobile;
            header('location:verifyMobile.php');           
        }
        else {
          $err = $conn->error;
          echo "<div class='error'>".$err." (~_~) (~_~) (~_~) Email/MobileNo. is already in use ***</div>";
        }

        //echo "OTP sent successfully";
      } catch (Exception $e){
        die('Error : '.$e->getMessage());
      }*/

    
      $sql = "INSERT INTO users(access, name, email, mbl, role, field1, field2, city, pswd, conpswd, sotp, votp, activate) VALUES('user', '$name', '$email', '$mobile', '$role', '$field1', '$field2', '$city', '$pswd', '$conpswd', 'yes', 'yes', 'yes')";
      if($conn->query($sql)){
          session_start();
          $_SESSION['email'] = $email;
          $_SESSION['name'] = $name;
          //header("location:login.php");
          header("location:student/tests2.php");
      } else {
        $err = $conn->error;
        echo "<script>
        window.alert('Problem in insertion. Please Try Again. If you are still facing the problem. Contact 8428992535.".$err."');
        window.location.href='signup.php';
        </script>";

      }

    }

  }
  else{
    echo "<script>
      document.getElementById('status').innerHTML = '".$error."';
      document.getElementById('status').setAttribute('class','error');
      </script>";
  }
}

ob_end_flush();
    
?>