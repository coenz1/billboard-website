<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner img {
    width: 100%;
    height: 970px;
  }
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="home.php">Home page</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="book.php">Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.php">History</a>
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
				<h1>History</h1>
			</div>
            <div class="card-body">
				<table class="table">
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
														
					$truyvan = "SELECT * FROM `bill`";
					$data = mysqli_query($ketnoi,$truyvan);
														
					while($row = mysqli_fetch_assoc($data)){
					?>
						<tr>
							<th style="margin:auto">Order ID</th>
							<td style="margin:auto"><?php echo "".$row["orderID"]; ?></td>
						</tr>
						<tr>
							<th style="margin:auto">Quantity</th>
							<td style="margin:auto"><?php echo "".$row["quantity"]; ?></td>
						</tr>
						<tr>
							<th style="margin:auto">Table ID</th>
							<td style="margin:auto"><?php echo "".$row["tableID"]; ?></td>
						</tr>
						<tr>
							<th style="margin:auto">Type</th>
							<td style="margin:auto"><?php echo "".$row["types"]; ?></td>
						</tr>
						<tr>
							<th style="margin:auto">Price</th>
							<td style="margin:auto">50000</td>
						</tr>
						<tr>
							<th style="margin:auto">Start at</th>
							<td style="margin:auto"><?php echo "".$row["timeToStart"]; ?></td>
						</tr>
						<tr>
							<th style="margin:auto">End at</th>
							<td style="margin:auto"><?php echo "".$row["timeToEnd"]; ?></td>
						</tr>
						<tr>
							<th style="margin:auto">Customer name</th>
							<td style="margin:auto"><?php echo "".$row["customerName"]; ?></td>
						</tr>
						<tr>
							<td><a href="index_bill.php?page_layout=ed_bill&id=<?php echo $row['orderID']?>">Edit</a></td>
							<td><a onclick="return Del_his('<?php echo $row['orderID']; ?>')" href="index_bill.php?page_layout=del_bill&id=<?php echo $row['orderID']?>">Delete</a></td>
						</tr>
					<?php } ?> 
				</table>
			</div>
        </div>
    </div>
</body>
</html>
<script>
	function Del_his(name){
		return confirm("Bạn có muốn hủy hóa đơn "+name+"?");
	}
</script>