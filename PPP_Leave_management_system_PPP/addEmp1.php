<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("logout1.php");?>
<?php

$id = $pw = $name =$designation = $sid = "";
$idErr = $idErr1 = $pwErr = $pwErr1 = $pwErr2 = $pwErr3 = $nameErr =$desErr = $typeErr =$sidErr = $sidErr1 =  "";
$gotoEm=0;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
  if(!empty($_POST["submit1"])) {
	  header('Location:loginEmp1.php');
  }
  if (empty($_POST["id"])) {
    $idErr = "EmployeeId is required";
	$gotoEm=1;
  }  else {
	$id = test_input($_POST["id"]);
	$result=mysqli_query($conn,"select Employee_Id from Employee_Database where Employee_Id='$id'");
	if($result->num_rows > 0 ) {    
		$idErr1= "EmployeeId already exists. Try new EmployeeId";
		$gotoEm=1;
	} else{
		$id = test_input($_POST["id"]);
	}
  }
	
  if (empty($_POST["sid"])) {
    $sidErr = "SecurityId is required";
	$gotoEm=1;
  }  else {
	$sid = test_input($_POST["sid"]);
	$result=mysqli_query($conn,"select Security_Id from Employee_Database where Security_Id='$sid'");
	if($result->num_rows > 0 ) {
		$sidErr1= "EmployeeId already exists. Try new EmployeeId";
		$gotoEm=1;
	} else{
		$sid = test_input($_POST["sid"]);
	}
  }
  
  if (empty($_POST["pw"])) {
    $pwErr = "Password is required";
	$gotoEm=1;
  } else if(empty($_POST["pw1"])){
    $pwErr1 = "Confirm your password";
	$gotoEm=1;
  } else if($_POST["pw"]!=$_POST["pw1"]){
    $pwErr2 = "Password doesn't match";
	$gotoEm=1;
  } else{
    $pw = test_input($_POST["pw"]);
  }

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$gotoEm=1;
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["designation"])) {
    $desErr = "Designation is required";
	$gotoEm=1;
  } else {
    $designation = test_input($_POST["designation"]);
  }

} else{ $gotoEm=1;
}
  
if($gotoEm==0){
$insert=mysqli_query($conn,"insert into Employee_Database
						(Employee_Id ,Security_Id ,Employee_Name ,Designation,password,status,breaks)
						values('$id','$sid','$name','$designation','$pw',0,20)");
  if($insert) {
	  header('Location:loginEmp1.php');
  } else {
  echo "Something went wrong  :(  ";
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
<body>

<div class="form">
<h2>Employee Registration</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span class="r">*	Required Fields </span><br>
                  <label for="id" id="preinput"> EmployeeId 	 </label> <br>
                  <input type="text" name="id" placeholder="Enter EmployeeId" id="inputid">
					<span class="r">*	<?php echo $idErr;?> </span>
					<span class="r">	<?php echo $idErr1;?> </span>
  <br>
                  <label for="sid" id="preinput"> SecurityId 	 </label> <br>
                  <input type="text" name="sid" placeholder="Enter SecurityId" id="inputid">
					<span class="r">*	<?php echo $sidErr;?> </span>
					<span class="r">	<?php echo $sidErr1;?> </span>
  <br>
				  <label for="pw" id="preinput"> Password  </label> <br>
                  <input type="password" name="pw" placeholder="Enter your password" id="inputid">
					<span class="r">*	<?php echo $pwErr;?> </span>
					<span class="r">	<?php echo $pwErr3;?> </span>
  <br>
				  <label for="pw1" id="preinput"> Confirm password  </label> <br>
                  <input type="password" name="pw1" placeholder="Re-type your password" id="inputid">
					<span class="r">*	<?php echo $pwErr1;?> </span>
					<span class="r">	<?php echo $pwErr2;?> </span>
  <br>
                  <label for="name" id="preinput"> Name  </label> <br>
                  <input type="text" name="name" placeholder="Enter your name" id="inputid">
					<span class="r">*	<?php echo $nameErr;?> </span>
  <br>
                  <label for="designation" id="preinput"> Designation  </label> <br>
                  <input type="text" name="designation" placeholder="Enter your designation" id="inputid">
					<span class="r">*	<?php echo $desErr;?> </span>
  <br>
  <hr>
                  <input type="submit" name="submit1" value="Back" id="inputid" >
                  <input type="submit" name="submit2" value="Ok" id="inputid" >
  <br>

</form>
</div>
</body>
</html>
