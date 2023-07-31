<?php
include('connection.php');

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM users WHERE email = '$email'";

   $result = mysqli_query($con , $sql);
   $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
   $emailCount = mysqli_num_rows($result);


   if ($emailCount == 1) {
      header("Location:register?err=email already used");
   } else {
      $sql = "INSERT INTO  users
       (name , email , phone , password)
        VALUES ('$name','$email','$phone','$password')";
      $query = mysqli_query($con , $sql);

      header('Location:login');
   }
   
}


?>