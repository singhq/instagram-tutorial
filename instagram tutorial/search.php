<?php

error_reporting(0);
include 'connection.php';
session_start();
$userid =$_SESSION['user_id'];

if(!isset($_SESSION['user_id'])){


header("location: insta_login.php");

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
      color: black;
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
        <div class="top-nav">
           <div class=" search-container">
              <div class=" search-inner-container button" >

                  <button><i class="fas fa-search"></i></button>
                </div> 
                <div class=" search-inner-container text">
                  <input type="text" name="search" placeholder="search" id="search-text" autocomplete>    
                 </div>

             
           </div>
          
    </div>


 <div class="user-search-container">
    
</div>










    
      <div  class="nav-bottom">
              
    <ul>



        <li><a href="instagram.php" class="tab" id="tabhome"><i class="fas fa-home"></i></i></a></li>
      
        <li><a href="#" class="tab" id="tabsearch" ><i class="fas fa-Search"></i></a></li>
     
     
        <li><a href="insta_post.php" class="tab"  id="tabplus"><i class="fas fa-plus"></i></a></li>
        <li><a href="user.php" class="tab" id="heart"><i class="fas fa-heart"></i></a></li>
        <li><a href="profile.php" class="tabs" id="user"><i class="fas fa-user"></i></a></li>
        

        

    </ul>

  </div>

    

 <script type="text/javascript">
  
  $(document).ready(function(){
      $('#search-text').keyup(function(){
          
          var search = $(this).val();
          
         if(search != ''){
         
          search_user(search);

         }
          else{

           search_user();
          }


 });
       
        function search_user(search)

        {

          var action = 'search_user';
//hhg
           $.post("action_search.php",{search:search}

         ,function(data, status){
               
          $(".user-search-container").html(data);
                  
           });

           }

         $(document).on('click', '.follow_button',function(){   
        
 
         var followid =$(this).data('user_follow');
         var userid  =$(this).data('user_id');
         var follow  =$(this).data('action');
         

         var search  =$(this).data('search');
        
           var action = 'search_user';
      
        
        
        // data:{action_follow:follow, user_id:userid,follow_id:followid},

         $.post("action_search.php",{action_follow:follow, user_id:userid,follow_id:followid}

                    
      ,function(data, status){

    
 search_user(search);
 
         
    });
       

     


        
});





  });



</script>
    </body>
</html>