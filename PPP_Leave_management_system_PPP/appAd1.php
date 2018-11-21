<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checklogin1.php");?>
<?php include("checkadmin1.php");?>
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
$sql="select * from Employee_Application where LeaveStatus=0 ";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	$ctt=0;
	echo "<table>";

	echo "<tr>";
	echo "<th colspan=\"11\"><center>Employee Leave Applications</center></th>";
	echo "</tr>";

	echo "<tr>";
	echo "<th></th>";
	echo "<th>Employee Id</th>";
	echo "<th>From Date</th>";
	echo "<th>To Date</th>";
	echo "<th>Cause</th>";
	echo "<th>Employee Name</th>";
	echo "<th>Designation</th>";
	echo "<th>Remaining breaks</th>";
	echo "<th>Requested breaks</th>";
	echo "<th></th>";
	echo "<th></th>";
	echo "</tr>";
	
	$sum=0;
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
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
		echo "<tr>";
			echo "<td> $ct </td>";
			echo "<td> $eid </td>";
			echo "<td> $d1 </td>";
			echo "<td> $d2 </td>";
			echo "<td> $cause </td>";
			echo "<td> $name </td>";
			echo "<td> $des </td>";
			echo "<td> $brk </td>";
			echo "<td> $day </td>";
			echo "<td>"; ?> <a href="<?php echo $str;?>">Accept</a>	 <?php echo "</td>";
			echo "<td>"; ?> <a href="<?php echo $str1;?>">Reject</a>	 <?php echo "</td>";
		echo "</tr>";
	}

	echo "</table>";
}else{
	echo "No forms submitted ";
}

?>
</div>






</body>
</html>
