<?php
	$id = $_GET['id'];
	$truyvan_up = "SELECT * FROM `bill` where orderID = $id";
	$data_up = mysqli_query($ketnoi, $truyvan_up);
	$row_up = mysqli_fetch_assoc($data_up);

	if(isset($_POST['ed-bill'])){
		$quantity = $_POST['quantity'];
		$tableID = $_POST['tableID'];
		$types = $_POST['types'];
		$prices = $_POST['prices'];
		$timeToStart = $_POST['timeToStart'];
		$timeToEnd = $_POST['timeToEnd'];
		$customerName = $_POST['customerName'];
		
		$truyvan = "UPDATE bill SET quantity = '$quantity', tableID = '$tableID', types = '$types', prices = '$prices', timeToStart = '$timeToStart', timeToEnd = '$timeToEnd', customerName = '$customerName' where orderID = $id";
		$data = mysqli_query($ketnoi, $truyvan);
		header('location: bill.php');
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
<div class="container-fluid">
	<div class="card" style="padding-top:50px">
		<div class="card-header">
			<h2>Edit</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Quantity</label>
					<input type="text" name="quantity" class="form-control" required value="<?php echo $row_up['quantity'];?>">
				</div>
				<div class="form-group">
                    <label for="">Table ID</label>
                    <select name="tableID" class="custom-select mb-3">
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
                                                
                            $truyvan = "SELECT tableID  FROM `billiards`";
                            $data = mysqli_query($ketnoi,$truyvan);
                                                
                            while($row = mysqli_fetch_assoc($data)){
                                
                        ?>
                            <option value="<?php echo $row["tableID"]; ?>"><?php echo $row["tableID"]; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
				<div class="form-group">
                    <label for="">Types</label>
                    <select name="types" class="custom-select mb-3">
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
                                                
                            $truyvan = "SELECT types  FROM `typeofbilliards`";
                            $data = mysqli_query($ketnoi,$truyvan);
                                                
                            while($row = mysqli_fetch_assoc($data)){
                                
                        ?>
                            <option value="<?php echo $row["types"]; ?>"><?php echo $row["types"]; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
				<div class="form-group">
					<label>Start at</label>
					<input type="text" name="timeToStart" class="form-control" required value="<?php echo $row_up['timeToStart'];?>">
				</div>
				<div class="form-group">
					<label>End at</label>
					<input type="text" name="timeToEnd" class="form-control" required value="<?php echo $row_up['timeToEnd'];?>">
				</div>
				<div class="form-group">
					<label>Customer name</label>
					<input type="text" name="customerName" class="form-control" required value="<?php echo $row_up['customerName'];?>">
				</div>
				
				<button name="ed-bill" class="btn btn-success" type="submit">Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>
</html>