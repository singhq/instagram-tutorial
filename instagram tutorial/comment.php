<?php




error_reporting(0);
include 'connection.php';
session_start();
$userid =$_SESSION['user_id'];

if(!isset($_SESSION['user_id'])){


header("location: insta_login.php");

}


else{
// user image for 

$sql = "SELECT * FROM `user` WHERE user_id = '$userid' ";
  $result = mysqli_query($conn , $sql);
  while($row= mysqli_fetch_assoc($result)){

     $user_image = $row['user_image'];





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



<style>

    *{
    margin: 0;
    padding: 0;
  }

  .body-main-container{
       overflow-y: auto;
       height: 90%;
       width: 100%;
       border-bottom: 10px;

  }
  

  .comment-body-container{
        width: 100%;
        max-width: 768px;
        margin: auto;
       

  }

  .comment-nav-container{
     max-width: 768px;
        margin: auto;
    width: 100%;
    top: 0;
    position: fixed;
    border-bottom: 1px solid #ccc;
  }

  .comment-nav-container ul{
    width: 100%;
    height: 50px;
    list-style-type: none;
    overflow: hidden;
    background-color: #f0f0f0;
  }
  .comment-nav-container  .comment-icon{
    float: left;
    width: 20%;
     margin-top: 14px;
    
  }

  .comment-nav-container  .comment-name{
    float: left;
    
    
  }

    .comment-nav-container  .comment-icon a{
    

    text-align: center;
    font-size: 17px;
    line-height: 50px;

    cursor: pointer;
    margin-left: 40%;

  }
  .comment-nav-container  .comment-name a{
    display: block;

    text-align: start;
    font-size: 17px;
    line-height: 50px;
  }

  


    .comment-bottom-container{
     max-width: 768px;
        margin: auto;
    width: 100%;
    bottom: 0;
    position: fixed;
    background-color: #f0f0f0;
  }
  .comment-bottom-inner-container{
    float: left;
    margin-left: 1px;

  }
  .comment-bottom-inner-container .image{
  
  width: 20%;
  }
  .comment-bottom-inner-container .comment{
    width: 20%;
    
  }
  .comment-bottom-inner-container-submit{
     margin-left:85%;
    



    
    
    
  }
  .comment-bottom-inner-container img{
    width: 40px;
    height: 40px;
    margin-top: 5px;
    margin-left: 10%;
    border-radius: 25px;

    
  }
  .comment-bottom-inner-container input{
     width: 100%;
     padding: 8px;
     margin: 6px 0;
     display: inline-block;
     box-sizing: border-box;
     font-size: 12px;
     border: none;
     background-color: #f0f0f0;
     color: #3897f0;
    




  }

  .comment-bottom-inner-container input{
       margin-left: 48px;
     margin-top: 13px;
      


  }


   button{
    width: 100%;
    padding: 8px;
    margin-top: 14px;
    font-size: 12px;
    border: none;
    background-color: #f0f0f0;
    color: #3897f0;
        


  }
  .comment-main-container{
    width: 100%;

        margin-top: 70px;

  }
  .comment-post-container{
    width: 100%;
    height: 50px;
   border-bottom: 1px solid #ccc;

    
  }

  .comment-inner-container{
        float: left;

  }
  
  .name p{
    margin-left: 10px;
    }
  .comment-inner-container img{
    width: 40px;
    height: 40px;
    margin-top: 1px;
   
    border-radius: 25px;

    
  }

  .comment-comment-container{
    width: 100%;
    height: 50px;


    
  }
  

  .comment-comment-inner-container .image{
     margin-right:54%;
  }
   .like {
       margin-left: 92%;
       
  }

  
  .comment-comment-inner-container .name p{
    margin-left: 70px;
         



    }

    .comment-comment-inner-container .mass p{
    margin-left: 70px;
         



    }

    .mass p {
      background-color: white;
         width: 60%;
         border-radius: 4px;
         padding: 2px;

    }

    
  .comment-comment-inner-container img{
    width: 40px;
    height: 40px;
  
    margin-left: 2%;
    border-radius: 25px;
    margin-top: 5px;

    
  }

  

 
  .comment-time-container-red{
   margin-left:30%;
  }
  



  </style>

    <title>Instagram profile</title>
  </head>
  <body>

<div class="body-main-container">   
 <div class="comment-body-container">

      <div class="comment-nav-container">

       <ul>

         <li class="comment-icon"><a href="instagram.php"><i class="fas fa-arrow-left"></i></</a></li>

          <li class="comment-name"><a>Comments</a></li>

      </ul>
 </div>

 <div class="comment-main-container">
    <div class="comment-post-container">
              
<!--  user caption show  -->

   </div>
    </div> 

        <div class="comment-comment-container">
           <!--  user comment show  -->

       </div>
      


   
 

 <div class="comment-bottom-container">

   <form method="post" id="comment_form" data-action="comment" >

  	

     <div class='comment-bottom-inner-container image' >

     <img src="<?php echo $user_image; ?>" id='user_image'>
   
    </div>


       


  <div class="comment-bottom-inner-container comment">

     <input type="text" name="comment"  placeholder="Add a comments..."  id="insert_comment" required>
   
  </div>
  <div class="comment-bottom-inner-container-submit">

      <button type="submit" name="submit" id="submit">Post</button>
   
   </div>
  
       </form>
</div>
 
    


</div>



</div> 


<script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">



	$(document).ready(function(){


    $(function()
{ 

 


$(document).on('click', '.comment_button',function(){ 

                    
        var postid =$(this).data('post_id');
           
        var userid  =$(this).data('user_id');

        
        var user_image  =$(this).data('user_image');
        //  $('#user_image').attr('src' ,user_image);

      localStorage.setItem('postid' , postid);  // local server me store karne ke liye on brower
           
       localStorage.setItem('userid' , userid); 
         fetch_comment(userid , postid); 
         fetch_caption( postid);
   });


   $('#comment_form').on('submit' ,function(e){
                 
         e.preventDefault();
     
      
     var action  =$(this).data('action');
     var postid =localStorage.getItem('postid');
             alert(postid);
     var userid =localStorage.getItem('userid');

     var postcomment  =$('#insert_comment').val();
      
      
      
    
     $.post("action_all.php",{action:action, post_comment:postcomment,  user_id:userid, post_id:postid},
    
    function(data ,status){
        $('#comment_form')[0].reset();
         
         fetch_comment(userid , postid);
              fetch_caption( postid);
            });

   



});


         fetch_comment();
     

       

     function fetch_comment(userid , postid){
        
          var action = 'fetch_comment';

           $.post("action_all.php",{action_comment:action , user_id:userid, post_id:postid}

         ,function(data, status){

          $(".comment-comment-container").html(data);

           });

           }
   

//return true;
   //  fetch caption 

     function fetch_caption( postid){

          var action = 'fetch_caption';
            
           $.post("action_all.php",{action_caption:action , post_id:postid}

         ,function(data, status){
             
          $(".comment-post-container").html(data);
 
           
           });

           }
   

return true;



	});


});


</script>


 </body>
</html>


















