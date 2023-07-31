<?php 
include('connection.php');
session_start();

if (isset($_POST['submit'])) {
   $sessionPassword = $_SESSION['password'];
   $prev = $_POST['prevPass'];
   $prevCon = $_POST['prevPassConfirm'];

   if ($sessionPassword == $prev && $prev == $prevCon && isset($_POST['password'])) {
   $password = $_POST['password'];
   $id = $_SESSION['id'];
      

   $sql = "UPDATE users
   SET
   
   password = '$password'

   WHERE id='$id'
   ";
   $res = mysqli_query($con,$sql);

   $_SESSION['password'] = $password;
      header("Location:profile?msg=password changed");
   } else if($prev != $prevCon){
      header("Location:change-password?error=please confirm your previous password");
   } else if($prev != $sessionPassword){
      header("Location:change-password?error=previous password is wrong");
   }

}






?>