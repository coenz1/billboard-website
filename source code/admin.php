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
<body>
    <body style="height:1500px">
    <!-- Navigation bar -->
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
    <!-- Add table -->
    <div class="container-fluid" style="margin-top:80px">
		<a class="btn btn-success" href="index_table.php?page_layout=add_table">Add table</a>
        <div class="card" style="width:1220px;padding-top:20px">
			<div class="card-header">
				<h1>Table list</h1>
			</div>
            <div class="card-body">
				<table class="table">
					<tr>
                        <th style="margin:auto">Table ID</th> 
						<th style="margin:auto">Number</th>
						<th style="margin:auto">Type</th>
						<th style="margin:auto">Price</th>
						<th></th>
						<th></th>
					</tr>
					<?php
                    // Connect to data base
					$host = "localhost";
					$user = "root";
					$pass = "";
					$database = "database";
					$ketnoi = new mysqli($host,$user,$pass,$database);
                    mysqli_set_charset($ketnoi,"utf8");
                    // Connect code
					if($ketnoi->connect_error){
						die("".$ketnoi->connect_error);
					}else{
						echo "";
                    }
                    									
					$truyvan = "SELECT * FROM `billiards`";
					$data = mysqli_query($ketnoi,$truyvan);
														
					while($row = mysqli_fetch_assoc($data)){
					?>
						<tr>
							<td style="margin:auto"><?php echo "".$row["tableID"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["numbers"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["types"]; ?></td>
							<td style="margin:auto"><?php echo "".$row["prices"]; ?></td>
							<td><a href="index_table.php?page_layout=ed_table&id=<?php echo $row['tableID']?>">Edit</a></td>
							<td><a onclick="return Del('<?php echo $row['tableID']; ?>')" href="index_table.php?page_layout=del_table&id=<?php echo $row['tableID']?>">Delete</a></td>
						</tr>
					<?php } ?> 
				</table>
			</div>
        </div>
    </div>

</body>
</html>
<script>
	function Del(name){
		return confirm("Bạn có muốn xóa bàn "+name+"?");
	}
</script>