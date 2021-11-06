<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax CRUD</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
 

<form action="api-search.php" method="POST">
  <select id="load-select" name="user">
</select>
<!--<select id="load-select2" name="group">
</select>
-->
<input type="text" name="group" placeholder="Enter Group Name">
<select id="load-select2" name="status">
  <option>Paid</option>
  <option>UnPaid</option>
</select>
<input type="submit" name="save" value="Save" class="btn btn-success">
</form>


<?php
if(isset($_POST['save'])) {
	

$conn = mysqli_connect("localhost","root","","aa_tracker");

$user=$_POST['user'];
$group=$_POST['group'];
$status=$_POST['status'];

$query="INSERT INTO `membership`(`user_name`, `group_name`, `status`) values ('$user','$group','$status')";

$result= mysqli_query($conn,$query);

if($result)
{
  
}
else
{
  
}

}
?>


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
</body>
</html>
