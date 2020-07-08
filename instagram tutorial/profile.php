<?php

error_reporting(0);
include 'connection.php';
session_start();

$userid =$_SESSION['user_id'];

if(!isset($_SESSION['user_id'])){


header("location: insta_login.php");

}
else{
$sql = "SELECT * FROM `user` WHERE user_id = '$userid' ";
  $result = mysqli_query($conn , $sql);
  while($row= mysqli_fetch_assoc($result)){

     $username = $row['username'];
     $fullname = $row['fullname'];
     
     $bio = $row['bio'];
     $user_image = $row['user_image'];
     $website = $row['website'];
    // $userid = $row['user_id'];
     $followid = $row['user_id'];








  

     


?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     

    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    
    <!-- jQuery library -->


<!--- Latest compiled JavaScript --->

    
<style>

  *{
    margin: 0;
    padding: 0;
  }
  .profile-main-container{
     width: 100%;
     height: 100%;
     overflow-y: scroll;
    
     background-color: white;
       

  }

  .manu-post-container {
            width: 100%;
            height: 70%;
          overflow: hidden;
            
           }


  .main-menu{
    
     width: 100%;

  }
  ul{
    list-style-type: none;
    width: 100%;
    height: 50px;
    background-color: #e9e9e9;
    overflow: hidden;

  }


  li{
    float: left;
    width: 25%;
    margin-top: 16px;
  }
  li a{
    display: block;
    text-decoration: none;
    text-align: center;
    color: black;
   
  }
  
  @media screen and (max-width: 768px){

    .nav-name{
      width: 55%;
    }

        .nav-icon{
      width: 15%;
    }
  }

  .container{
    width: 100%;
    height: 100%;
    max-width: 768px;
    margin: auto;
   border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
     border-top: 1px solid #ccc;
    top:0;
 
   
    

    
  }
  .profile-container{
    width: 50%;
    float: left;
    height: 144px;
    overflow: hidden;


  }
  .image-container{
    width: 80px;
    height: 80px;
    max-width: 80px;
    margin: auto;
  


  }
  img{
    width: 100%;
    height: 100%;
    border-radius: 50px;

  }
  .follow-container{
    width: 33.33%;
    float: left;


  }
  .edit-container{
    padding: 10px;

  }
  button{
    width: 100%;
    padding: 5px;
    border: 2px solid #ccc;
    background-color:0 white;
    border-radius: 25px;
    margin-top: 5px;

  }
  p{
    text-align: center;
    width: 33px;
  }
@media screen and (max-width: 768px;){
  .profile-container box1{
    width: 35%;

  }
    .profile-container box2{
      width: 64%;
      margin-right: 15px;
    
    }
}

.profile-details{
 
  overflow: hidden;
  
  width: 50%;
  line-height: 20px;
  
  

  

}
.profile-details p{
  text-align: start;
 
   margin-left: 10px;
  
   font-size: 14px;
   width: 100%;
  
}


.profile-tabs ul{
    list-style-type: none;
    width: 100%;
    height: 50px;
    background-color: white;
    overflow: hidden;
   
    border: 1px solid #ccc;
        


  }
  

  .profile-tabs li a{
    display: block;
    text-decoration: none;
    text-align: center;
    color: #ccc;
     margin-left: 85px;
   
  }
  .follow{
    font-size: 13px;
  }

 










    .nav-bottom{
      list-style-type: none;
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


    .active{

    color: #000000;
  }
  .profile-container-inside{

display: none;
  }
  .profile-container-inside.profile-activate{
      display: inherit;
      padding-bottom: 10px;


  }

.grid-post-container{
   width: 32.5%;
   height: 150px;
   float: left;
   padding: 1px;

}

.grid-post-container img{
    width: 100%;
    height: 100%;
    border-radius: 1px;
  
}

@media screen and (max-width: 766px){

  .grid-post-container{
      height: 100px;

  }

}

            
             


 


</style>
    

    <title>Instagram profile</title>
  </head>
  <body>





 <div class="main-menu">
    <ul>
      <li class="nav-name"><a><h4 style="margin-top:-14px;"><?php  echo $username;; ?></h4></a></li>
      <li class="nav-icon"><a><i class="fas fa-history"></i></a></li>
      <li class="nav-icon"><a><i class="fas fa-user-plus"></i></a></li>
      <li class="nav-icon"><a><i class="fas fa-ellipsis-v"></i></a></li>
     
    </ul>

    <div class="close-menu-container">
     
      <a href="logout.php"><h4>Log out</h4></a>
      

    </div>
</div>

<div class="container">
 

  <div class="profile-container box1">

        <div class="image-container">
          <?php
 

 echo "<td>
     <img src='".$user_image."'/>

      </td>";


?>

</div>
</div>

 <div class="profile-container box2">

<?php

 echo  "<div class='edit-container'>
         <div class='follow-container'>
          ".make_post($conn , $userid )."   

           <p class='follow'>Post</p>
           

         </div>

         
         <div class='follow-container'>
          

          ".make_follower($conn , $userid )."

          <p class='follow'>follower</p>

           

         </div>

         
         <div class='follow-container'>
          
          ".make_following($conn , $userid )."
          <p class='follow'>following</p>
           
         </div>
      


         <a href='edit_profile.php'><button class='btn btn-primary'> Edit profile</button></a>
         

    </div>";

?>
  </div>
    
   
   <div class="profile-details">



       <p><b><?php echo $fullname; ?> </b></p>
             <p><?php echo $website; ?></p>
            <p><?php echo $bio; ?> </p>
            
   





<?php

}
}

function make_follower($conn , $userid ){

  $sql = "SELECT count(*) As sum FROM `user_follow` WHERE `follow_id`  = '$userid' ";
  $result = mysqli_query($conn , $sql);
  $row= mysqli_fetch_assoc($result);

  $row_result = $row['sum'];
  if($row_result==null){
     
     $output = '<p><br>0<br></p>';
  }
  else{
    $output = '<p><br> '.$row_result.'<br></p>';


  }
  return $output;





}



function make_following($conn , $userid ){

  $sql = "SELECT count(*) As sum FROM `user_follow` WHERE `user_id`  = '$userid' ";
  $result = mysqli_query($conn , $sql);
  $row= mysqli_fetch_assoc($result);

  $row_result = $row['sum'];
  if($row_result==null){
     
     $output = '<p><br>0<br></p>';
  }
  else{
    $output = '<p><br>'.$row_result.'<br></p>';


  }
  return $output;





}

function make_post($conn , $userid ){

  $sql = "SELECT count(*) As sum FROM `user_post`WHERE `user_id`  = '$userid' ";
  $result = mysqli_query($conn , $sql);
  $row= mysqli_fetch_assoc($result);

  $row_result = $row['sum'];
  if($row_result==null){
     
     $output = '<p><br>0<br></p>';
  }
  else{
    $output = '<p><br>'.$row_result.'<br></p>';


  }
  return $output;





}


 ?>

</div>



  
   <div class="profile-tabs">

        <ul>

      <li class="nav-icon active" id="profile-detail" containerIds="grid"><a><i style="color: #ccc; margin-left: 2px;" class="fas fa-grip-horizontal"></i></a></li>
      <li class="nav-icon" id="profile-detail" containerIds="list"><a><i style="color: #ccc;"  class="fas fa-list"></i></a></li>
      <li class="nav-icon" id="profile-detail" containerIds="tag"><a><i style="color:#ccc;;"  class="fas fa-portrait"></i></a></li>
      <li class="nav-icon" id="profile-detail" containerIds="save"><a><i style="color: #ccc;"  class="fas fa-bookmark"></i></a></li>
      

    </ul>

        

  </div>

       
         <div id="grid" class="profile-container-inside  profile-activate">
               <div class="grid-main-container">
                    

              </div>
        </div>

        <div id="list" class="profile-container-inside " >
            <div class="profile-container-list">
                  

           </div>
      
        </div>

        <div id="tag" class="profile-container-inside" >

            <p>tag</p>
        </div>

        <div id="save" class="profile-container-inside" >

            <p>save</p>
        </div>




  </div>    

 

 <div  class="nav-bottom">
              
    <ul style="margin-bottom: 8px; ">


        <li><a href="instagram.php" class="tab" id="tabhome"><i class="fas fa-home"></i></i></a></li>
      
        <li><a href="search.php" class="tab" id="tabsearch" ><i class="fas fa-Search"></i></a></li>
     
     
        <li><a href="insta_post.php" class="tab"  id="tabplus"><i class="fas fa-plus"></i></a></li>
        <li><a href="user.php" class="tab" id="heart"><i class="fas fa-heart"></i></a></li>
        <li><a href="#" class="tabs" id="user"><i class="fas fa-user"></i></a></li>
        
        </ul>



  </div>









 <!-- jQuery library -->

<script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
 
 $(".nav-icon").click(function(){

          $(".nav-icon").removeClass("active");
          $(this).addClass("active");
            //  console.log(this);
 
           
          $(".profile-container-inside").removeClass("profile-activate");
         
          var userid =$(this).attr("containerIds");
          

          $("#"+userid).addClass("profile-activate");

       // console.log(userid);


 

        });


     fetch_post();
     setInterval(function(){
       fetch_post();




     },1000);



   function fetch_post(){

          var action = 'fetch_post';

           $.post("user_action_profile.php",{action_post:action}

         ,function(data, status){
          

          $(".profile-container-list").html(data);
           
           
           
           });

           }

             fetch_grid_post();

   function fetch_grid_post(){

          var action = 'fetch_grid_post';

           $.post("user_action_profile.php",{action_grid_post:action}

         ,function(data, status){
          

          $(".grid-main-container").html(data);
           
           
           
           });

           }






});

</script>
    </body>
</html>