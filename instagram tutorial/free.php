<div class='main-post-icon-container'>
 
             <ul>
 
 
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
 



























<?php

error_reporting();
include 'connection.php';
session_start();

$userid =$_SESSION['user_id'];

if(!isset($_SESSION['user_id'])){
    $userid =$_SESSION['user_id'];

//header("location: insta_login.php");
echo "success";

}

 else{
  // echo "success";
 }   




if(isset($_POST['action'])){

  $userid =$_SESSION['user_id'];
 
 $sql = "SELECT * FROM `user_post` INNER JOIN `user` ON user_post.user_id = user.user_id
 LEFT JOIN `user_follow` ON user_post.user_id = user_follow.follow_id
  WHERE user_post.user_id = '$userid' OR user_follow.user_id ='$userid'
  GROUP BY user_post.post_id ORDER BY post_id DESC";
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
            <li class='manu-name-icon-icon'><a>$username</a></li>
            <li class='manu-manu-icon'><a><i class='fas fa-ellipsis-v'></i></a></li>
         
           </ul>
         
 
       </div>
 
       <div class='manu-post-container'>
 
        <img src='".$posturl."' height='50' width='50'/>
         
 
       </div>
 
 
 
           <div class='main-post-icon-container'>
 
             <ul>
 
 
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
 
 
 
 

?>




<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  

  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="stylesheet" type="text/css" href="stylee.css">
  <!-- jQuery library -->


<!-- Latest compiled bootstap cdn 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    -->

<style>

 

 .conatainer .active{
        width: 100%;
        height: 100%;
        position: fixed;
        overflow: hidden;
         

      }
      
    
     

     .home-main-container{
      width: 100%;
      height: auto;
      max-width: 500px;
      margin: auto;

      overflow: hidden;
     
       padding-top: 30px;
       margin-top: 5%;
        
      
     }
     .manu-main-container{


        width: 100%;
        float: left;
        line-height: 20px;
        
     }
     .manu-main-container ul{
      
        list-style-type: none;
        margin: 0;
        padding: 0;
        height: 55px;
        background-color: white; 
        overflow: hidden;
        font-size: 13px;
        
        
      }
           .manu-main-container .manu-image-icon{
           float: left;
            width: 24%;
            margin-top: 7px;

          }
          .manu-main-container .manu-name-icon{
            
            float: left;
            width: 10%;
            margin-left: 10%
            margin-top:3px;
           }
          .manu-main-container .manu-manu-icon{
            
            float: left;
            margin-left: 57%

             
           }
           .manu-image-icon img{
            width: 42px;
            height: 42px;
            border-radius: 50px;
            overflow: hidden;

           }
            .manu-post-container {
            width: 100%;
            height: 70%;
          
            
           }

           .manu-post-container img{
            width: 100%;
            height: 90%;
            
            background:content;

           }
           .comment-manu-icon{
            width: 10%;
           
            list-style-type: none;
          
            margin-left: 14px;
            margin-top: 25px;
          

           }    
           .save-manu-icon{
            margin-left: 52%;
            margin-top: 25px;


           }       
         .main-post-icon-container ul{
          list-style-type: none;
          margin-top: 2px;
          
         }

          .post-detail-container{
            margin-top: 48px;

         }
         .post-detail-container p{
          padding-left: 10px;
          margin: 8px;
          text-align: start;
        
         }
         .comment-home-container{
          display:none ;
         }
         .comment-home-container:target{
         position: fixed;
         display: inherit;
          width:100%;
          height: 100%;
          
         
          top: 0;
          background-color: white;
         }

         
          
    </style>
  

  

  <title>Instagram tutorial</title>
</head>
<body>


     
  
<div id="tabs"  class="main">

     <div id="ta" class="nav-top">     
    
  
       <ul> 


       <li class="nav-satrt-top"><a><i class="fas fa-camera-retro"></i></a></li>
       <li class="nav-img"><a><img src="aoo.png"/></a></li>
       <li class="nav-end"><a><i class="fas fa-location-arrow"></i></a></li>


     </ul>

   </div>







<div  id="home"  class="container active">
<div class="home-main-container">
   



</div>  
</div>    






<div  class="nav-bottom">
     
<ul>


<li><a class="tab" id="tabhome"><i class="fas fa-home"></i></i></a></li>

<li><a class="tab" id="tabsearch" ><i class="fas fa-Search"></i></a></li>


<li><a class="tab"  id="tabplus" href="insta_post.php"><i class="fas fa-plus"></i></a></li>
<li><a class="tab" id="heart"><i class="fas fa-heart"></i></a></li>
<li><a class="tab" id="user"><i class="fas fa-user"></i></a></li>


</ul>

</div>

</div>


<div id="comment" class="comment-home-container">
<?php
//include 'comment.php';

?>


</div>







 <!-- jQuery library -->

 <script src="jquery-3.5.1.min.js"></script>
   <script type="text/javascript">
   
    $(document).ready(function(){
  $("#tabsearch").click(function(){  
     $('#tabs').load('search.php');
 });
  $("#heart").click(function(){  
       $('#tabs').load('user.php');
   });

    $("#user").click(function(){  
       $('#tabs').load('profile.php');
   });

    $("#tabhome").click(function(){  
       $('#tabs').load('instagram.php');
   });



     fetch_post();
     setInterval(function(){
       fetch_post();




     },1000);

        function fetch_post(){

          var action = 'fetch_post';

           $.post("instagram.php",{action:action}

         ,function(data, status){

          $(".home-main-container").html(data);
          
           });

           }


       $(document).on('click','.like_button',function(){   
        

         var postid =$(this).data('post_id');
         var userid  =$(this).data('user_id');
         var postlike  =$(this).data('action');
          var action = 'fetch_user';
        
        // data:{action_follow:follow, user_id:userid,follow_id:followid},

         $.post("instagram.php",{action_like:postlike, user_id:userid,post_id:postid }


      ,function(data, status){

   fetch_post();
 

    });
       
return true;
});


});


  
</script>
    
</body>
</html>



         

        
            
            
          
          








    
