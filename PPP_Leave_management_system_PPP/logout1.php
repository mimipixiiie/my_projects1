<?php
if(isset($_SESSION["username"])){
	$id=$_SESSION["username"];
	$type=$_SESSION["usertype"];
	if($type=="admin"){
		$sql="update Admin_Login set status=0 where Admin_Username='$id' ";
	}else{
		$sql="update Employee_Database set status=0 where Employee_Id='$id' ";
	}
	if ($result=mysqli_query($conn,$sql)){
	session_destroy();
	}else{
		echo "Something went wrong :(";
	}
}
?>
