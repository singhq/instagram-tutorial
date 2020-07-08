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
     $email = $row['email'];

       



}
}

 
  if(isset($_POST['submit'])){
$file_name =$_FILES['file']['name'];
$file_type= $_FILES['file']['type'];
$file_size=$_FILES['file']['size'];
$file_tem_loc= $_FILES['file']['tmp_name'];
$file_store = "instagram_user_image/" .$file_name;
$profile_image_url ='http://localhost:8080/instagram%20tutorial/instagram_user_image/'.$file_name;
$fullname =$_POST['fullname'];
$username =$_POST['username'];
$website =$_POST['website'];
$bio =$_POST['bio'];
$email =$_POST['email'];
$phonenumber =$_POST['phonenumber'];
$gender =$_POST['gender'];







move_uploaded_file($file_tem_loc, $file_store);

echo "<img scr='$file_store' height='100' width'100'/>";



$query = "UPDATE `user` SET `fullname`='$fullname',`username`='$username',
`email`='$email', `user_image`='$profile_image_url' ,`bio`= '$bio',`website`='$website',`gender`='$gender', `phonenumber`='$phonenumber' WHERE  fullname ='$fullname'";

$query_result  = mysqli_query($conn ,$query);

if($query_result){
	echo "update successfull";

	header("location: instagram.php");


}
else{
	echo "update error";

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
	.edit-menu-container{
		width: 100%;
	}

	.edit-menu-container ul{
		width: 100%;
		height: 50px;
		list-style-type: none;
		overflow: hidden;
		background-color: #f0f0f0;
	}
	.edit-menu-container  .edit-icon{
		float: left;
		width: 15%;
		
	}

	.edit-menu-container  .edit-name{
		float: left;
		width: 70%;
		
	}
	.edit-menu-container  .edit-icon {
		

		text-align: center;
		font-size: 17px;
		line-height: 50px;

		cursor: pointer;
	}
	.edit-menu-container  .edit-name a{
		display: block;

		text-align: start;
		font-size: 17px;
		line-height: 50px;
	}
	.edit-main-container{
		width: 100%;
		max-width: 768px;
		margin: auto;
	}
		.edit-image-container{
		width: 100%;
		max-width: 100px;
		margin: auto;
		padding-top: 20px;
		padding-bottom: 20px;

	}

	.edit-image-container img{
		width: 100px;
		height: 100px;
		border-radius: 50px;



	}
	.edit-image-container button{
		width: 110px;
		border: none;
		margin-top: 5px;
		background-color: white;
		color: #3897f0;
		font-size: 16px;


		


	}
	
		

	}
	.edit-profile-detail-container{
		width: 100%;
		padding: 10px;

	}
		.edit-profile-detail-container{
		width: 100%;
		padding: 10px;
				
	}
	 .edit-profile-detail-container input[type=text]{
		width: 100%;
		padding: 5px;
		margin-top: 8px;
		margin-bottom: 8px;
		border:none;
		border-bottom: 1px solid #f0f0f0;

	}
	.edit-profile-detail-container label{
		padding: 5px;
		margin-top: 5px;


	}
	.edit-profile-detail-container h6 {
	
		width: 100%;
		border: 1px solid #ccc;
		font-size: 17px;
		text-align: center;
		padding: 5px;

	}
		.edit-tools-container h6{
		font-size: 17px;
		text-align: center;
		padding: 5px;

	}
	







	




</style>
    

  <title>Instagram edit profile</title>
</head>
<body>




<div class="edit-menu-container">




    <form action="?" method="POST" enctype="multipart/form-data">

	 <ul>

      <li class="edit-icon"><a href="profile.php"><i class="fas fa-times"></i></</a></li>

      <li class="edit-name"><a>Edit Profile</a></li>

      <li class="edit-icon"><button type="submit" name="submit" style="border: none; background-color: #f0f0f0;"><a style="color: #3897f0;"><i class="fas fa-check"></i></a></button></li>

      

    </ul>
 </div>

 <div class="edit-main-container">


<div class="edit-image-container">

        

    <form action="?" method="POST" enctype="multipart/form-data">
        <img name="Photopic" src="pin.png" id="profileimage" alt="your image">        
        <input type="file" name="file" id="input_file" onchange="readURL(this);" accept="imagefile" value="Upload"></input>
        
            

    </div>




     <div class="edit-profile-detail-container">
     	<label><b>Name<B></label>
     	<input type="text" name="fullname" placeholder="Full name"value="<?php  echo $fullname; ?>">

     	<label>username</label>
     	<input type="text" name="username" placeholder="Username" value="<?php echo $username;   ?>">

     	<label>website</label>
     	<input type="text" name="website" placeholder="Website" >

     	<label>Bio</label>
     	<input type="text" name="bio" placeholder="Bio">
 	

    </div>

    <div class="edit-profile-detail-container">
    	  <h6>Try Instagram Business Tools</h6>
 	

    </div>

    <div class="edit-profile-detail-container">
    	<label>Private Infomation</label>
     	<input type="text" name="email" placeholder="E-mail Address " value="<?php echo $email; ?>">

     	<label>Phone Number</label>
     	<input type="text" name="phonenumber" placeholder="Enter your Phone Number">

     	<label>Gender</label>
     	<input type="text" name="gender" placeholder="Not specified ">

     	
 	

    </div>

</form>
 </div>

		







	<script type="text/javascript">

		         function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#profileimage').attr('src', e.target.result);
        }

       reader.readAsDataURL(input.files[0]);
    }
}
$("#input_file").change(function(){
    readURL(this);
});




	</script>
    </body>
</html>

