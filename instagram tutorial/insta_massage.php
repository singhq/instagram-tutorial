<?php


error_reporting();
include 'connection.php';
session_start();

$userid =$_SESSION['user_id'];


if(!isset($_SESSION['user_id'])){
    $userid =$_SESSION['user_id'];
   
header("location: insta_login.php");


}

 else{
 
   

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
 
 
echo "
    <div class='search-main-container'>
           <div class='search-image-container'>
             
                 <img src='".$user_image."'>
         </div>
       
     </div>
     <div class='search-main-container'>
        <p style='margin-top:7px; '> $username;</p>
       
     </div>
     <div class='search-main-container'>
          <div class='search-like-container'>
             
     
        
         </div>
       
     </div>";
}
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
    
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
      *{
        margin: 0;
        padding: 0;
      }
      body{
        margin: 0;
        font-family: Arial, helvetica, sans-serif;
      }
      .top-nav{
        height: 45px;
        background-color: #e9e9e9;
        overflow: hidden; 
      }
      .search-container{
        margin-left: 13%;
      }

      .search-inner-container{
         float: left;
      }
      .search-inner-container .button{
         width: 30%;
      }
       .text{
        margin-left: 55px;
      }



      .search-inner-container input[type=text]{
        font-size: 17px;
        margin-top: 9px;
        
        border:none;
        padding: 5px;
        background-color: #e9e9e9;

}

 .search-inner-container button{
        font-size: 17px;
        margin-top: 9px;
        
        border: none;
        padding: 6px;
        cursor: pointer;
        background-color: #e9e9e9;

}

.user-search-container{
        width: 100%;
        max-width: 768px;
        margin: auto;
        margin-top: 12px;
      }
      .search-main-container{

        float: left;
        width: 32%;
        height: 50px;
      }
      

     .search-image-container{

      width: 40px;
      height: 40px;
      max-width: 45px;
      margin:auto;
      overflow: hidden;
      border-radius: 25px;


     }
     img{
      width: 100%;
      height: 100%;
     }
     .search-like-container{
       width: 80px;
      max-width: 45px;
      margin:auto;


     }
    .search-like-container button{
      height: 25px;
      width: 85px;
        
      border-radius: 5px;
      background-color: #3897f0;
      color: white;
      }



 
    .nav-bottom{
        width: 100%;

        
        bottom:0px;
        position: fixed;
        background-color: #f0f0f0; 
        
      }
      .nav-bottom ul{
        list-style-type: none;
        margin: 0;
        padding: 3;
        height: 28px;
         background-color: #f0f0f0; 
         margin-left: 54px;
        
        
        overflow: hidden;
      }


     .nav-bottom li{
        float: left;
        width: 18%;
       
        

      }
    .nav-bottom li a{
        text-decoration: none;
        text-align: center;
        line-height: 50px;
        color: black;
       
              }





    </style>

      <title>Instagram search</title>
  </head>
  <body>


 <div class="user-search-container">


    
</div>








 <!-- jQuery library -->

 <script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  
   fetch_massage();
     setInterval(function(){
       fetch_massage();




     },1000);

        function fetch_massage(){

          var action = 'fetch_massage';
              console.log(action);
           $.post("insta_massage.php",{action_massage:action}

         ,function(data, status){
           
          $(".user-search-container").html(data);
          
           });

           }



</script>

</body>
</html>


