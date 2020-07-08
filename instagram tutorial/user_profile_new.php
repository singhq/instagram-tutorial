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


<!--- Latest compiled JavaScript --->

    
<style>

  *{
    margin: 0;
    padding: 0;
  }
  .user-profile-main-container{
     width: 100%;
     height: 95%;
     overflow: hidden;
    
     background-color: white;
       

  }

  .user-manu-container {
            width: 100%;
            height: 70%;
          
            
           }


  

  .user-container{
    width: 100%;
    height: 100%;
    max-width: 768px;
    margin: auto;
   border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
     border-top: 1px solid #ccc;
  padding-top: 20px;
 
   
    

    
  }
  .user-profile-container{
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
  padding-top: 100px;
  

  

}
.profile-details p{
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
  .follow{
    font-size: 13px;
  }

  .user-profile-tab.profile-active{

    color: #3897f0;
  }
  .user-profile-container-inside{

   display: none;

  }

  .user-profile-container-inside.user-profile-actives{
       display: inherit;
       padding-bottom: 0px;

  }

  .user-grid-post-container{
    width: 33.33%;
    height: 200px;
    float: left;
    padding: 1px;

 }

 .user-grid-post-container img{

  width: 100px;
  height: 100px;
 }

 @media screen and (max-width: 768px){
     .user-grid-post-container{
         height: 100px;

     }




 }
 .user-profile-grid-container{

  display: none;
 }


 .user-profile-grid-container:target{
     width: 100%;
     height: 100%;
     display: inherit;
     top: 0;
     position: fixed;

     background-color: white;

  }

   .user-grid-profile-container{
       width: 100%;
       max-width: 500px;
       margin: auto;




   }
   .user-profile-grid-nav-contaner{
       width: 100%;
       max-width: 500px;
       margin: auto;
       background-color: #f0f0f0;
       border-bottom:1px solid #ccc;

   }

   .user-profile-grid-nav-contaner ul{
       width: 100%;
     height: 50px;
     list-style-type: none;
    overflow: hidden;
     background-color: #f0f0f0;


   }
.user-profile-grid-nav-contaner.user-profile-grid-icon{

  float: left;
  width: 80%;

}
.user-profile-grid-nav-contaner.user-profile-grid-name{

  float: left;
  width: 20%;

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


    


            
             


 


</style>
    

    <title>Instagram user profile action</title>
  </head>
  <body>



<div class="user-profile-main-container">

    <div class="user-manu-container">
           <ul>
              <li class="user-grid-icon"><a><i class="fas fa-arrow-left"></i></</a></li>
              <li class="user-grid-name"><a style="text-align: left;">Photo</a></li>
              <li class="user-grid-name"><a style="text-align: left;">Photo</a></li>

           </ul>
     
    </div>

<div class="user-container">
 

  <div class="user-container-profile">

       
   </div>
  
   <div class="user-profile-tabs">

        <ul>

      <li class="user-profile-tab profile-activate" user-containerIds="user-grid"><a><i class="fas fa-grip-horizontal"></i></a></li>
      <li class="user-profile-tab" user-containerIds="user-list"><a><i class="fas fa-list"></i></a></li>
      <li class="user-profile-tab" user-containerIds="user-tag"><a><i class="fas fa-portrait"></i></a></li>
      <li class="user-profile-tab" user-containerIds="user-save"><a><i class="fas fa-bookmark"></i></a></li>
      

    </ul>

        

  </div>

       
         <div id="user-grid" class="user-profile-container-inside  profile-activate">
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


      <div class="user-profile-grid-container" id="user-profile-grid">
             <div class="user-profile-grid-nav-container">
                  <ul>
                    <li class="user-profile-grid-icon"><a><i class="fas fa-arrow-left"></i></</a></li>
                    <li class="user-profile-grid-name"><a style="text-align: left;">Photo</a></li>

                  </ul>
             </div>

             <div class="user-grid-profile-container">


             </div>


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

     $(".user-profile-tab").click(function(){

          $(".user-profile-tab").removeClass("user-profile-active");
          $(this).addClass("user-profile-active");
            //  console.log(this);
 
           
          $(".user-profile-container-inside").removeClass("user-profile-activate");
         
          var userid =$(this).attr("user-containerIds");
          

          $("#"+userid).addClass("user-profile-activate");

       // console.log(userid);
 });




 
 
       fetch_profile();
   function fetch_post(){

          var action = 'fetch_post';

           $.post("user_action_profile.php",{action:action}

         ,function(data, status){
          

          $(".user-container-profile").html(data);
           
           
           
           });

           }

             fetch_post();

   function fetch_post(){

          var action = 'fetch_post';

           $.post("user_action_profile.php",{action_post:action}

         ,function(data, status){
          

          $(".user-profile-container-list").html(data);
           
           
           
           });

           }

             fetch_post();

   function fetch_post(){

          var action = 'fetch_post';

           $.post("user_action_profile.php",{action_post:action}

         ,function(data, status){
          

          $(".user-profile-container-list").html(data);
           
           
           
           });

           }

             fetch_grid_post();

   function fetch_grid_post(){

          var action = 'fetch_grid_post';

           $.post("user_action_profile.php",{action_grid_post:action}

         ,function(data, status){
          

          $(".user-grid-main-container").html(data);
           
           
           
           });

           }

           $(document).on('click' , '.grid_button' function(){

               var postid= $(this).data('post_id');
                var action= $(this).data('action');
                


                fetch_single_post(action, postid);







           });


        

   function  fetch_single_post(action ,postid){

         

           $.post("user_action_profile.php",{action_grid_single_post:action ,post_id:postid}

         ,function(data, status){
          

          $(".user-grid-main-container").html(data);
           
           
           
           });

           }






});

</script>
    </body>
</html>