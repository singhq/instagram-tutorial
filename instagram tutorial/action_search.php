<?php

error_reporting(0);
include 'connection.php';
session_start();
$userid =$_SESSION['user_id'];

if(!isset($_SESSION['user_id'])){


header("location: insta_login.php");

}

// search bar of code in php 

if(isset($_POST['search'])){

 $userid =$_SESSION['user_id'];
 $search =$_POST['search'];

$sql = "SELECT * FROM `user` WHERE `fullname`  LIKE '%{$search}%' AND `user_id` != '$userid' "; 

  $result = mysqli_query($conn , $sql) or die("error connection: " . mysqli_error());
  if(mysqli_num_rows($result)  > 0){

  while($row =mysqli_fetch_assoc($result))  
{

 
     $followid = $row['user_id'];

     $fullname = $row['fullname'];
     
    // $userid = $row['user_id'];
     $user_image = $row['user_image'];





     
echo "<div class='search-main-container'>
           <div class='search-image-container'>
             <img src='$user_image'>
       
         </div>
       
     </div>
     <div class='search-main-container'>
        <p style='margin-top:7px; '>$fullname</p>
       
     </div>
     <div class='search-main-container'>
          <div class='search-like-container'>
             
      ".make_search_follow($conn , $userid ,$followid , $search)."
        
         </div>
       
     </div>";


}

}

}

function make_search_follow($conn, $userid , $followid , $search) {
 $sql = "SELECT * FROM `user_follow` WHERE `user_id` = '$userid' AND `follow_id` = '$followid' ";
  $result = mysqli_query($conn , $sql);

if($row = mysqli_num_rows($result)>0){




$output ='<button style="background-color:white; color:black; border:1px solid #ccc; " class="follow_button" data-action="following" data-search="'.$search.'"  data-user_id="'.$userid.'" data-user_follow="'.$followid.'">following</button>';

}

else{


$output ='<button class="follow_button" data-action="follow" data-search="'.$search.'" data-user_id="'.$userid.'" data-user_follow="'.$followid.'">follow</button>';
}
return $output;





}


if($_POST['action_follow']==='follow'){
 $followid = $_POST['follow_id'];
   $userid =$_SESSION['user_id'];
//$action_follow = $_POST['action_follow'];

 $query = "INSERT INTO `user_follow`( `user_id`, `follow_id`) VALUES ('$userid' ,'$followid') ";
  $query_result = mysqli_query($conn , $query);
if($query_result){
echo "success";


}
else{

  echo "error";

}


}



if($_POST['action_follow']==='following'){
  $userid =$_SESSION['user_id'];
  $followid = $_POST['follow_id'];
   
//$follow = $_POST['action_follow'];


 $query = "DELETE FROM `user_follow` WHERE `user_id` ='$userid' AND `follow_id` ='$followid'";
  $query_result = mysqli_query($conn , $query);
if($query_result){
echo "success";


}
else{

  echo "error";

}



}


// user follow and following code in php

/*
error_reporting();
include 'connection.php';
session_start();

$userid =$_SESSION['user_id'];

if(!isset($_SESSION['user_id'])){


header("location: insta_login.php");

}


*/

if(isset($_POST['action_user'])){

 $userid =$_SESSION['user_id'];

$sql = "SELECT * FROM `user` WHERE  user_id != '$userid' ";
  $result = mysqli_query($conn , $sql);
  while($row =mysqli_fetch_assoc($result)){

     $followid = $row['user_id'];
     $fullname = $row['fullname'];
     
    // $userid = $row['user_id'];
     $user_image = $row['user_image'];





     
echo "
    <div class='follow-container'>
           <div class='follow-image-container'>
             
   
           <img src='".$user_image."' height='50' width='50'/>

           </div>
       
     </div>

    
  
  <div class='follow-container'>
        <p><b>$fullname</<p>
      
     </div>
 

     <div class='follow-container'>
          <div class='follow-like-container'>
             

            
           ".make_follow($conn , $userid ,$followid)."
             

         
         </div>

       
     </div>";


}
}


function make_follow($conn, $userid , $followid){
 $sql = "SELECT * FROM `user_follow` WHERE `user_id` = '$userid' AND `follow_id` = '$followid' ";
  $result = mysqli_query($conn , $sql);

if($row = mysqli_num_rows($result)>0){




$output ='<button style="background-color:white; color:black; border:1px solid #ccc; margin-bottom: 10px;" class="follow_button" data-action="following" data-user_id="'.$userid.'" data-user_follow="'.$followid.'">following</button>';

}

else{


$output ='<button  class="follow_button" data-action="follow" data-user_id="'.$userid.'" data-user_follow="'.$followid.'">follow</button>';
}
return $output;





}


if($_POST['action_follow']==='follow'){
 $followid = $_POST['follow_id'];
   $userid =$_SESSION['user_id'];
//$action_follow = $_POST['action_follow'];

 $query = "INSERT INTO `user_follow`( `user_id`, `follow_id`) VALUES ('$userid' ,'$followid') ";
  $query_result = mysqli_query($conn , $query);
if($query_result){
echo "success";


}
else{

  echo "error";

}


}



if($_POST['action_follow']==='following'){
  $userid =$_SESSION['user_id'];
  $followid = $_POST['follow_id'];
   
//$follow = $_POST['action_follow'];


 $query = "DELETE FROM `user_follow` WHERE `user_id` ='$userid' AND `follow_id` ='$followid'";
  $query_result = mysqli_query($conn , $query);
if($query_result){
echo "success";


}
else{

  echo "error";

}



}




?>
