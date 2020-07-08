<?php
// yah include karega config.php file ko ek bar

session_start();
require_once "connection.php";

 $fullname =  $username = $email = $password = "";  // variable  hai
 $fullname_err = $username_err = $email_err = $password_err = "";   // error aane pr

//yah php ka syntax hai post request ke liye or pure function ke liye 
if ($_SERVER['REQUEST_METHOD'] == "POST"){  

    // Check if username is empty
    if(empty(trim($_POST["fullname"]))){
        $fullname_err = "fullname cannot be blank";  // ageryah check pass ho gya tab aage bado
    }

    else{
      $sql ="SELECT * FROM `user` WHERE fullname =?";
         // yah parepare statement hote hai  query ko select karene ke liye 

        $stmt = mysqli_prepare($conn, $sql); // esme en dono ko prepare kar dega or ager yah statement parepare ho jata hai tab 

        if($stmt)
            {
                mysqli_stmt_bind_param($stmt, "s", $param_fullname); // esme param variable se user ko bind kiya gya hai

                   // Set the value of param username
                  $param_fullname = trim($_POST['fullname']);  // trim ek tarah se saf safai ka kaam karta hai aage peeche se

                // Try to execute this statement
                 if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);  // result store ke liye
                if(mysqli_stmt_num_rows($stmt) == 1) // ager user name already taken hai tab
                {
                    $fullname_err = "This fullname is already taken"; 
                }
                // ager nhi liya hai tab store ker do user ko 
                else{
                    $fullname = trim($_POST['fullname']);
                }



              }
                // 
                 else{
                echo "Something went wrong";
                     }
            }
        }
    // statement ko close kr do

    mysqli_stmt_close($stmt);

    // Check for gender
if(empty(trim($_POST['username']))){
    $username_err = "username cannot be blank";

}
else{
  $username = trim($_POST['username']);
}

// Check for email
if(empty(trim($_POST['email']))){
    $email_err = "email cannot be blank";

}
else{
  $email = trim($_POST['email']);
}


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";

    
}
// password 5 charector se bda hona chahiye
elseif(strlen(trim($_POST['password'])) < 5){
  // ager password 5 charactors se chota hai to yah massage show hoga 
    $password_err = "Password cannot be less than 5 characters";

    
}
else{
    $password = trim($_POST['password']);  // store karene ke liye ya lene ke liye 
}









// If there were no errors,    go ahead and insert into the database
if(empty($fullname_err) && empty($username_err) && empty($email_err) && empty($password_err))
{
 $sql = "INSERT INTO `user`(`fullname`, `username` , `email`, `password` ) VALUES (? ,? , ? ,? )"; 
   
   $stmt = mysqli_prepare($conn, $sql);
   if($stmt)
   {
    mysqli_stmt_bind_param($stmt, 'ssss' , $param_fullname , $param_username , $param_email ,$param_password);


    $param_fullname = $fullname;
    $param_username = $username;
    $param_email = $email;
    $param_password = $password;
   
   
   

              // Try to execute the query
           if (mysqli_stmt_execute($stmt))
           {

                 $user_sql ="SELECT * FROM `user` `fullname ='$fullname'";
               $user_result = mysqli_query($conn , $user_sql);
               while($user_row = mysqli_fetch_assoc($user_result)){
                $_SESSION['user_id'] = $user_row['user_id'];
               // header('location: Instagram.php');
              }
               

              // ager sab kuch ok hai tab user ko redirect kr do login.php pr 
              header("location: insta_login.php");


            }
          //ager ok nhi hai tab yah show
        else{
            echo "Something went wrong.... cannot redirect!";
            }
    }
    mysqli_stmt_close($stmt);
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
    		color: #ccc;
    		font-size: 16px;
    	}
    	.inner-container{
    		padding: 25px;
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

    

    <title>Instagram sign up</title>
  </head>
  <body>
<div class=" body-container">

  <div class="container">
	 <div class="heading"><img src="new.jpg"></div>
	 <p>Sign up to see photo and vedios</p>
	 <p>From your friends</p>
	 <form action="insta_signup.php" method="POST">
		<div class="inner-container">
			<button><i class="fab fa-facebook"></i>Log in with facebook</button>
			<h5>OR</h5>

			
			
			<input type="text" name="fullname" placeholder="Fullname" required>
			<input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Mobile Number or email" required>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit" class="submit">Sign Up</button>

			     <p>By signing  up you agree to our</p>
			     <p>Term, Data plolicy and cookies</p>
			     <p>Policy.</p>


		 </div>
		
	  </form>
	


   </div>
       <div class="bottom-container">
       	    <div class="inner-container">
       	    	<h4>Have an account:-<a href="insta_login.php" style="text-decoration: none;">Log In</a></h4>
       	  	
       	    </div>
       	
        </div>







</div>





  </body>
</html>

