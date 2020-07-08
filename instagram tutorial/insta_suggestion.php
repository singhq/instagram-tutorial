 
 
<?php


error_reporting();
include 'connection.php';
session_start();

$userid =$_SESSION['user_id'];


if(!isset($_SESSION['user_id'])){
    $userid =$_SESSION['user_id'];
   
header("location: insta_login.php");


}

 
   

   if(isset($_POST['action_massage'])){

     $userid =$_SESSION['user_id'];
   
$sql ="SELECT * FROM `user_follow` INNER JOIN `user` ON user_follow.user_id = user.user_id
    WHERE user_follow.follow_id ";
 

   $result = mysqli_query($conn , $sql);

   if(mysqli_num_rows($result)){
   while($row = mysqli_fetch_assoc($result)){
 
     //  $caption = $row['caption'];
         $user_image = $row['user_image'];
         $username = $row['username'];
      // $date =   $row['date'];
      
      // $posturl = $row['post_url'];
      // $_SESSION['post_id'] =$row['post_id'];
      // $postid = $row['post_id'];
 
 
echo "";


}

}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<div class="fddnb">
		<p>username</p>
	</div>
</body>
</html>