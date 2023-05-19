<?php
	if(isset($_POST['add-table'])){
		$numbers = $_POST['numbers'];
		$types = $_POST['types'];
		$prices = $_POST['prices'];

		$takeid = "SELECT tableID FROM billiards";
        $takedata = mysqli_query($ketnoi, $takeid);
        $dem=0;
        while($take_up = mysqli_fetch_assoc($takedata)){
			$arrayid[$dem]=$take_up["tableID"];
			$dem++;
        }

		$tableID = mt_rand(1, 999);
        while(in_array($tableID, $arrayid)){
            $tableID = mt_rand(1, 9999);
        }

		$truyvan = "INSERT INTO billiards (tableID, numbers, types, prices) VALUES
		 ('$tableID', '$numbers', '$types', '$prices')";
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
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Numbers</label>
					<input type="text" name="numbers" class="form-control" required>
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
					<input type="text" name="prices" class="form-control" required>
				</div>
				
				<button name="add-table" class="btn btn-success" type="submit">Add</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>