<?php
if(isset($_GET["eid"])){
	include("sessionstart1.php");
include("dbconnect1.php");


$eid=$_GET["eid"];
			$update=mysqli_query($conn,"update Employee_Application set LeaveStatus=1 where Employee_Id ='$eid'");
			$update=mysqli_query($conn,"update Employee_Application 
							set Status_Approve_Or_Not=0 where Employee_Id ='$eid'");

	header('Location:appAd1.php');
}


?>
