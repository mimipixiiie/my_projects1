<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php
if(isset($_SESSION["username"])){
	header('Location:home1.php');
}

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
	  header('Location:home2.php');
  }
  if(!empty($_POST["submit3"])) {
	  header('Location:addEmp1.php');
  }
  if (empty($_POST["id"])) {
    $idErr = "EmployeeId is required";
	$gotoEm=1;
  }  else {
	$id = test_input($_POST["id"]);
  }
	
  if (empty($_POST["sid"])) {
    $sidErr = "SecurityId is required";
	$gotoEm=1;
  }  else {
	$sid = test_input($_POST["sid"]);
  }
  
} else{ $gotoEm=1;
}
  
if($gotoEm==0){

$userid=mysqli_query($conn,"select Employee_Id from Employee_Database where Employee_Id='$id'");
if($userid->num_rows > 0){
	$userpw=mysqli_query($conn,"select Security_Id from Employee_Database where Security_Id='$sid'
							and  Employee_Id='$id' ");
	if($userpw->num_rows > 0){
		$update=mysqli_query($conn,"update Employee_Database set status=1 where Employee_Id='$id'");
		
		$_SESSION["username"]=$id;
		$_SESSION["userpassword"]=$sid;
		$_SESSION["usertype"]="emp";
		if(!empty($_POST["remember"])){
			setcookie("username",$id,(time()+(365*24*60*60)) );
			setcookie("usertype","emp",(time()+(365*24*60*60)) );
		}else{
			if(isset($_COOKIE["username"])) {
				setcookie("username","",time() - 3600);
				setcookie("usertype","",time() - 3600);
			}
		}
		if(isset($_SESSION["username"])){
			header('Location:home1.php');
		}
	}
	else{
		$sidErr1 = "SecurityId doesn't match";
	}
} else {
	$idErr1 = "No such Employee exists";
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
<h2>Employee Login</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                  <input type="submit" name="submit3" value="New Register" id="inputid" ><br><br>
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
  <br>
				  <input type="checkbox" name="remember" value="yes" checked  > Remember Me
  <br>
  <hr>
                  <input type="submit" name="submit1" value="Back" id="inputid" >
                  <input type="submit" name="submit2" value="Ok" id="inputid" ><br>
  <br>

</form>
</div>


</body>
</html>
