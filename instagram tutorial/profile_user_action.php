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



///user_profile for profile_user.php


if(isset($_POST['action_user_list_post'])){

  $userid =$_SESSION['user_id'];

 
 $sql = "SELECT * FROM `user_post` INNER JOIN `user` ON user_post.user_id = user.user_id
  WHERE user_post.user_id = '$userid' ORDER BY post_id DESC";
   $result = mysqli_query($conn , $sql);
   while($row =mysqli_fetch_assoc($result)){
 
       $caption = $row['caption'];
       $user_image = $row['user_image'];
       $username = $row['username'];
       $date =   $row['date'];
      
       $posturl = $row['post_url'];
      // $_SESSION['post_id'] =$row['post_id'];
       $postid = $row['post_id'];
 
 
 
 
 
    echo "<div class='manu-main-container'>
 
 
              
 
             <ul>
 
            <li class='manu-image-icon'><a><img src='".$user_image."'></a></li>
            <li class='manu-name-icon-icon'><a style=' margin-top: -10px;'>$username</a></li>
            <li class='manu-manu-icon'><a><i class='fas fa-ellipsis-v'></i></a></li>
         
           </ul>
         
 
       </div>
 
       <div class='manu-post-container'>
 
        <img src='".$posturl."' >
         
 
       </div>
 
 
 
 
       <div class='main-post-icon-container '>
 
             <ul >
 
 
              ".make_like($conn, $userid , $postid )."
            <li class='comment-manu-icon'><a href='comment.php' class='comment_button' data-user_image='$user_image' data-user_id='$userid' data-post_id='$postid' ><i class='far fa-comment'></i></a></li>
           <li class='comment-manu-icon'><a><i class='far fa-share-square'></i></a></li>
            <li class='save-manu-icon'><a><i class='far fa-bookmark'></i></a></li>
         
 
         </ul>
       </div>
 
       <div class='post-detail-container'>
 
           ".make_posts($conn , $postid )."
 
          <p><b>$username @: </b>   $caption</p>
 
          
              ".make_comment($conn ,$userid , $postid )."
 
            ".make_date($conn , $postid )."
          
 
       </div>";
 

 
 }
 }



 
 function make_like($conn, $userid , $postid){
  $sql = "SELECT * FROM `post_like` WHERE `user_id` = '$userid' AND `post_id` = '$postid' ";
   $result = mysqli_query($conn , $sql);
 
 if($row = mysqli_num_rows($result)>0){
 
 
 
 
 $output ='<li class="comment-manu-icon"><a class="like_button" data-action="unlike" data-user_id="'.$userid.'" data-post_id="'.$postid.'" ><i class="fas fa-heart" style="color:red;"></i></a></li>';
 
 }
 
 else{
 
 
 $output ='<li class="comment-manu-icon"><a class="like_button" data-action="like" data-user_id="'.$userid.'" data-post_id="'.$postid.'" ><i class="fas fa-heart"></i></a></li>';
 }
 return $output;
 
 
 
 
 
 }
 
 
 if($_POST['action_like']=='like'){
  $postid = $_POST['post_id'];
    $userid =$_SESSION['user_id'];
 //$action_follow = $_POST['action_follow'];
 
  $query = "INSERT INTO `post_like`(`user_id`, `post_id`) VALUES ('$userid' ,'$postid') ";
   $query_result = mysqli_query($conn , $query);
 if($query_result){
 echo "success";
 
 
 }
 else{
 
   echo "error";
 
 }
 
 
 }
 
 
 
 if($_POST['action_like']=='unlike'){
   $userid =$_SESSION['user_id'];
   $postid = $_POST['post_id'];
    
 //$follow = $_POST['action_follow'];
 
 
  $query = "DELETE FROM `post_like` WHERE `user_id` ='$userid' AND `post_id` ='$postid'";
   $query_result = mysqli_query($conn , $query);
 if($query_result){
 echo "success";
 
 
 }
 else{
 
   echo "error";
 
 }
 
 
 
 }
 
 
 
 function make_posts($conn , $postid ){
 
   $sql = "SELECT count(*) As sum FROM `post_like`WHERE `post_id`  = '$postid' ";
   $result = mysqli_query($conn , $sql);
   $row= mysqli_fetch_assoc($result);
 
   $row_result = $row['sum'];
   if($row_result==null){
      
      $output = '<p>0 like:</p>';
   }
   else{
     $output = '<p><b>'.$row_result.' like </b></p>';
     
 
 
   }
   return $output;
 
 
 
 
 
 }
 
 function make_date($conn , $postid ){
 
   $sql = "SELECT * FROM `user_post` WHERE `post_id`  = '$postid' ";
   $result = mysqli_query($conn , $sql);
   while($row= mysqli_fetch_assoc($result)){
 
   $date = $row['date'];
   
   
     $output = '<p style="color:#aaa;">'.make_time($date).'</p>';
     
 
  }
   
   return $output;
 
 
 
 
 
 }
 
 
 function make_comment($conn ,$userid , $postid ){
 
   $sql = "SELECT count(*) As sum FROM `post_comment`WHERE `post_id`  = '$postid' ";
   $result = mysqli_query($conn , $sql);
   $row= mysqli_fetch_assoc($result);
 
   $row_result = $row['sum'];
   if($row_result==null){
      
      $output = '<a><p class="all" style="color: #aaa;">View all 0 comment:</p></a>';
   }
   else{
     $output = '<a style="text-decoration:none:" href="comment.php" class="comment_button" data-user_id="'.$userid.'" data-post_id="'.$postid.'"><p class="all" style="color: #aaa;">View all '.$row_result.' comment:</p></a>';
 
 
   }
   return $output;
 
 
 
 
 
 }
 
 
 
 
 
 function make_time($time_ago){
 
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
   return "Just now:";
 
 
 }
 else if($minutes <=60){
    if($minutes ==1){
       return " an minute ago:";
 
    }
    else{
           return "$minutes  minute ago:";
 
    }
 
 }
 else if($hours <=24){
    if($hours ==1){
       return " an hours ago:";
 
    }
    else{
           return "$hours hours ago:";
 
    }
 
 }
 else if($days <=7){
    if($days ==1){
       return " Yesterday:";
 
    }
    else{
           return "$days days ago:";
 
    }
 
 }
 
 else if($weeks <=4.3){
    if($weeks ==1){
 
       return "  a weeks ago:";
 
    }
    else{
           return "$weeks weeks ago:";
 
    }
 
 }
 else if($months <=12){
    if($months ==1){
 
       return "  1 months ago:";
 
    }
    else{
           return "$months months ago:";
 
    }
 
 }
 
 }






  // profile user grid post for profile_user.php



if(isset($_POST['action_user_grid_post'])){
       $userid =$_SESSION['user_id'];
 
 $sql = "SELECT * FROM `user_post` WHERE `user_id` = '$userid' ORDER BY post_id DESC";
   $result = mysqli_query($conn , $sql);
   while($row =mysqli_fetch_assoc($result)){
         $posturl = $row['post_url'];

       if($posturl==NULL){

       $posturl= "<img src'pin.png'/>";
       }
       else{
        $posturl= "<img src='".$posturl."' >";
       }

    echo " <div class='grid-post-container'>
              
                 $posturl

        </div>";
}
}




?>