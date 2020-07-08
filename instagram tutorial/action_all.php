<?php



error_reporting(0);
include 'connection.php';
session_start();
$userid =$_SESSION['user_id'];

if(!isset($_SESSION['user_id'])){


header("location: insta_login.php");

}

//user of follow of post 

if(isset($_POST['action'])){

 $userid =$_SESSION['user_id'];


$sql = "SELECT * FROM `user_post` INNER JOIN `user` ON user_post.user_id = user.user_id
LEFT JOIN `user_follow` ON user_post.user_id = user_follow.follow_id
 WHERE user_post.user_id = '$userid' OR user_follow.user_id ='$userid'
 GROUP BY user_post.post_id ORDER BY post_id DESC";
  $result = mysqli_query($conn , $sql);
  while($row =mysqli_fetch_assoc($result)){

      $_SESSION['post_id'] =$row['post_id'];
      $postid = $row['post_id'];




}
}




// post caption code for comment.php

if(isset($_POST['action_caption'])){


 $postid = $_POST['post_id'];

        // two table join user and user_post

 $sql ="SELECT * FROM `user_post` INNER JOIN `user` ON user_post.user_id = user.user_id
    WHERE user_post.post_id = '$postid' ";
  $result = mysqli_query($conn ,$sql);
   while($row =mysqli_fetch_assoc($result)){ 

  


      $post_caption = $row['caption'];
      $user_imags = $row['user_image'];
      $username = $row['username'];
      $post_date = $row['date'];

 //comment-comment-inner-container image
     
echo "<div class='comment-inner-container image' style='margin-left:10px;' >

                 <img src='$user_imags'>
   
            </div>

           <div class='comment-inner-container name'>

            <p style='font-size: 17px;margin-top:5px;'><b>$username</b> :-$post_caption</p>
              ".make_caption_date($conn , $postid )."
   
          </div> ";
   






}

}

function make_caption_date($conn , $postid ){

  $sql = "SELECT * FROM `user_post` WHERE `post_id`  = '$postid' ";
  $result = mysqli_query($conn , $sql);
  while($row= mysqli_fetch_assoc($result)){

  $date = $row['date'];
 
  
    $output = '<p style="font-size: 17px; color:#aaa; margin-top:3px;  ">'.make_caption_time($date).'</p>';
    

 }
  
 return $output;





}



function make_caption_time($time_ago){

  $time_ago= strtotime($time_ago);
  $our_time = time();
  $time_elapsed =$our_time - $time_ago;
  $seconds =$time_elapsed;

  $minutes =round($time_elapsed/60);
  $hours =round($time_elapsed/3600);
  $days =round($time_elapsed/86400);
  $weeks =round($time_elapsed/604800);
  $months =round($time_elapsed/2600640);
  $years =round($time_elapsed/31207680);
if($seconds <=60){
  return "1 s:";


}
else if($minutes <=60){
   if($minutes ==1){
      return " 1 M:";

   }
   else{
          return "$minutes M:";

   }

}
else if($hours <=24){
   if($hours ==1){
      return " 1 h:";

   }
   else{
          return "$hours h:";

   }

}
else if($days <=7){
   if($days ==1){
      return " 1 d:";

   }
   else{
          return "$days d:";

   }

}

else if($weeks <=4.3){
   if($weeks ==1){

      return "  1 W:";

   }
   else{
          return "$weeks W:";

   }

}
else if($months <=12){
   if($months ==1){

      return "  1 M:";

   }
   else{
          return "$months M:";

   }

}

}








//for comment ke liye for comment.php 

if($_POST['action']=='comment'){
 $postid = $_POST['post_id'];
 $userid =$_SESSION['user_id'];
 $postcomment =$_POST['post_comment'];



 $query = "INSERT INTO `post_comment`(`user_id`, `post_id`, `post_comment`) VALUES ('$userid' ,'$postid' ,'$postcomment')";
  $query_result = mysqli_query($conn , $query);
if($query_result){
echo "success";

}
else {
    
   echo "Error: " . $query . "
  ". mysqli_error($conn);
   }




}



if(isset($_POST['action_comment'])){

 $userid =$_SESSION['user_id'];
 $postid = $_POST['post_id'];


$sql ="SELECT * FROM `post_comment` INNER JOIN `user` ON post_comment.user_id = user.user_id
    WHERE post_comment.post_id = '$postid' ORDER BY 'id'  ASC";
  $result = mysqli_query($conn ,$sql);
   while($row =mysqli_fetch_assoc($result)){

      $postcomment = $row['post_comment'];
      $user_imags = $row['user_image'];
      $username = $row['username'];
     // $post_date =   $row['date'];
  

 echo "<div class='comment-comment-inner-container image' >
            
        <img src='$user_imags' style='margin-bottom:-20px; line-height:4px;'>
   
    
          </div>
      <div class='comment-comment-inner-container mass '>

            <p style='font-size: 14px; text-align:left; margin-left:60px;'><b>$username</b> :-   $postcomment</p>
          <div class='comment-time-container' style='float: left; width: 42%;'> 
            ".make_comment_date($conn , $postid )."
         
         </div>
          <div class='comment-time-container-red'> 
            <p style='font-size: 10px; color:#aaa;' >0Like:</p>
         
          


         </div>
       
        
         
    
          </div>
      
       <div class='comment-comment-inner-container like' >

        <i class='far fa-heart' style='margin-top:-22px;'></i>
   
     </div>";


}
}


function make_comment_date($conn , $postid ){

  $sql = "SELECT * FROM `post_comment` WHERE `post_id`  = '$postid' ";
  $result = mysqli_query($conn , $sql);
  while($row= mysqli_fetch_assoc($result)){

  $date = $row['date'];
  
  
    $output = '<p style="font-size: 10px; color:#aaa; text-align:left; margin-left:40%; ">'.make_comment_time($date).'</p>';
    

 }
  
  return $output;





}



function make_comment_time($time_ago){

  $time_ago= strtotime($time_ago);
  $our_time = time();
  $time_elapsed =$our_time - $time_ago;
  $seconds =$time_elapsed;

  $minutes =round($time_elapsed/60);
  $hours =round($time_elapsed/3600);
  $days =round($time_elapsed/86400);
  $weeks =round($time_elapsed/604800);
  $months =round($time_elapsed/2600640);
  $years =round($time_elapsed/31207680);
if($seconds <=60){
  return "just now:";


}
else if($minutes <=60){
   if($minutes ==1){
      return " 1 M:";

   }
   else{
          return "$minutes M:";

   }

}
else if($hours <=24){
   if($hours ==1){
      return " 1 h:";

   }
   else{
          return "$hours h:";

   }

}
else if($days <=7){
   if($days ==1){
      return " 1 d:";

   }
   else{
          return "$days d:";

   }

}

else if($weeks <=4.3){
   if($weeks ==1){

      return "  1 W:";

   }
   else{
          return "$weeks W:";

   }

}
else if($months <=12){
   if($months ==1){

      return "  1 M:";

   }
   else{
          return "$months M:";

   }

}

}








  

?>
