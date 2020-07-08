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


 .user-profile-main-container{
     width: 100%;
     height: 98%;
     overflow-y: auto;
    
     background-color: white;
       

  }

  .user-manu-post-container {
            width: 100%;
            height: 70%;
          
            
           }


  .user-main-menu{
    
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
    width: 20%;
    margin-top: 16px;
  }
  li a{
    display: block;
    text-decoration: none;
    text-align: center;
    color: black;
   
  }
   .user-nav-name  a{
  margin-left:100%; 
      }

      .user-nav-names  a{
  margin-left:30%; 
      }
     .user-nav-icon a{
      margin-left: 20%;
    }
      
  

  
  @media screen and (max-width: 768px){
       
    .user-nav-name{
      width: 55%;
    }

        .user-nav-icon{
      width: 15%;
    }
  }

  .user-container{
    width: 100%;
    height: 100%;
     max-width: 768px;
    margin: auto;
     border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
     border-top: 1px solid #ccc;
    top:5;

 }
  .user-profile-container{
    width: 50%;
    float: left;
    height: 144px;
    overflow: hidden;
      margin-top: 15px;

  }
  .user-image-container{
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
  .user-follow-container{
    width: 33.33%;
    float: left;


  }
  .user-edit-container{
    padding: 10px;

  }
  button{
    width: 50%;
    padding: 5px;
    border: 1px solid #ccc;
    background-color: white;
    border-radius: 8px;
    margin-top: 5px;

  }
  p{
    text-align: center;
    width: 33px;
  }
@media screen and (max-width: 768px;){
  .user-profile-container box1{

    width: 35%;
  

  }
    .user-profile-container box2{
      width: 64%;
     
    
    }
}

.user-profile-details{
 
  overflow: hidden;
  
  width: 50%;
  line-height: 20px;
  
  

  

}
.user-profile-details p{
  text-align: start;
 
   margin-left: 10px;
  
   font-size: 14px;
   width: 100%;
  
}


.user-profile-tabs ul{
    list-style-type: none;
    width: 100%;
    height: 50px;
    background-color: white;
    overflow: hidden;
   
    border: 1px solid #ccc;
        


  }
  

  .user-profile-tabs li a{
    display: block;
    text-decoration: none;
    text-align: center;
    color: #ccc;
     margin-left: 85px;
   
  }
  .user-follow{
    font-size: 13px;
  }

 





 .user-profile-container-list{
     width: 100%;
     height: 100%;
     overflow:hidden;
    
     background-color: white;
       

  }





    .user-active{

    color: #000000;
  }
  .user-profile-container-inside{

display: none;
  }
  .user-profile-container-inside.user-profile-activate{
      display: inherit;
      padding-bottom: 50px;


  }

.grid-post-container{
   width: 32.7%;
   height: 150px;
   float: left;
   padding: 1px;

}
.user-grid-main-container img{
    width: 100%;
    height: 100%;
     border-radius: 2px;
    
}

@media screen and (max-width: 766px){

  .user-grid-main-container{
      height: 100px;

  }

}
.user-profile-container-list{
width: 100%;
height: 100%;
overflow-y: auto;

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
            border-radius: 5px;

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
          background-color: white;
          margin: start;
          
         }

          .post-detail-container{
           
           text-align: center;
            
         }
         .post-detail-container p{
          padding-left: 10px;
          margin: 8px;
          text-align: start;
          width: 50%;
           
        
         }
         .comment-home-container{
          display:none ;
         }
         .comment-home-container:target{
         position: fixed;
         display: inherit;
          width:100%;
          height: 100%;
          t
         
          top: 0;
          background-color: white;
         }
         .user-profile-home-container{
          display:none ;
         }
         .user-profile-home-container:target{
         position: fixed;
         display: inherit;
          width:100%;
          height: 100%;
          t
         
          top: 0;
          background-color: white;
         }

         


            
             


 


</style>
    

    <title>Instagram profile</title>
  </head>
  <body>


<div class=" user-profile-main-container">


 <div class="user-main-menu">
    <ul>

       <li class="user-nav-icon"><a href="instagram.php"><i class="fas fa-arrow-left"></i></a></li>
       <li class="user-nav-names"><a><h4 ><?php  echo $username;; ?></h4></a></li>
       <li class="user-nav-name"><a style="text-align: left; "><i class="fas fa-ellipsis-v"></i></a></li>

     
    </ul>

</div>

<div class="user-container">
 

  <div class="user-profile-container box1">

        <div class="user-image-container">
          <?php
 

 echo "<td>
     <img src='".$user_image."'/>

      </td>";


?>

  </div>
</div>

 <div class="user-profile-container box2">

<?php

 echo  "<div class='user-edit-container'>
          <div class='user-follow-container'>
            ".make_post($conn , $userid )."   

           <p class='user-follow'>Post</p>
           

         </div>

         
         <div class='user-follow-container'>
          

          ".make_follower($conn , $userid )."

          <p class='user-follow'>follower</p>

           

         </div>

         
         <div class='user-follow-container'>
          
          ".make_following($conn , $userid )."
          <p class='user-follow'>following</p>
           
         </div>
      


         <a href='insta_massage.php'><button class='btn btn-primary'><b>Massage</b></button></a>
         

      </div>";

?>
  </div>
    
   
   <div class="user-profile-details">



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



  
  <div class="user-profile-tabs">

    <ul>

      <li class="user-nav-icon user-active" id="profile-detail" user-containerIds="user-grid"><a><i style="color: #ccc; margin-left: 2px;" class="fas fa-grip-horizontal"></i></a></li>
      <li class="user-nav-icon" id="profile-detail" user-containerIds="user-list"><a><i style="color: #ccc;"  class="fas fa-list"></i></a></li>
      <li class="user-nav-icon" id="profile-detail" user-containerIds="user-tag"><a><i style="color:#ccc;;"  class="fas fa-portrait"></i></a></li>
      <li class="user-nav-icon" id="profile-detail" user-containerIds="user-save"><a><i style="color: #ccc;"  class="fas fa-bookmark"></i></a></li>
      

    </ul>

        

  </div>

       
         <div id="user-grid" class="user-profile-container-inside  user-profile-activate">
               <div class="user-grid-main-container">
                  
                 
              </div>
        </div>

        <div id="user-list" class="user-profile-container-inside " >
            <div class="user-profile-container-list">
                  
                  
           </div>
      
        </div>

        <div id="user-tag" class="user-profile-container-inside" >

            <p>tag</p>
        </div>

        <div id="user-save" class="user-profile-container-inside" >

            <p>save</p>
        </div>




   </div>    
 
 




</div>



 <!-- jQuery library -->

<script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){


 $(".user-nav-icon").click(function(){

          $(".user-nav-icon").removeClass("user-active");
          $(this).addClass("user-active");
            //  console.log(this);
 
           
          $(".user-profile-container-inside").removeClass("user-profile-activate");
         
          var userid =$(this).attr("user-containerIds");
          

          $("#"+userid).addClass("user-profile-activate");

       // console.log(userid);


 

        });


     fetch_user_list_post();
     setInterval(function(){
       fetch_user_list_post();




     },1000);



   function fetch_user_list_post(){

          var action = 'fetch_user_list_post';

           $.post("profile_user_action.php",{action_user_list_post:action}

         ,function(data, status){
          

          $(".user-profile-container-list").html(data);
           
           
           
           });

           }

             fetch_user_grid_post();

   function fetch_user_grid_post(){

          var action = 'fetch_user_grid_post';
          
           $.post("profile_user_action.php",{action_user_grid_post:action}

         ,function(data, status){
            console.log(data);
          
          $(".user-grid-main-container").html(data);
           
           
           
           });

           }



});

</script>
    </body>
</html>