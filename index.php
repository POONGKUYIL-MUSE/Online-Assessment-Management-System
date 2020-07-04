<!DOCTYPE html>
<html>
<head>
  <title>TNIT Achievers</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="css/logo.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="css/logo.ico">
<style>
body {
  margin: 0;
  /*padding:50px 100px;*/
  font-family: Arial, Helvetica, sans-serif;
}

.col-sm-3 {
  margin-bottom: 16px;
  padding: 3px 8px;
  border: 2px dashed red;
  border-radius: 10px;
}

.swipper {
  display : none;
}
.cimg {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 1px solid grey;
}

.courseheader {
  font-weight: bold;
  font-size: 20px;
  color: blue;
}

p {
  color: gray;
  font-style: oblique;
  font-size: 18px;
  font-weight: normal;
  font-family: Arial, Helvetica, sans-serif;
  word-break: keep-all;
  text-align: justify;
  line-height: 2;
  word-spacing: 6px;
  text-indent: 50px;
}

.topnav {
  overflow: hidden;
  background-color: #333;
  padding-left:100px;
}

.topnav .icon {
  display: none;
}

.container-fluid {
  padding-top:150px;
  padding-bottom:50px;
  padding-left:100px;
  padding-right: 100px;
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
    width: 430px;
  }
  .container-fluid p{
    font-size: 14px;
    word-spacing: 3px;
    word-break: keep-all;
    text-align: justify;
  }
  
  .swipper {
    display: inline-block;
  }
  .container-fluid {
    margin-top: 150px;
    margin-bottom: 50px;
    margin-left: 50px;
    margin-right: 30px;
    padding:0px;
    width: 350px;
  }
  
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
  }

  th, td {
    text-align: center;
    padding: 3px;
  }

  .courseheader td {
    text-align: left;
  }
  


}
</style>
</head>
<body>

<div class="topnav navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="myTopnav">
  <a><img src="css/logo.ico" width="100px"/></a>
  <a href="#home" class="nav-link">Home</a>
  <a href="#courses" class="nav-link">Courses</a>
  <a href="#branches" class="nav-link">Branches</a>
  <a href="login.php" class="nav-link">Login</a>
  <a href="signup.php" class="nav-link">Sign-Up</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars fa-3x"></i>
  </a>
</div>

<div id="home" class="container-fluid">
  <h2>TNIT - TAMILNADU INSTITUTE OF TECHNOLOGY</h2>
  <p>TNIT is a Tamilnadu's leading training NETWORK with associated training centers across Tamilnadu. TNIT Computer and Vocational Training Division is part of SIT Group of institution operated at Chennai, Madurai, Kanchipuram, Thiruvallur, Tirunelveli, Tenkasi, Kadayam in Tamilnadu. TNIT offers training URSES in IT software, Computer Hardware & Networking, Competitive Exams Coaching, Softskill & Interview Skills Training, Tailoring, Fashion Designing and Bag Making Courses etc. Management with strong base of placement support, real-time trainers with working experience in MNC companies, tailor-made training curriculum to meet the career objective of the students and working professionals.</p>

  <p>TNIT in chennai has strong network of experienced real time MNC working professionals with sound domain knowledge on multiple TRAINING COURSES to provide job oriented and minimum COURSE fee using a state-of-art training facilities available with our network of training institutes in Chennai and Madurai. Our Training centers located in all the major areas of Chennai and Madurai which are managed by industry experienced professionals.</p>
</div>

