
<?php
error_reporting();
require_once "connection.php";
session_start();


session_unset();
session_destroy();


header("location: insta_login.php");
exit;




   



?>
