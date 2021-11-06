
   <?php
   include 'dbconnection.php';
   session_start();

   if (isset($_SESSION['username'])) {
    echo '<h1 id="name-center">Welcome   ' . $_SESSION['username']."</h1>";
   } else {
       header('location:verify.php');
       die();
   }

   if (isset($_POST['submitbtn'])) {
       session_start();
       session_unset();
       session_destroy();
       header('location:index.php');
       die();
   }
   ?>