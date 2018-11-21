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
	  header('Location:addAdmin1.php');
  }
  if (empty($_POST["id"])) {
    $idErr = "username is required";
	$gotoEm=1;
  }  else {
	$id = test_input($_POST["id"]);
  }
	
  if (empty($_POST["sid"])) {
    $sidErr = "password is required";
	$gotoEm=1;
  }  else {
	$sid = test_input($_POST["sid"]);
  }
  
} else{ $gotoEm=1;
}
  
if($gotoEm==0){

$userid=mysqli_query($conn,"select Admin_Username from Admin_Login where Admin_Username='$id'");
if($userid->num_rows > 0){
	$userpw=mysqli_query($conn,"select Admin_Password from Admin_Login where Admin_Password='$sid'
							and  Admin_Username='$id' ");
	if($userpw->num_rows > 0){
		$update=mysqli_query($conn,"update Admin_Login set status=1 where Admin_Username='$id'");
		
		$_SESSION["username"]=$id;
		$_SESSION["userpassword"]=$sid;
		$_SESSION["usertype"]="admin";
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
		$sidErr1 = "password doesn't match";
	}
} else {
	$idErr1 = "No such admin exists";
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
<h2>Admin Login</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                  <input type="submit" name="submit3" value="New Register" id="inputid" ><br>
<span class="r">*	Required Fields </span><br>
                  <label for="id" id="preinput"> username 	 </label> <br>
                  <input type="text" name="id" placeholder="Enter username" id="inputid">
					<span class="r">*	<?php echo $idErr;?> </span>
					<span class="r">	<?php echo $idErr1;?> </span>
  <br>
                  <label for="sid" id="preinput"> password 	 </label> <br>
                  <input type="text" name="sid" placeholder="Enter password" id="inputid">
					<span class="r">*	<?php echo $sidErr;?> </span>
					<span class="r">	<?php echo $sidErr1;?> </span>
  <br>
  <br>
				  <input type="checkbox" name="remember" value="yes" checked  > Remember Me
  <br>
  <hr>
                  <input type="submit" name="submit1" value="Back" id="inputid" >
                  <input type="submit" name="submit2" value="Ok" id="inputid" >
  <br>

</form>
</div>

</body>
</html>
