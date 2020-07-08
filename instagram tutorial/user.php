




<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <!-- jQuery library -->


    <style>

      *{
        margin: 0;
        padding: 0;
      }
    .user-top-nav ul{
        list-style-type: none;
        
        height: 50px;
        background-color: #ccc;
        overflow: hidden; 
      
      }
    .user-top-nav li{
        float: left;
        width: 50%;
      }
     .user-top-nav li a{
        display: block;
        text-decoration: none;
        text-align:center;
        line-height: 50px;
         cursor: pointer;
        color: black;
        overflow: hidden;
      }
        .activate{
        color: red;
      }
     
      .user-container.user-active{

       display: inherit; 

              }
      .user-container{
       display: none;
        
         }

      .user-container{
        
         height: 100%;
         width: 100%;
      


         }
      
.user-follow-container{
        width: 100%;
        max-width: 768px;
        margin: auto;
        height: 100%;
        margin-top: 15px;
      }
      .follow-container{

        float: left;
        width: 33%;
        height: 50px;
      }
      

     .follow-image-container{

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
     .follow-like-container{
       width: 80px;
      max-width: 45px;
      margin:auto;


     }
    .follow-like-container button{
      height: 24px;
      width: 60px;
        
      border-radius: 5px;
      background-color: #3897f0;
      color: white;
      }

      .user-following-container{
        width: 100%;
        max-width: 768px;
        margin: auto;
        margin-top: 8px;
      }
      .following-container{

        float: left;
        width: 32%;
        height: 50px;
      }
      

     .following-image-container{

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
     .following-like-container{
       width: 80px;
      max-width: 45px;
      margin:auto;


     }
    .following-like-container button{
      height: 25px;
      width: 85px;
        
      border-radius: 5px;
      background-color: #3897f0;
      color: white;
      }

       .nav-bottom{
        width: 100%;

        
        bottom:0;
        position: fixed;
        background-color: #f0f0f0; 
        
      }
      .nav-bottom ul{
        list-style-type: none;
        margin: 0;
        padding: 3;
        height: 28px;
         background-color: #f0f0f0; 
         margin-left: 50px;
        
        
        overflow: hidden;
      }


     .nav-bottom li{
        float: left;
        width: 20%;
        margin-left: 0px;
        

      }
    .nav-bottom li a{
        text-decoration: none;
        text-align: center;
        line-height: 50px;
        color: black;
       
              }

            
             





     



     
     

      


    </style>

    

    <title>Instagram user</title>
  </head>
  <body>


<div class="user-top-nav">
    <ul>
      <li><a class="user-tab " containerId="following"><b>FOLLOWING</b></a></li>

      <li><a class="user-tab activate" containerId="you"><b>YOU</b></a></li>

    </ul>


    

</div>


<div id="following" class="user-container" >
      
        <div class="user-following-container">

     <div class="following-container">
           <div class="following-image-container">
             <img src="bon.png">
       
         </div>
       
     </div>
     <div class="following-container">
        <p><b>fullname</p>
       
     </div>
     <div class="following-container">
          <div class="following-like-container">
             <button>following</button>
       
         </div>
       
     </div>

   </div>


      
</div>




<div id="you" class="user-container  user-active" >

   <div class="user-follow-container" id="few">


   </div>
     
 </div>

 

<div  class="nav-bottom">
              
    <ul>


        <li><a href="instagram.php" class="tab" id="tabhome"><i class="fas fa-home"></i></i></a></li>
      
        <li><a href="search.php" class="tab" id="tabsearch" ><i class="fas fa-Search"></i></a></li>
     
     
        <li><a href="insta_post.php" class="tab" id="tabplus"><i class="fas fa-plus"></i></a></li>
        <li><a href="#" class="tab" id="heart"><i class="fas fa-heart"></i></a></li>
        <li><a href="profile.php" class="tabs" id="user"><i class="fas fa-user"></i></a></li>
        

    </ul>



  </div>







<script src="jquery-3.5.1.min.js"></script>
    <script type="text/javascript">


    $(document).ready(function(){
      

        $(".user-tab").click(function(){

          $(".user-tab").removeClass("activate");
          $(this).addClass("activate");
            

          $(".user-container").removeClass("user-active");
         
          var userid =$(this).attr("containerId");
          console.log(this);
          $("#"+userid).addClass("user-active");

           // console.log(userid);


 

        });

        fetch_user();
        function fetch_user(){

          var action = 'fetch_user';

           $.post("action_search.php",{action_user:action}

         ,function(data, status){

          $(".user-follow-container").html(data);
           });

           }


       $(document).on('click','.follow_button',function(){   
        

         var followid =$(this).data('user_follow');
         var userid  =$(this).data('user_id');
         var follow  =$(this).data('action');
          var action = 'fetch_user';
        
        // data:{action_follow:follow, user_id:userid,follow_id:followid},

         $.post("action_search.php",{action_follow:follow, user_id:userid,follow_id:followid }


      ,function(data, status){

    //  $(".user-follow-container").html(data);
      
   // location.reload();
  fetch_user();
 

    });
       

       return true;


        
});


      
});




 //  $(document).on('click','follow_button',function(){


    //   var followid =$(this).data('user_follow');
     //  var userid =$(this).data('user_id');
     //  var follow =$(this).data('action');
        
 //   alert(userid);
  //     $.ajax({

       // url: "user.php"
   //    type: "POST",
    //   data:{action_follow:follow, user_id:userid,follow_id:followid},
    //   success:function(data){
        //fetch_user();
    //  }



   //    });

   //   });
   //   });

 </script>
</body>
</html>