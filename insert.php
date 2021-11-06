<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
<!--===============================================================================================-->
</head>
<body>
    <?php
include('dbconnection.php');
session_start();
    

if(isset($_SESSION["username"]))
{
    echo "Welcocme !!  " . $_SESSION["username"];
}
else 
{
    header('location:login.php');
}


?>
<br><br>
<form action="insert.php" method="post" ><input type="submit" value="Logout" name="submitbtn">

</form>
<?php
    if(isset($_POST['submitbtn']))
        
    {   
        session_start();
        session_unset();
        session_destroy();
        header('location:login.php');
    }
    ?>
<br><br>

  <div class="container">
     <div class="row" style="margin-top:50px;">
        <div class="col-md-6 " style="-webkit-box-shadow: 1px 2px 22px 4px rgba(0,0,0,0.75);
-moz-box-shadow: 1px 2px 22px 4px rgba(0,0,0,0.75);
box-shadow: 1px 2px 22px 4px rgba(0,0,0,0.75);
">
           
       
   
   <form action="insertdata.php" method="post"> 
   <h2 class="text-center"> Form </h2>
   <input type="text" placeholder="Tracker ID" name="tracker_id" required class="form-control">
   <br><br>
    <input type="text" placeholder="Group ID" name="group_id" required class="form-control">
    <br><br>
    <input type="text" placeholder="Payment" name="payment" required class="form-control">
    <br><br>
<!--
    <input type="file" name="image" required class="form-control">
      <br><br>
-->
      <input type="submit" value="Insert" name="insertbtn" class="btn btn-info btn-block">
      <br>
       

       
   </form>
         
        </div>
         
     </div>
      
  </div>


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