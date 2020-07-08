<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/ 
// es file ko database connect karane ke liye bnaya hai

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'instagram');  // login esme jo database file hai jo myadmin panel me banai hai

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection esko connection check karne ke liye 
if($conn == TRUE) // ager nhi bna to yah error show hoga 
{
	//echo " successfully";
}

else{
    dir('Error: Cannot connect');
}

?>