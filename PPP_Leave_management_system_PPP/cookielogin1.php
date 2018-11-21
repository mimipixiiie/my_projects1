<?php
if(!isset($_SESSION["username"])){
if(isset($_COOKIE["username"])){
$id=$_COOKIE["username"];
$type=$_COOKIE["usertype"];

if($type=="admin"){
	$sql="select * from Admin_Login where Admin_Username='$id' and status=1 ";
	$result=mysqli_query($conn,$sql);
	if($obj=mysqli_fetch_object($result)){
			$_SESSION["username"]=$obj->Admin_Username;
			$_SESSION["userpw"]=$obj->Admin_Password;
			$_SESSION["usertype"]=$type;
	}
	mysqli_free_result($result);
}else{
	$sql="select * from Employee_Database where Employee_Id='$id'  and status=1 ";
	$result=mysqli_query($conn,$sql);
	if($obj=mysqli_fetch_object($result)){
			$_SESSION["username"]=$obj->Employee_Id;
			$_SESSION["userpw"]=$obj->Security_Id;
			$_SESSION["usertype"]=$type;
	}
	mysqli_free_result($result);
}

}
}

?>
