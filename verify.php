

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <style>
  #name-center{
    text-align:center;
  }
  </style>
<!--===============================================================================================-->
</head>
<body>
   
<br><br>


   <?php
   include 'dbconnection.php';
   session_start();

   if (isset($_SESSION['tmp_username'])) {
    echo '<h1 id="name-center">Welcome   ' . $_SESSION['tmp_username']."</h1>";
   } else {
       header('location:index.php');
   }

   if (isset($_POST['submitbtn'])) {
       session_start();
       session_unset();
       session_destroy();
       header('location:index.php');
   }
   ?>
<div class="container">
  <div class="row">
    <div class="col-md-6"></div>
        <div class="col-md-5"></div>
            <div class="col-md-1">

</div>
  </div>
</div>
<br><br>

  <div class="container">
     <div class="row" style="margin-top:50px;">
              <div class="col-md-3"></div>
        <div class="col-md-6 " style="-webkit-box-shadow: 1px 2px 22px 4px grey;
-moz-box-shadow: 1px 2px 22px 4px grey;
box-shadow: 1px 2px 22px 4px grey;border-radius: 25px;padding:50px">
           
       
   
           <form action="verify.php" method="POST" class=""> <br>
<h2 class="text-center"> Please Verify </h2><br><br>
 
<input type="password" name="key" placeholder="Enter Security Key" class="form-control"><br>
<br>
<input type="submit" name="verify" value="Verify" class="btn btn-info btn-block">
<br><br>
   </form>

   
<?php
if (isset($_POST['verify'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'aa_tracker');
    $key = $_POST['key'];
    $query = "SELECT * FROM `key` WHERE `key`='$key'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)>0) {
        session_start();
        $_SESSION['username'] = $_SESSION['tmp_username'];
        header('location:admin.php');
    } else {
        echo "<script>alert('Security Key Not Found')</script>";
    }
}
?>
        </div>
        <div class="col-md-3"></div>
         
     </div>
      
  </div>

<script type="text/javascript" src="js/jquery.js"></script>

<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
</body>
</html>