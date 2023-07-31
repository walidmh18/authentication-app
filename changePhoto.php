<?php 
include('connection.php');
session_start();
$id = $_SESSION['id'];

if (isset($_FILES['image'])) {
   
   
   
   $image_type = $_FILES['image']['type'];

  switch ($image_type) {
   case 'image/png':
      $type = '.png';
      break;
   case 'image/jpg':
      $type = '.jpg';
      break;
   case 'image/jpeg':
      $type = '.jpeg';
      break;    
   case 'image/gif':
      $type = '.gif';
      break;      
   default:
      $type= 'jpg';
      break;
  }


   $_FILES['image']['name'] = time().uniqid(rand()).$type;
   $image_name = $_FILES['image']['name'];
   $image_link = 'http://localhost/authentication-app/profile_pictures/'.$image_name;
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   
   $target = "profile_pictures/".basename($_FILES['image']['name']);
   
   $info = getimagesize($_FILES['image']['tmp_name']);
   $sql = "UPDATE users SET picture = '$image_link' WHERE id='$id'";
   
   if ($info === FALSE) {
      header("Location: change-info?status=fail&error=Sorry, an error occurred. Please enter a valid image.");
      
   } else if ($image_size> 3000000) {
      header("Location: change-info?status=fail&error=Sorry, The file is too large.");
      
   } else if (move_uploaded_file($image_tmp_name, $target)) {
      mysqli_query($con , $sql);
      $_SESSION['image']=$image_link;
         header("Location: profile?status=loading&n=$image_name");
      
   }
   else{
         header("Location: change-info?status=fail&error=Sorry, an error occurred. Please try again.");
        

   }
}