<div id="courses" class="container-fluid" style="overflow-x: auto;">
  <h2>Computer Courses</h2>
  <h5 class="swipper">Swipe Left to Know more on courses.</h5>
  <table border='0' width="100%">
    <tr class="courseheader"><td colspan="7">Office Automation</td></tr>
    <tr align="center">
      <td width="14.28%"><figure><img src="images/msoffice.png" class="cimg"/>
        <figcaption>MSOFFICE</figcaption></figure></td>
      <td width="14.28%"><figure><img src="images/tally.jpg" class="cimg"/>
        <figcaption>TALLY</figcaption></figure></td>
      <td width="14.28%"></td>
      <td width="14.28%"></td>
      <td width="14.28%"></td>
      <td width="14.28%"></td>
      <td width="14.28%"></td></tr>

    <tr class="courseheader"><td colspan="7">Computer Maintenance Course</td></tr>
    <tr align="center">
      <td><figure><img src="images/hardware.jpg" class="cimg"/>
        <figcaption>HARDWARE</figcaption></figure></td>
      <td><figure><img src="images/networking.jpg" class="cimg"/>
        <figcaption>NETWORKING</figcaption></figure></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td></tr>
    
    <tr class="courseheader"><td colspan="7">Graphics & Animation</td></tr>
    <tr align="center">
      <td><figure><img src="images/photoshop.jpg" class="cimg"/>
        <figcaption>PHOTOSHOP</figcaption></figure></td>
      <td><figure><img src="images/coreldraw.jpg" class="cimg"/>
        <figcaption>COREL DRAW</figcaption></figure></td>
      <td><figure><img src="images/2d3d.jpg" class="cimg"/>
        <figcaption>2D ANIMATION</figcaption></figure></td>
      <td><figure><img src="images/2d3d.jpg" class="cimg"/>
        <figcaption>3D ANIMATION</figcaption></figure></td>
      <td></td>
      <td></td>
      <td></td></tr>
    
    <tr class="courseheader"><td colspan="7">Languages</td></tr>
    <tr align="center">
      <td><figure><img src="images/c.png" class="cimg"/>
        <figcaption>PROGRAMMING IN C</figcaption></figure></td>
      <td><figure><img src="images/c++.png" class="cimg"/>
        <figcaption>PROGRAMMING IN C++</figcaption></figure></td>
      <td><figure><img src="images/java2.png" class="cimg"/>
        <figcaption>JAVA</figcaption></figure></td>
      <td><figure><img src="images/java.jpg" class="cimg"/>
        <figcaption>J2EE</figcaption></figure></td>
      <td><figure><img src="images/dotnet.jpg" class="cimg"/>
        <figcaption>DOT(.) NET</figcaption></figure></td>
      <td><figure><img src="images/python.jpg" class="cimg"/>
        <figcaption>PYTHON</figcaption></figure></td>
      <td></td></tr>
    
    <tr class="courseheader"><td colspan="7">Databases</td></tr>
    <tr align="center">
      <td><figure><img src="images/sql.jpg" class="cimg"/>
        <figcaption>SQL</figcaption></figure></td>
      <td><figure><img src="images/plsql.png" class="cimg"/>
        <figcaption>PL/SQL</figcaption></figure></td>
      <td><figure><img src="images/mysql2.png" class="cimg"/>
        <figcaption>MYSQL</figcaption></figure></td>
      <td><figure><img src="images/oracle.png" class="cimg"/>
        <figcaption>ORACLE</figcaption></figure></td>
      <td></td>
      <td></td>
      <td></td></tr>

    <tr class="courseheader"><td colspan="7">Web Designing</td></tr>
    <tr align="center">
      <td><figure><img src="images/html.png" class="cimg"/>
        <figcaption>HTML 5</figcaption></figure></td>
      <td><figure><img src="images/css.png" class="cimg"/>
        <figcaption>CSS</figcaption></figure></td>
      <td><figure><img src="images/js.png" class="cimg"/>
        <figcaption>JAVASCRIPT</figcaption></figure></td>
      <td><figure><img src="images/php.jpg" class="cimg"/>
        <figcaption>PHP</figcaption></figure></td>
      <td><figure><img src="images/wordpress.png" class="cimg"/>
        <figcaption>WORDPRESS</figcaption></figure></td>
      <td><figure><img src="images/node.jpg" class="cimg"/>
        <figcaption>NODE</figcaption></figure></td>
      <td><figure><img src="images/angular.png" class="cimg"/>
        <figcaption>ANGULAR</figcaption></figure></td></tr>  
    
    <tr class="courseheader"><td colspan="7">Engineering Drawings</td></tr>
    <tr align="center">
      <td><figure><img src="images/autocad.png" class="cimg"/>
        <figcaption>AUTOCAD</figcaption></figure></td>
      <td><figure><img src="images/proe.jpg" class="cimg"/>
        <figcaption>PRO E</figcaption></figure></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td></tr>
    
    <tr class="courseheader"><td colspan="7">Vocational Courses</td></tr>
    <tr align="center">
      <td><figure><img src="images/tailor3.png" class="cimg"/>
        <figcaption>TAILORING</figcaption></figure></td>
      <td><figure><img src="images/fashion.png" class="cimg"/>
        <figcaption>FASHION TECHNOLOGY</figcaption></figure></td>
      <td><figure><img src="images/handbags.png" class="cimg"/>
        <figcaption>HAND PURSE & BAG MAKING</figcaption></figure></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td></tr>

    
    <tr class="courseheader"><td colspan="7">Softskill Courses</td></tr>
    <tr align="center">
      <td><figure><img src="images/sponkenenglish.png" class="cimg"/>
        <figcaption>SPOKEN ENGLISH</figcaption></figure></td>
      <td><figure><img src="images/comm.png" class="cimg"/>
        <figcaption>COMMUNICATION SKILLS</figcaption></figure></td>
      <td><figure><img src="images/interview.jpg" class="cimg"/>
        <figcaption>INTERVIEW SKILLS</figcaption></figure></td>
      <td><figure><img src="images/personality.png" class="cimg"/>
        <figcaption>PERSONALITY DEVELOPMENT</figcaption></figure></td>
      <td><figure><img src="images/telephonic.png" class="cimg"/>
        <figcaption>TELEPHONIC MANNERS & CONVERSATION</figcaption></figure></td>
      <td><figure><img src="images/apti.jpg" class="cimg"/>
        <figcaption>APTITUDE & REASONING</figcaption></figure></td>
      <td><figure><img src="images/resumse.jpg" class="cimg"/>
        <figcaption>RESUME BUILDING</figcaption></figure></td></tr>

    <tr class="courseheader"><td colspan="7">Competitive Exam Coaching</td></tr>
    <tr align="center">
      <td><figure><img src="images/tnpsc.png" class="cimg"/>
        <figcaption>TNPSC</figcaption></figure></td>
      <td><figure><img src="images/upsc.jpg" class="cimg"/>
        <figcaption>UPSC</figcaption></figure></td>
      <td><figure><img src="images/rrb.png" class="cimg"/>
        <figcaption>RRB</figcaption></figure></td>
      <td><figure><img src="images/bank.png" class="cimg"/>
        <figcaption>BANKING</figcaption></figure></td>
      <td><figure><img src="images/ssc.jpg" class="cimg"/>
        <figcaption>SSC</figcaption></figure></td>
      <td><figure><img src="images/police.png" class="cimg"/>
        <figcaption>POLICE</figcaption></figure></td>
      <td><figure><img src="images/postal.png" class="cimg"/>
        <figcaption>POSTAL</figcaption></figure></td></tr>

  </table>

