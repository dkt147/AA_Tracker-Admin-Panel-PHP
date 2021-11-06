<?php
include 'dbconnection.php';
if (isset($_POST['save'])) {
    $user = $_POST['user'];
    $group = $_POST['group'];
    if(isset($_SESSION['username']))
    {
    session_start();
    $by = $_SESSION['username'];
    }
    $key = $_POST['key'];
    $query2 = "SELECT * FROM `key` WHERE `key`='$key'";
    $result2 = mysqli_query($conn, $query2);

    if (mysqli_num_rows($result2)>0) {
        session_start();
        $_SESSION['s_user'] = $user;
        $_SESSION['s_group'] = $group;
        $_SESSION['s_by'] = $by;
        
        header("Location: new.php");
        die();

    } else {
        echo "<script>alert('Security Key Not Found')</script>";
    }

    // $user = $_POST['user'];
    // $group = $_POST['group'];
    // $status = $_POST['status'];
    // $by = $_SESSION['username'];

  
    // $sql2 = "SELECT * from `membership` where user_name='$user'";
    // $res2 = mysqli_query($conn,$sql2);
    
    // if($row3 = mysqli_num_rows($res2)>0)
    // {
        
    // $query = "UPDATE `membership` SET `status`='$status',`by`='$by' WHERE user_name='$user'";

    // $result = mysqli_query($conn, $query);

    // if ($result) {

    //   $sql = "SELECT * from `membership` where user_name='$user'";
    // $res = mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($res);

    // echo "<br><br><h3 id='name-center'> User: ".$row['user_name']."</h3>";

    // } else {
    // }

    // }else
    // {
      
    // $query = "INSERT INTO `membership`(`user_name`, `group_name`, `status`, `by`) values ('$user','$group','$status','$by')";

    // $result = mysqli_query($conn, $query);

    // if ($result) {

    //   $sql = "SELECT * from `membership` where user_name='$user'";
    // $res = mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($res);

    // echo "<br><br><h3 id='name-center'> User: ".$row['user_name']."</h3>";

    // } else {
    // }

    // }



}

// If upload button is clicked ...
if (isset($_POST['save_banner'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'aa_tracker');

    //Getting Image Path...
    $target_dir = 'uploads/';
    $temp = $_FILES['file']['tmp_name'];
    $target_file = $target_dir . basename($_FILES['file']['name']);

    //Moving into a folder...
    $res = move_uploaded_file($temp, '' . $target_file);

    // Get all the submitted data from the form
    $sql = "INSERT INTO banner (`banner`) VALUES ('$target_file')";

    // Execute query
    mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: image
    if ($res) {
        $msg = 'Image uploaded successfully';
    } else {
        $msg = 'Failed to upload image';
    }
}
?>

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
              <div class="col-md-3"></div>
        <div class="col-md-6 " style="-webkit-box-shadow: 1px 2px 22px 4px grey;
-moz-box-shadow: 1px 2px 22px 4px grey;
box-shadow: 1px 2px 22px 4px grey;border-radius: 25px;padding:50px">
           
       
   
   <form action="admin.php" method="POST" class=""> <br>
<h2 class="text-center"> Membership </h2><br><br>
    <select id="load-select" name="user" class="form-control">
</select><br>
<input type="text" name="group" placeholder="Enter Group Name" class="form-control"><br>
<!-- <select id="load-select2" name="status" class="form-control">
  <option>Active</option>
  <option>Suspend</option>
</select><br> -->
<input type="password" name="key" placeholder="Enter Security Key" class="form-control"><br>
<br>
<input type="submit" name="save" value="Proceed" class="btn btn-info btn-block">
<br><hr><br>
   </form>
         
<button type="button" name="add_banner" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModalCenter">
Add Banner
</button>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Banner to Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="admin.php" method="POST" enctype="multipart/form-data">
       <input type="file" name="file">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="save_banner" value="Add" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>
        </div>
        <div class="col-md-3"></div>
         
     </div>
      
  </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){

    function loadTable(){
      $.ajax({
        url:'http://110.93.223.67:8182/api/api_mobile.php?cmd=api_load_object_list&username=BFX846&group=AA-JUNE-2021',
        type:"GET",
        success:function(data){
          $.each(data,function(key,value){
            $("#load-table").append("<tr>"+"<td>"+value["Code"]+"</td>"+"<td>"+key+"</td>"+"</tr>"
            
            
            ); 
            $("#load-select").append("<option value='"+ value["Code"]+"'>"+ value["Code"]+"</option>"
            
            
            );


          });
        }

      });

    }
    loadTable();
})
</script>

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