<?php
	$id = $_GET['id'];
	$truyvan_up = "SELECT * FROM `employee` where employeeID = $id";
	$data_up = mysqli_query($ketnoi, $truyvan_up);
	$row_up = mysqli_fetch_assoc($data_up);

	if(isset($_POST['sbm'])){
		$employeeName = $_POST['employeeName'];
		$email = $_POST['email'];
		$birthDate = $_POST['birthDate'];
		$phone = $_POST['phone'];
		$salary = $_POST['salary'];
		$position = $_POST['position'];
		
		$truyvan = "UPDATE employee SET employeeName = '$employeeName', email = '$email', birthDate = '$birthDate', phone = '$phone', salary = '$salary', position = '$position' where employeeID = $id";
		$data = mysqli_query($ketnoi, $truyvan);
		header('location: employee.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
	.table{
		border-collapse: collapse;
		width: 100%;
	}
	
	.table th,td{
		border: 1px solid black;
		padding: 8px;
	}
	
	
</style>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="admin.php">Admin</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="employee.php">Employee management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customer.php">Customer management</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="bill.php">Bill management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div> 
    </nav>
<div class="container-fluid">
	<div class="card" style="padding-top:50px">
		<div class="card-header">
			<h2>Edit</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="employeeName" class="form-control" required value="<?php echo $row_up['employeeName'];?>">
				</div>
				<div class="form-group">
					<label>Birth</label>
					<input type="date" name="birthDate" class="form-control" required value="<?php echo $row_up['birthDate'];?>">
				</div>
				<div class="form-group">
					<label>email</label>
					<input type="text" name="email" class="form-control" required value="<?php echo $row_up['email'];?>">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" class="form-control" required value="<?php echo $row_up['phone'];?>">
				</div>
				<div class="form-group">
					<label>Salary</label>
					<input type="text" name="salary" class="form-control" required value="<?php echo $row_up['salary'];?>">
				</div>
				<div class="form-group">
					<label>Position</label>
					<input type="text" name="position" class="form-control" required value="<?php echo $row_up['position'];?>">
				</div>
				
				
				<button name="sbm" class="btn btn-success" type="submit">Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>
</html>