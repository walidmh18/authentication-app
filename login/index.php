<?php 
function includeHead($title) {
   include("../head.php");
}
includeHead('Login');
include_once('../fb-config.php');



if (isset($_SESSION['email'])) {
   
   header('Location:../profile');
}



$permissions = array('email'); // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/authentication-app/fb-callback.php', $permissions);
?>


<body>
   <div class="loginForm">
      <img src="../images/devchallenges.svg" alt="devChallenges logo" class="logo">
      <form action="../login.php" method="post">
         <h1>Login</h1>
         <?php 
         if (isset($_GET['error'])) {
            echo '<p class="errorMsg">'
            .$_GET['error'].
            '</p>' ; 
         }
         ?>
         <div class="emailInpContainer">
            <input type="email" name="email" placeholder="Email">
            <label for="email"><i class="fa-solid fa-envelope"></i></label>
         </div>
         <div class="passwordInpContainer">
            <input type="password" name="password" id="password" placeholder="Password">
            <label for="password"><i class="fa-solid fa-lock"></i></label>
         </div>
         <button type="submit" class="loginBtn" name="submit">Login</button>
      </form>
      <p>or continue with these social profiles</p>
      <div class="socialLinksContainer">
         <a href="#" class="socialLink"><img src="../images/Google.svg" alt=""></a>
         <a href="<?php echo htmlspecialchars($loginUrl); ?>" class="socialLink"><img src="../images/Facebook.svg" alt=""></a>
         <a href="#" class="socialLink"><img src="../images/Twitter.svg" alt=""></a>
         <a href="#" class="socialLink"><img src="../images/Gihub.svg" alt=""></a>
      </div>

      <p>Don't have an account yet? <a href="../register">Register</a></p>
   </div>



</body>
</html>