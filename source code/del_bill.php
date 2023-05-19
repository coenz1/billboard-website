<?php
	$id = $_GET['id'];
	$truyvan = "DELETE FROM bill where orderID = $id";
	$data = mysqli_query($ketnoi,$truyvan);
	header('location: history.php');
?>