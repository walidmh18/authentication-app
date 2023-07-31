<?php 
function includeHead($title) {
   include("./head.php");
}
includeHead('Authentication');


if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
   header('Location: profile');
} else {
   header('Location: login');
}

?>
<body>
   
</body>
</html>