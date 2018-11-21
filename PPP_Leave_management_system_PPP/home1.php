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
<hr>  <br>

<h2>Welcome <?php echo $_SESSION["username"]; ?> !</h2> 
<hr>  <br> <br>
<a href="home2.php" >Logout</a> <br> <br>
<hr>  <br>
</div>

</body>
</html>
