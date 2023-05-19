<?php
	$id = $_GET['id'];
	$truyvan_up = "SELECT * FROM `billiards` where tableID = $id";
	$data_up = mysqli_query($ketnoi, $truyvan_up);
	$row_up = mysqli_fetch_assoc($data_up);

	if(isset($_POST['ed-table'])){
		$numbers = $_POST['numbers'];
		$types = $_POST['types'];
		$prices = $_POST['prices'];
		
		$truyvan = "UPDATE billiards SET numbers = '$numbers', types = '$types', prices = '$prices' where tableID = $id";
		$data = mysqli_query($ketnoi, $truyvan);
		header('location: admin.php');
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
					<label>Number</label>
					<input type="text" name="numbers" class="form-control" required value="<?php echo $row_up['numbers'];?>">
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
					<label>Prices</label>
					<input type="text" name="prices" class="form-control" required value="<?php echo $row_up['prices'];?>">
				</div>
				
				<button name="ed-table" class="btn btn-success" type="submit">Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>
</html>