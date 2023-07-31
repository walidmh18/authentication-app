<?php
include('./connection.php');
session_start();
if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordConfirm'])) {
   if (!empty($_POST['password']) && $_POST['password'] == $_POST['passwordConfirm']) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];
      $email = $_SESSION['email'];
      $id = $_SESSION['id'];

      echo '<pre>';
      print_r($_SESSION);
      echo '</pre>';

      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['phone'] = $phone;

      $sql = "UPDATE users SET 
      username = '$username',
      password = '$password',
      phone = '$phone'

      WHERE id='$id'";

      $res = mysqli_query($con,$sql);
      
      header('Location: ./profile');
   }
}



?>