<?php

//This script will handle login 
   

// check if the user is already logged in

session_start();

if(isset($_SESSION['submit']))
{
  $email = $_REQUEST['email'];

  $fullname = $_REQUEST['fullname'];
  $_SESSION['email']= $email;




    header("location: instagram.php");
    exit;   // taki koi code excute na ho
}
// ager user logged nhi tab    
require_once "connection.php";   // data base connection banana

$email = $password = "";     
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))  // ager username or password dono empty hai to yah error show hoga 
    {
        $err = "Please enter email + password";

          echo $err;

    }
    else{
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    }


         $sql = "SELECT  email, password FROM user WHERE email =? AND password = ?";
         
          
          $stmt =mysqli_prepare($conn , $sql);
          if($stmt){
             mysqli_stmt_bind_param($stmt, "ss" , $email , $password );
          
             mysqli_stmt_bind_result($stmt,   $email, $password );
             
            
             mysqli_stmt_execute($stmt);
             mysqli_stmt_store_result($stmt);
              if(mysqli_stmt_num_rows($stmt) == 1){
                

             mysqli_stmt_fetch($stmt);
               if(!empty($email) AND !empty($password)){
                                
                
          
          
    

// new session bnane ke liye code thi

 // session_start();

    $sql = "SELECT * FROM `user` WHERE email = '$email' ";
  $result = mysqli_query($conn , $sql);
  while($row= mysqli_fetch_assoc($result)){
   
     $_SESSION['user_id'] = $row['user_id'];
    
     $userid = $_SESSION['user_id'];

   


     }

    
     
    


                  
// ynha tak 

                
                                        

                  header("location: instagram.php ");
                 //  header("location: insta_suggestion.php ");

                 
                  
               }
             }
               else{
                $err= "Invalid email/password";

               // echo $err;
               }
             

          mysqli_stmt_close($stmt);
          }
          else{

                echo "error creating in function";

              }


          mysqli_close($conn);


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
    	
    		
    	    	.body-container{
    		width: 100%;
    		max-width: 350px;
    		 
    		margin: auto;
    		


    	}



    	.container{
    		
    		border: 6px solid #ccc;
    		margin-top: 10px;
    		

    	}
    	.bottom-container{
    		border: 6px solid #ccc;
    		margin-top: 10px;
    		

    	}



    	.heading{
    		width: 100%;
    		min-width:200px; 
    		margin: auto;
    		margin-top:10px;

    	}
    	.heading img{
    		width: 100%;
    	}
    	p{
    		text-align: center;
    		color: blue;
    		font-size: 16px;
    	}
    	.inner-container{
    		padding: 25px;
    	}
            .link-container{
        padding: 20px;
      }


    	input[type=email],input[type=text],input[type=password]{
    		width: 100%;
    		padding: 8px;
    		margin: 6px 0;
    		display: inline-block;
    		box-sizing: border-box;
    		font-size: 12px;
    		border:1px solid #e9e9e9;
    		border-radius: 4px;
    		background-color: #F0F0F0;
    	}
      button{
             width: 100%;
    		padding: 8px;
    		margin: 8px 0;
    		
    		font-size: 12px;
    		border:1px solid #e9e9e9;
    		border-radius: 5px;
    		background-color: #3897f0;
    		color: white;
    		font-size: 14px;

      }
      h5{
      	text-align: center;
      	color: #C0C0C0;
        margin-top: 5px;
      }

      h5 a{
        text-align: center;
        color: blue;
        font-size: 14px;
      }
      h4{
      	text-align: center;
            
      }
      @media screen and (max-width: 768px;){
      	.container{
      		border: none;
      	}
      }
       h6{
        color: red;
        font-size: 12px;
      }
    	

    </style>

    

    <title>Instagram login</title>
  </head>
  <body>
<div class=" body-container">

  <div class="container">
	 <div class="heading"><img src="new.jpg"></div>
	 
	 <form action="insta_login.php" method="POST">
		<div class="inner-container">

      <style>
        span{
          color: red;
        }


      </style>
     
			 <label></label><span><?php echo $err;  ?></span>
			<input type="email" name="email" placeholder="Phone number ,username , or email" required>
			
			<input type="password" name="password" placeholder="password" required>
			<button type="submit" value="submit" name="submit">Log In </button>

             <h5>OR</h5>
                 
            <div class="link-container">

                    <h5><a><i class="fab fa-facebook"></i>Log in with facebook</a></h5>
             
             
           </div>


			     <p>Forgot password</p>



		 </div>
		
	  </form>
	


   </div>
       <div class="bottom-container">
       	    <div class="inner-container">
       	    	<h4>Don't an account:-<a href="insta_signup.php" style="text-decoration: none;">Sign Up</a></h4>
       	  	
       	    </div>
       	
        </div>







</div>





  </body>
</html>

