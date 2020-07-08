 <?php

 error_reporting(0);
include 'connection.php';
session_start();

$userid =$_SESSION['user_id'];
if(!isset($_SESSION['user_id'])){

  header("location: instagram.php");
}
 
 if(isset($_POST['submit'])){
$file_name =$_FILES['image']['name'];
$file_type= $_FILES['image']['type'];
$file_size=$_FILES['image']['size'];
$file_tem_loc= $_FILES['image']['tmp_name'];
$file_store = "instagram_posts/" .$file_name;
$post_url ='http://localhost:8080/instagram%20tutorial/instagram_posts/'.$file_name;
$caption =$_POST['caption'];
$userid =$_SESSION['user_id'];
$userid =$_SESSION['user_id'];




move_uploaded_file($file_tem_loc, $file_store);

echo "<img scr='$file_store' height='100' width'100'/>";
// save new post  other folder
$save = "instagram_posts/".$file_name;
$file = "instagram_posts/".$file_name;

list($width, $height) = getimagesize($file_store);
$image =imagecreatefromjpeg($file);
$info = getimagesize($file);
if($info['mime']=='image/jpeg'){
 $image =imagecreatefromjpeg($file);


}
elseif ($info['mime']=='image/gif') {
   $image =imagecreatefromjpeg($file);

}

//same width height
$new_width =300;

$new_height =300;
$tn =imagecreatetruecolor($new_width ,$new_height);
imagecopyresampled($tn ,$image, 0,0,0,0, $new_width ,$new_height, $width, $height);
imagejpeg($tn,$save, 60);
 



$sql = "INSERT INTO `user_post`( `user_id`, `caption`, `post_url` ) VALUES ('$userid' ,'$caption', '$post_url' )";
  if (mysqli_query($conn, $sql)) {
    
    header("location: instagram.php");
   } else {
    
   echo "Error: " . $sql . "
" . mysqli_error($conn);
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
<script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script><!-- Latest compiled JavaScript -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>

  *{
        margin: 0;                                                                     
        padding: 0;
      }
      .upload-top{
        width: 100%;
        
        top: 0;
        position: fixed;
        background-color: #f0f0f0; 
        height: 45px;
        list-style-type: none;
        
      }
          .upload-top ul{
        list-style-type: none;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0; 
         overflow: hidden;
      }


      
      .upload-start-top {
        width: 70%;
         float: left;


      }
      
      .upload-end{
        width: 30%;
        float: right;
        
      }


      li a{
        text-decoration: none;
        text-align: start;
        margin-left: 20px;
        line-height: 45px;
        font-size: 17px;


        
              }
        .upload-end a{
        text-decoration: none;
        text-align: center;
        line-height: 45px;
        font-size: 17px;
        cursor: pointer;

        
         }
         button{
          margin-left: 30px;
           }
 .upload-container{
  width: 100%;
  max-width: 768px;
  margin: auto;
  margin-top: 20px;
 }
  .upload-image-container{
  width: 100%;
  max-width: 300px;
  margin: auto;
  margin-top: 18%;
   }
 .upload-image-container img{
   width: 100%;
   height: 40%;

 }
 span input [type=file] {
  opacity: 0;

 }
 input[type=text]{

    width: 100%;
    padding: 8px;
    margin: 6px 0;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
    background-color: white;
    border: none;
         


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

<title>Instagram upload post</title>
  </head>
  <body>


 <form action="insta_post.php" method="POST" enctype="multipart/form-data">

     <div class="upload-top">     
    
           </ul>
          <li class="upload-start-top"><a><b>Share To</b></a></li>
          <li class="upload-end"><a><button style="background-color: #f0f0f0; border: none; color: #3897f0;" type="submit" name="submit"><b>Share</b></button></a></li>


         </ul>
    
    </div>

    <div class="upload-container" requ>
       <div class="upload-image-container">
          <img src="icon.jpg" id="postimage" alt="your image" required>
             <span>
            <input type="file" name="image" id="input_file" onchange="readURL(this);" accept="imagefile" value="Upload" required></input >
            </span>
            <input type="text" name="caption" placeholder="Write a caption.....">
       </div>
    </div>
 </form>



<div  class="nav-bottom">
              
  
      <ul>

        <li><a href="instagram.php" class="tab" id="tabhome"><i class="fas fa-home"></i></i></a></li>
      
        <li><a href="search.php" class="tab" id="tabsearch" ><i class="fas fa-Search"></i></a></li>
     
     
        <li><a href="#" class="tab" id="tabplus"><i class="fas fa-plus"></i></a></li>
        <li><a href="user.php" class="tab" id="heart"><i class="fas fa-heart"></i></a></li>
        <li><a href="profile.php" class="tabs" id="user"><i class="fas fa-user"></i></a></li>
        

    </ul>
   </div>





<script type="text/javascript">
 
        function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#postimage').attr('src', e.target.result);
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