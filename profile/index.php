<?php
include('../connection.php');
function includeHead($title) {
   include("../head.php");
}

session_start();

if (!isset($_SESSION['email'])) {
   header('Location:../login');
}
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
      <h1>Personal info</h1>
      <p>Basic info, like your name and photo</p>
   </section>
   <div class="msgContainer">
      <?php
         if (isset($_GET['msg'])) {
            echo '<p class="successMsg">'.$_GET['msg'].'</p>';
         }
      ?>
   </div>

   <section id="profile">
      <div class="top">
         <div class="text">
            <h2>Profile</h2>
            <p>Some info may be visible to other people</p>
         </div>
         <a href="../change-info" class="editBtn">Edit</a>
      </div>
      <div class="col">
         <p class="key">photo</p>
         <img src="<?php echo $img; ?>" alt="" class="value">
      </div>

      <div class="col">
         <p class="key">name</p>
         <p class="value"><?php echo $name; ?></p>
      </div>

      <div class="col">
         <p class="key">username</p>
         <p class="value"><?php echo $username; ?></p>
      </div>

      <div class="col">
         <p class="key">bio</p>
         <p class="value"><?php echo $bio; ?></p>
      </div>

      <div class="col">
         <p class="key">phone</p>
         <p class="value"><?php echo $phone; ?></p>
      </div>

      <div class="col">
         <p class="key">email</p>
         <p class="value"><?php echo $email; ?></p>
      </div>

      <div class="col">
         <p class="key">password</p>
         <p class="value"><?php for ($i=0; $i < strlen($password); $i++) { 
            echo '*';
         }  ?></p>
         <a href="../change-password" class="changePasswordBtn"
         style="align-self: flex-end; float:right;"
         >Change password</a>
      </div>

   </section>
</body>
</html>