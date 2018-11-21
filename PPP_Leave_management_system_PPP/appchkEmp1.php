<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checklogin1.php");?>
<!DOCTYPE html>
<html>
<head>
<title>Leave Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
<?php include("s1.php");?>
</style>
</head>
<body>
<?php include("b1.php");?>


<div class="display">
<?php
$user=$_SESSION["username"];
$sql="select * from Employee_Application where  Employee_Id ='$user' 
						and Status_Approve_Or_Not=1 ";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ob=mysqli_fetch_object($res);
	$eid=$ob->Employee_Id;
	$d1=$ob->FromDate;
	$d2=$ob->ToDate;
	$day= floor( ( strtotime($d2) - strtotime($d1)  ) / (60 * 60 * 24) ) +1 ;
	$cause=$ob->cause;
	$sql="select * from Employee_Database where Employee_Id='$eid'";
	$result=mysqli_query($conn,$sql);
	$row =mysqli_fetch_object($result);
	$name=$row->Employee_Name;
	$des=$row->Designation;
	$brk=$row->breaks;
	$str="accept1.php?eid=$eid";
	$str1="reject1.php?eid=$eid";
	echo "Your leave on $cause is for $day days from $d1 to $d2 <br> ";
	if($brk >=0){
	echo "Your remaining breaks is $brk days<br> ";
	}
}else{
	echo "No forms submitted ";
}

?>
</div>






</body>
</html>
