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
        <div class="card" style="width:1220px;padding-top:20px">
			<div class="card-header">
				<h1>Customer list</h1>
			</div>
            <div class="card-body">
				<table class="table">
					<tr>
						<th style="margin:auto">User name</th>
						<th style="margin:auto">Password</th>
						<th style="margin:auto">Name</th>
						<th style="margin:auto">Birth</th>
						<th style="margin:auto">Email</th>
						<th style="margin:auto">Phone</th>
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
														
					$truyvan = "SELECT * FROM `account`";
					$data = mysqli_query($ketnoi,$truyvan);
														
					while($row = mysqli_fetch_assoc($data)){
					?>
						<tr>
							<td style="margin:auto"><?php echo "".$row["username"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["password_mk"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["hoten"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["ngaysinh"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["email"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["sdt"]; ?></td>
							<td><a onclick="return Del_cus('<?php echo $row['username']; ?>')" href="index1.php?page_layout=del_cus&id=<?php echo $row['id']?>">Delete</a></td>
						</tr>
					<?php } ?> 
				</table>
			</div>
        </div>
    </div>
<script>
	function Del_cus(name){
		return confirm("Bạn có muốn xóa khách hàng "+name+"?");
    }
</script>
</body>
</html>