</div>

<div id="branches" class="container-fluid">
  <h2>Our Branches</h2>
  
  <div class="row">
    <div class="col-sm-3">
      <b>1. TNIT – TAMILNADU INSTITUTE OF TECHNOLOGY</b><br>
      No 336 T.H. Road,
      Ist Floor,
      Old Washermanpet,
      Opp to Maharani Theatre,
      Chennai – 600 021.
    </div>
    <div class="col-sm-3">
      <b>2. TNIT – TAMILNADU INSTITUTE OF TECHNOLOGY</b><br>
      No 117 M.H. Road,
      Near Lakshmi Amman Koil Bus Stop,
      Perambur,
      Chennai – 600 021.
    </div>
    <div class="col-sm-3">
      <b>3. TNIT – TAMILNADU INSTITUTE OF TECHNOLOGY</b><br>
      No 45 M.H. Road,
      Near SBI & Market,
      Perambur,
      Chennai – 600 011.
    </div>
  </div>

  <div class="row">
    <div class="col-sm-3">
      <b>4. TNIT – TAMILNADU INSTITUTE OF TECHNOLOGY</b><br>
      No 3/4 Gandhi Road, Ist Floor,
      Near Mega Mart,
      Alwarthirunagar,
      Chennai – 600 087.
    </div>
    <div class="col-sm-3">
      <b>5. TNIT – TAMILNADU INSTITUTE OF TECHNOLOGY</b><br>
      No 776/508 T.H. Road,
      TRS Complex,
      Opp. to Abinayam Textile,
      Thiruvottiyur,
      Chennai – 600 019.
    </div>
    <div class="col-sm-3">
      <b>6. TNIT – TAMILNADU INSTITUTE OF TECHNOLOGY</b><br>
      No 24 TPK Road,
      Vasanthanagar,
      Opp. to Jawahar Wood Shop,
      Madurai – 625 003.
    </div>
  </div>

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
