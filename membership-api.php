<?php

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
include 'dbconnection.php';
$sql = "SELECT * FROM `membership`";
$result = mysqli_query($conn,$sql) or die("Failed");

if (mysqli_num_rows($result) > 0) {
	
	$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output);

}
else
{
	echo json_encode(array('message'=>'No Record Found','status'=>false));
}
?>
