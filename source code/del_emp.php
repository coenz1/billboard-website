<?php
	$id = $_GET['id'];
	$truyvan = "DELETE FROM employee where employeeID = $id";
	$data = mysqli_query($ketnoi,$truyvan);
	header('location: employee.php');
?>