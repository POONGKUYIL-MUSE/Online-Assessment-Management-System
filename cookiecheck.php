<?php
$email = 'poongkuyilbtech@gmail.com';
$num = 123;
setcookie($email,$num);

echo $_COOKIE[$email];
?>