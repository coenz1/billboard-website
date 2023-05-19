<?php
	$id = $_GET['id'];
	$truyvan = "DELETE FROM account where id = $id";
	$data = mysqli_query($ketnoi,$truyvan);
	header('location: customer.php');
?>