<?php 
function includeHead($title) {
   include("../head.php");
}
includeHead('Register');

session_start();
if (isset($session['email'])) {
   header('Location:profile');
}
?>


<body>
   <div class="registerForm">
      <img src="../images/devchallenges.svg" alt="devChallenges logo" class="logo">
      <form action="../register.php" method="post">
         <h1>Register</h1>
         <?php 
         if (isset($_GET['error'])) {
            echo '<p class="errorMsg">'
            .$_GET['error'].
            '</p>' ; 
         }
         ?>
         <div class="emailInpContainer">
            <input type="email" name="email" placeholder="Email" required>
            <label for="email"><i class="fa-solid fa-envelope"></i></label>
         </div>

         <div class="nameInpContainer">
            <input type="name" name="name" placeholder="Name" required>
            <label for="name"><i class="fa-solid fa-user"></i></label>
         </div>

         <div class="phoneInpContainer">
            <input type="phone" name="phone" placeholder="Phone Number" required>
            <label for="phone"><i class="fa-solid fa-phone"></i></label>
         </div>
         <div class="passwordInpContainer">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password"><i class="fa-solid fa-lock"></i></label>
         </div>
         <button type="submit" class="loginBtn" name="submit">Register</button>
      </form>
      <p>or continue with these social profiles</p>
      <div class="socialLinksContainer">
         <a href="#" class="socialLink"><img src="../images/Google.svg" alt=""></a>
         <a href="#" class="socialLink"><img src="../images/Facebook.svg" alt=""></a>
         <a href="#" class="socialLink"><img src="../images/Twitter.svg" alt=""></a>
         <a href="#" class="socialLink"><img src="../images/Gihub.svg" alt=""></a>
      </div>

      <p>Already a Member? <a href="../login">Login</a></p>
   </div>



</body>
</html>