<?php
include('../connection.php');
function includeHead($title) {
   include("../head.php");
}

session_start();
$img = $_SESSION['image'];
$name = $_SESSION['name'];

$email = $_SESSION['email'];

$id = $_SESSION['id'];

includeHead('set info for '.$name);

?>

<body>
<header>

<a href="./" class="navLogo"><img src="../images/devchallenges.svg" ></a>
<div class="profile" onclick="toggleDropDown()">
   <img src="<?php echo $img; ?>" alt="">
   <p class="name"><?php echo $name; ?> <i class="fa-solid fa-chevron-down"></i></p>
   <div class="dropdownMenu">
      <ul>
         <li><a href="../profile"><i class="fa-solid fa-user"></i> My profile</a></li>
         <li><a href="#"><i class="fa-solid fa-users"></i> Group chat</a></li>
         <li class="logout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
      </ul>
   </div>
</div>
<script>
   function toggleDropDown() {
      let profile = document.querySelector('.profile');
      let dropdownMenu = document.querySelector('.dropdownMenu');
      let arrow = profile.querySelector('i')

      profile.classList.toggle('active')
      dropdownMenu.classList.toggle('active')
      arrow.classList.toggle('fa-chevron-down')
      arrow.classList.toggle('fa-chevron-up')
   }
</script>
</header>
   <section id="profile">
      <div class="top">
         <div class="text">
            <h2>Edit Info</h2>
            <p>Changes will be reflected to every service</p>
         </div>
        
      </div>
      <?php 
         if (isset($_GET['error'])) {
            echo '<p class="errorMsg">'
            .$_GET['error'].
            '</p>' ; 
         }
         ?>
      
      <form action="../setInfo.php" method="post">
      <div class="col ">
            <p class="key">username</p>
            <input type="text" name="username" id="usernameInp"  placeholder="Enter a username">

         </div>

         <div class="col ">
            <p class="key">phone number</p>
            <input type="phone" name="phone" id="phoneInp"  placeholder="Enter a phone number">

         </div>

         <div class="col">
            <p class="key">New password</p>
            <input type="password" name="password" id="passwordInp"  placeholder="Enter your New password">


         </div>
         <div class="col">
            <p class="key">Confirm password</p>
            <input type="password" name="passwordConfirm" id="passwordCon"  placeholder="Confirm your previous password">


         </div>



         <!-- <div class="col">
            <p class="key">password *</p>
            <input type="password" name="password" id="passwordInp" value="<?php //echo $password; ?>" placeholder="Enter your password">

         </div> -->

         <button type="submit" name="submit" id="saveChangesBtn">Save</button>
      </form>
   </section>

</body>
</html>