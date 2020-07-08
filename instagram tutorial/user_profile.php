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
    .user-top-nav ul{
        list-style-type: none;
        width: 100%;
        height: 50px;
        background-color: #e9e9e9;
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
        color: #ccc;
      }
      .user-tab .activate{
        color: red;
      }
      .user-container{
        
        width: 100%;
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

      
     



     
     

      


    </style>

    

    <title>Instagram user</title>
  </head>
  <body>


<div class="user-top-nav">
    <ul>
      <li><a class="user-tab" containerIds="following">FOLLOWING</a></li>

      <li><a class="user-tab activate" containerIds="you">YOU</a></li>

    </ul>


    
</div>



<div id="following" class="user-container">


       <div class="user-following-container">

     <div class="following-container">
           <div class="following-image-container">
             <img src="bon.png">
       
         </div>
       
     </div>
     <div class="following-container">
        <p><b>Full name</p>
       
     </div>
     <div class="following-container">
          <div class="following-like-container">
             <button>following</button>
       
         </div>
       
     </div>

   </div>

     
</div>








    <script type="text/javascript">

       $(document).ready(function(){


    $(".user-tab").click(function(){

          $(".user-tab").removeClass("activate");


          $(this).addClass("activate");




       });



 });


        
   </script>
</body>
</html>