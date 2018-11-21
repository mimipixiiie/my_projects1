<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("logout1.php");?>
<?php

$id = $pw = $name =$email = $type = "";
$idErr = $idErr1 = $pwErr = $pwErr1 = $pwErr2 = $pwErr3 = $nameErr =$emailErr = $typeErr = "";
$gotoAd=0;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
  if(!empty($_POST["submit1"])) {
	  header('Location:loginAdmin1.php');
  }
  if(empty($_POST["id"])) {
    $idErr = "username is required";
	$gotoAd=1;
  }  else {
	$id = test_input($_POST["id"]);
	$result=mysqli_query($conn,"select Admin_Username from Admin_Login where Admin_Username='$id'");
	if($result->num_rows > 0 ) {    
		$idErr1= "username already exists. Try new username";
		$gotoAd=1;
	} else{
		$id = test_input($_POST["id"]);
	}
  }
  
  if (empty($_POST["pw"])) {
    $pwErr = "password is required";
	$gotoAd=1;
  } else if(empty($_POST["pw1"])){
    $pwErr1 = "confirm your password";
	$gotoAd=1;
  } else if($_POST["pw"]!=$_POST["pw1"]){
    $pwErr2 = "password doesn't match";
	$gotoAd=1;
  } else{
    $pw = test_input($_POST["pw"]);
  }

}else{ $gotoAd=1;
}
  
if($gotoAd==0){
$insert=mysqli_query($conn,"insert into Admin_Login(Admin_Username,Admin_Password,status)
					values('$id','$pw',0)");
  if($insert) {
	  header('Location:loginAdmin1.php');
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
<h2>Admin Registration</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span class="r">*	Required Fields </span><br>
                  <label for="id" id="preinput"> Username 	 </label> <br>
                  <input type="text" name="id" placeholder="Enter username" id="inputid">
					<span class="r">*	<?php echo $idErr;?> </span>
					<span class="r">	<?php echo $idErr1;?> </span>
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
  <hr>
                  <input type="submit" name="submit1" value="Back" id="inputid" >
                  <input type="submit" name="submit2" value="Ok" id="inputid" >
  <br>

</form>
</div>

</body>
</html>
