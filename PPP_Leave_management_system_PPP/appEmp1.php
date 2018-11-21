<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checklogin1.php");?>
<?php

$d1 = $d2 = $cause = "";
$d1Err = $d2Err = $cErr = $cErr1= "";
$gotoEm=0;
$go=0;
$id=$_SESSION["username"];

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
  if(!empty($_POST["submit1"])) {
	  header('Location:home1.php');
  }
  if(!empty($_POST["submit4"])) {
		$gotoEm=1;
	  //header('Location:home1.php');
  }
  if(!empty($_POST["submit3"])) {
		$go=1;
		$gotoEm=1;
	  //header('Location:home1.php');
  }
  if($gotoEm==0){
	  if (empty($_POST["cause"])) {
		$cErr = "Cause is required";
		$gotoEm=1;
	  }  else {
		$cause = test_input($_POST["cause"]);
	  }
		

	  if (empty($_POST["d1"])) {
		$d1Err = "Date is required";
		$gotoEm=1;
	  } else {
		$d1 = $_POST["d1"];
	  }
	  
	  if (empty($_POST["d2"])) {
		$d2Err = "Date is required";
		$gotoEm=1;
	  } else {
		$d2 = $_POST["d2"];
	  }
  }

} else{ $gotoEm=1;
}
  
  

  
  
if($gotoEm==0){
	$select=mysqli_query($conn,"select * from Employee_Application where Employee_Id ='$id'");
	if($select->num_rows >0){
		$delete=mysqli_query($conn," delete from  Employee_Application where  Employee_Id ='$id'");
	}
	$insert=mysqli_query($conn,"insert into Employee_Application
				(Employee_Id ,cause,ToDate,FromDate,LeaveStatus,Status_Approve_Or_Not)
				values('$id','$cause','$d2','$d1',0,0)");
						
//    $year= intval(date('Y', time() - strtotime($d2)  ) ) -1970 ;	
	if($insert) {
		$go=2;
	  //header('Location:home1.php');
	} else {
	echo "Something went wrong  :(  ";
	}
    $day= floor( ( strtotime($d2) - strtotime($d1)  ) / (60 * 60 * 24) ) +1 ;
	$select=mysqli_query($conn,"select * from Employee_Database where Employee_Id ='$id'");
	if($select->num_rows >0){
		$ob=mysqli_fetch_object($select);
		if($day <= $ob->breaks ){
			$update=mysqli_query($conn,"update Employee_Application set LeaveStatus=1 where Employee_Id ='$id'");
			$update=mysqli_query($conn,"update Employee_Application 
							set Status_Approve_Or_Not=1 where Employee_Id ='$id'");
			$update=mysqli_query($conn,"update Employee_Database 
							set breaks=breaks-'$day' where Employee_Id ='$id'");
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Leave Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
<?php include("s1.php");?>
</style>
</head>
<body class="formback">

<?php 
	if($go==1){
		$chk="";
		$select=mysqli_query($conn,"select * from Employee_Application where Employee_Id ='$id'");
		if($select->num_rows >0){
			$ob=mysqli_fetch_object($select);
			$chk=$ob->LeaveStatus;
			if($chk==1){
				$sts=$ob->Status_Approve_Or_Not;
				if($sts==1){
					$go=3;
				}else{
					$go=4;
				}
			}else{
				$go=5;
			}
		}else{
			$go=6;
		}
	}		
?>



<dialog class="design" <?php if($go!=0){ ?> open <?php } ?> >

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<?php if($go==2){ ?>  Submission Successful! <br>
<?php } ?>
<?php if($go==3){ ?>  Application Accepted! <br>
<?php } ?>
<?php if($go==4){ ?>  Application Rejected! <br>
<?php } ?>
<?php if($go==5){ ?>  Application not processed yet! <br>
<?php } ?>
<?php if($go==6){ ?>  No Application Submitted yet! <br>
<?php } ?>
  <input type="submit" name="submit4" value="OK">
</form>



</dialog>


<div>
<div class="form">
<form name="f2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                  <input type="submit" name="submit3" value="Status Check"  >
</form>
				  <h2>Application Form</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span class="r">*	Required Fields </span><br>
                  <label for="cause" id="preinput"> Cause of Leave 	 </label> <br>
                  <input type="text" name="cause" placeholder="Enter Cause of Leave" id="inputid">
					<span class="r">*	<?php echo $cErr;?> </span>
					<span class="r">	<?php echo $cErr1;?> </span>
  <br>
                  <label for="d1" id="preinput">  From Date  </label> <br>
                  <input type="date" name="d1" id="inputid">
					<span class="r">*	<?php echo $d1Err;?> </span>
  <br>
                  <label for="d2" id="preinput">  To Date  </label> <br>
                  <input type="date" name="d2" id="inputid">
					<span class="r">*	<?php echo $d2Err;?> </span>
  <br>
  <hr>
                  <input type="submit" name="submit1" value="Back" id="inputid" >
                  <input type="submit" name="submit2" value="Ok" id="inputid" >
  <br>

</form>
</div>
</div>




</body>
</html>
