<?php
include('connection.php');
session_start();

if (isset($_POST['submit'])) {
   if (!empty($_POST['name'])&&
   !empty($_POST['username'])&&
   !empty($_POST['email'])&&
   // !empty($_POST['password'])&&
   !empty($_POST['phone'])) {

      
      $name = $_POST['name'];
      $username = $_POST['username'];
      $phone = $_POST['phone'];
      $bio = $_POST['bio'];
      $email = $_POST['email'];
      // $password = $_POST['password'];


      $id = $_SESSION['id'];
      

      $sql = "UPDATE users
      SET
      name = '$name',
      username = '$username',
      phone = '$phone',
      bio = '$bio',
      email = '$email'
      -- password = '$password'

      WHERE id='$id'
      ";

      $res = mysqli_query($con , $sql);
      echo mysqli_query($con , $sql);

      echo '<pre>';
      print_r(mysqli_query($con , $sql));
      echo '</pre>';
      $_SESSION['name'] = $name;
      $_SESSION['username'] = $username;
      $_SESSION['phone'] = $phone;
      $_SESSION['bio'] = $bio;
      $_SESSION['email'] = $email;
      // $_SESSION['password'] = $password;

      header("Location:profile?msg=saved changes");
   } else {
      header("Location:change-info?error=all fields are required");
   }
   # code...
}


?>