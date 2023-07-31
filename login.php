<?php
include('./connection.php');
if (isset($_POST['submit'])) {
   
   $email = $_POST['email'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM users WHERE email = '$email'";

   $result = mysqli_query($con , $sql);
   $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
   $emailCount = mysqli_num_rows($result);


   if ($emailCount == 1 && $row['password'] == $password) {


      session_start();
      $_SESSION['name'] = $row['name'];
      $_SESSION['image'] = $row['picture'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['bio'] = $row['bio'];
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;

      $_SESSION['id'] = $row['id'];
      header("Location:profile");
   } else  {
     
   
      header('Location:login?error=wrong email or password');
   }

}



?>