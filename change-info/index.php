<?php
include('../connection.php');
function includeHead($title) {
   include("../head.php");
}

session_start();
$img = $_SESSION['image'];
$name = $_SESSION['name'];
$username = $_SESSION['username'];
$phone = $_SESSION['phone'];
$bio = $_SESSION['bio'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$id = $_SESSION['id'];

includeHead($name.' (@'.$username.')');

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
   <section id="title">
      <a href="../profile"><i class="fa-solid fa-chevron-left"></i> Go back</a>
   </section>
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
      <form action="../changePhoto.php" method="post" enctype="multipart/form-data">
      <div class="col imageCol">
         <p class="key">photo</p>
         <label for="image">
            <img src="<?php echo $img; ?>" alt="" class="value" id="pfp">
            <div class="overlay"><i class="fa-solid fa-camera"></i></div>
            <input type="file" name="image" id="imageInp">
         </label>
         <button type="submit" id="changeImgBtn">Change Photo</button>
      </div>
      </form>
      
      <form action="../changeInfo.php" method="post">
      <div class="col ">
            <p class="key">name *</p>
            <input type="text" name="name" id="nameInp" value="<?php echo $name; ?>" placeholder="Enter your name">
         </div>

         <div class="col">
            <p class="key">username *</p>
            <input type="text" name="username" id="usernameInp" value="<?php echo $username; ?>" placeholder="Enter your username">

         </div>

         <div class="col">
            <p class="key">bio</p>
            <textarea type="text" name="bio" id="bioInp" dir="ltr" placeholder="Enter your bio"><?php echo $bio; ?></textarea>

         </div>

         <div class="col">
            <p class="key">phone *</p>
            <input type="phone" name="phone" id="phoneInp" value="<?php echo $phone; ?>" placeholder="Enter your phone number">

         </div>

         <div class="col">
            <p class="key">email *</p>
            <input type="email" name="email" id="emailInp" value="<?php echo $email; ?>" placeholder="Enter your email">

         </div>

         <!-- <div class="col">
            <p class="key">password *</p>
            <input type="password" name="password" id="passwordInp" value="<?php echo $password; ?>" placeholder="Enter your password">

         </div> -->

         <button type="submit" name="submit" id="saveChangesBtn">Save</button>
      </form>
   </section>
</body>
</html>