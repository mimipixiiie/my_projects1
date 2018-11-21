<?php
if(isset($_GET["eid"])){
	include("sessionstart1.php");
include("dbconnect1.php");


$eid=$_GET["eid"];
			$update=mysqli_query($conn,"update Employee_Application set LeaveStatus=1 where Employee_Id ='$eid'");
			$update=mysqli_query($conn,"update Employee_Application 
							set Status_Approve_Or_Not=1 where Employee_Id ='$eid'");
	$sql="select * from Employee_Application  where Employee_Id ='$eid'";
	$res=mysqli_query($conn,$sql);
	$ob=mysqli_fetch_object($res);
	$d2=$ob->ToDate;
	$d1=$ob->FromDate;
    $day= floor( ( strtotime($d2) - strtotime($d1)  ) / (60 * 60 * 24) ) +1 ;
			$update=mysqli_query($conn,"update Employee_Database 
							set breaks=breaks-'$day' where Employee_Id ='$eid'");

	header('Location:appAd1.php');
}


?>