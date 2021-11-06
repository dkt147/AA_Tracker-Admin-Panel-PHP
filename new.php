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
<?php include 'session.php'?>

<div class="container">
  <div class="row">
    <div class="col-md-6"></div>
        <div class="col-md-5"></div>
            <div class="col-md-1">
            
            <form action="admin.php" method="post" style="margin-left: 150px">
            
  <input type="submit" value="Logout" name="submitbtn" class="btn btn-danger">
</form>

</div>
  </div>
</div>
<br><br>

  <div class="container">
     <div class="row" style="margin-top:50px;">
              <div class="col-md-3"><h1><a href="admin.php"><i class="fa fa-arrow-circle-left" style="font-size:36px"></i></a></h1></div>
        <div class="col-md-6 " style="-webkit-box-shadow: 1px 2px 22px 4px grey;
-moz-box-shadow: 1px 2px 22px 4px grey;
box-shadow: 1px 2px 22px 4px grey;border-radius: 25px;padding:50px">
           
           <?php
include 'dbconnection.php';
if (isset($_POST['save'])) {

  
    $user   = $_POST['username'];
    $group = $_POST['group'];
    $status = $_POST['status'];
    $by      = $_SESSION['username'];

  
    $sql2 = "SELECT * from `membership` where user_name='$user'";
    $res2 = mysqli_query($conn,$sql2);
    
    if($row3 = mysqli_num_rows($res2)>0)
    {
        
    $query = "UPDATE `membership` SET `status`='$status',`by`='$by' WHERE user_name='$user'";

    $result = mysqli_query($conn, $query);

    if ($result) {

    //echo "<br><br><h3 style='color:green'> User Updated Successfully !</h3>";

    } else {
    }

    }
    else
    {
      
    $query = "INSERT INTO `membership`(`user_name`, `group_name`, `status`, `by`) values ('$user','$group','$status','$by')";

    $result = mysqli_query($conn, $query);

    if ($result) {

    //echo "<br><br><h3 style='color:green'> User Updated Successfully !</h3>";

    } else {
    }

    }



}

// // If upload button is clicked ...
// if (isset($_POST['save_banner'])) {
//     $conn = mysqli_connect('localhost', 'root', '', 'aa_tracker');

//     //Getting Image Path...
//     $target_dir = 'uploads/';
//     $temp = $_FILES['file']['tmp_name'];
//     $target_file = $target_dir . basename($_FILES['file']['name']);

//     //Moving into a folder...
//     $res = move_uploaded_file($temp, '' . $target_file);

//     // Get all the submitted data from the form
//     $sql = "INSERT INTO banner (`banner`) VALUES ('$target_file')";

//     // Execute query
//     mysqli_query($conn, $sql);

//     // Now let's move the uploaded image into the folder: image
//     if ($res) {
//         $msg = 'Image uploaded successfully';
//     } else {
//         $msg = 'Failed to upload image';
//     }
// }
?>
   <form action="new.php" method="POST" class=""> <br>
<h2 class="text-center"> Update Status </h2><br><br>
<input class="form-control" type="text" name="username" value="
<?php
if(isset($_SESSION['s_user']))
{
  echo $_SESSION['s_user'];
}else
{
  echo 'Null';
}
?>

"><br>
<input class="form-control" type="text" name="group" value="
<?php
if(isset($_SESSION['s_group']))
{
  echo $_SESSION['s_group'];
}else
{
  echo 'Null';
}
?>

"> 
<br>
 <select id="load-select2" name="status" class="form-control">
  <option>Active</option>
  <option>Suspend</option>
</select><br>
<br>
<input type="submit" name="save" value="Save" class="btn btn-info btn-block">
<br><br>
   </form>
         

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