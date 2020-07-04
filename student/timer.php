<?php
include "../config.php";

$time = time();
$atime = date('D M Y at H:i:s', $time);
echo "Current date time is ".$atime;

/*



move_uploaded_file($_FILES['uplfile']['tmp_name'], $target_file);


INSERT INTO `evaluations` (`quiz`, `email`, `name`, `marks`, `averagePercent`, `coupon`, `evaldate`) VALUES ('kl', 'kl', 'kl', 'kl', '65', 'klj', CURRENT_TIMESTAMP)


*/


?>

<?php
include "../config.php";

date_default_timezone_set('Asia/Kolkata');
$time = time();
$atime = date('d-m-y @ H:i:s', $time);
echo "Current date time is ".$atime;

echo date_default_timezone_get();

$sql ="INSERT INTO delmenow(sn,timer) VALUES('123','$atime')";
if(mysqli_query($conn, $sql)){
    echo "inserted";
    
}
else {
    echo "not inserted";
}

?>

?>