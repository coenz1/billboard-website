<?php
	if(isset($_POST['sbm'])){
		$employeeName = $_POST['employeeName'];
		$email = $_POST['email'];
		$birthDate = $_POST['birthDate'];
		$phone = $_POST['phone'];
		$salary = $_POST['salary'];
		$position = $_POST['position'];
			
		
		$takeid = "SELECT employeeID FROM employee";
        $takedata = mysqli_query($ketnoi, $takeid);
        $dem=0;
        while($take_up = mysqli_fetch_assoc($takedata)){
			$arrayid[$dem]=$take_up["employeeID"];
			$dem++;
        }

		$employeeID = mt_rand(1, 999);
        while(in_array($employeeID, $arrayid)){
            $employeeID = mt_rand(1, 999);
        }

		$truyvan = "INSERT INTO employee (employeeID, employeeName, email, birthDate, phone, salary, position) VALUES ('$employeeID', '$employeeName', '$email', '$birthDate', '$phone','$salary','$position')";
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
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="employeeName" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Birth</label>
					<input type="date" name="birthDate" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Salary</label>
					<input type="text" name="salary" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Position</label>
					<input type="text" name="position" class="form-control" required>
				</div>
				
				
				<button name="sbm" class="btn btn-success" type="submit">Add</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>