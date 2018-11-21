<?php
$conn= new mysqli("localhost","root","","lms");
	if ($conn->connect_error) {
		die("Database connection failed: " . $conn->connect_error);
	} 
?>
