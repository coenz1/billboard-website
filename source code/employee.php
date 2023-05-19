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
	
    <div class="container-fluid" style="margin-top:80px">
		<a class="btn btn-success" href="index.php?page_layout=add_emp">Add employee</a>
        <div class="card" style="width:1220px;padding-top:20px">
			<div class="card-header">
				<h1>Employee list</h1>
			</div>
            <div class="card-body">
				<table class="table">
					<tr>
						<th style="margin:auto">Name</th>
						<th style="margin:auto">Birth</th>
						<th style="margin:auto">Email</th>
						<th style="margin:auto">Phone</th>
						<th style="margin:auto">Salary</th>
						<th style="margin:auto">Position</th>
						<th></th>
						<th></th>
					</tr>
					<?php
					$host = "localhost";
					$user = "root";
					$pass = "";
					$database = "database";
					$ketnoi = new mysqli($host,$user,$pass,$database);
					mysqli_set_charset($ketnoi,"utf8");
					if($ketnoi->connect_error){
						die("".$ketnoi->connect_error);
					}else{
						echo "";
					}
														
					$truyvan = "SELECT * FROM `employee`";
					$data = mysqli_query($ketnoi,$truyvan);
														
					while($row = mysqli_fetch_assoc($data)){
					?>
						<tr>
							<td style="margin:auto"><?php echo "".$row["employeeName"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["birthDate"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["email"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["phone"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["salary"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["position"]; ?></td>
							<td><a href="index.php?page_layout=ed_emp&id=<?php echo $row['employeeID']?>">Edit</a></td>
							<td><a onclick="return Del_emp('<?php echo $row['employeeName']; ?>')" href="index.php?page_layout=del_emp&id=<?php echo $row['employeeID']?>">Delete</a></td>
						</tr>
					<?php } ?> 
				</table>
			</div>
        </div>
    </div>
</body>
</html>
<script>
	function Del_emp(name){
		return confirm("Bạn có muốn xóa nhân viên "+name+"?");
	}
</script>