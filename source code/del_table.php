<?php
	$id = $_GET['id'];
	$truyvan = "DELETE FROM billiards where tableID = $id";
	$data = mysqli_query($ketnoi,$truyvan);
	header('location: admin.php');
?>