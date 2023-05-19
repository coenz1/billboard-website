<?php
	$id = $_GET['id'];
	$truyvan_up = "SELECT * FROM `account` where id = $id";
	$data_up = mysqli_query($ketnoi, $truyvan_up);
	$row_up = mysqli_fetch_assoc($data_up);

	if(isset($_POST['sbm'])){
		$role_user = $_POST['role_user'];
		
		$truyvan = "UPDATE account SET role_user = '$role_user' where id = $id";
		$data = mysqli_query($ketnoi, $truyvan);
		header('location: authorize.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="height:1500px">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="admin.php">Admin</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="authorize.php"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="classlist.php"></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"></a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"></a>
                    <a class="dropdown-item" href="#"></a>
                    </div>
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
			<h2>Authorize </h2>
		</div>
		<div class="card-body">
        <form method="POST" enctype="multipart/form-data">
				<div class="form-group">
                    
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
                                                
							$truyvan = "SELECT username, hoten, role_user FROM `account`";
							$data = mysqli_query($ketnoi,$truyvan);
							        
                            while($row = mysqli_fetch_assoc($data)){
								if($row_up["username"]==$row["username"] && $row["role_user"]==0){
									?>
                                    <label for="">Choose authorize for <?php echo $row["hoten"]; ?></label>
                                        <select name="role_user" class="custom-select mb-3">
                                            <option value="<?php $row["role_user"]; ?>" selected>Admin</option>
                                            <option value="1">Teacher</option>
                                            <option value="2">Student</option>
                                        </select>
									<?php
								}else if($row_up["username"]==$row["username"] && $row["role_user"]==1){
                                    ?>
                                    <label for="">Choose authorize for <?php echo $row["hoten"]; ?></label>
                                        <select name="role_user" class="custom-select mb-3">
                                            <option value="0">Admin</option>
                                            <option value="<?php $row["role_user"]; ?>" selected>Teacher</option>
                                            <option value="2">Student</option>
                                        </select>
                                    <?php
								}else if($row_up["username"]==$row["username"] && $row["role_user"]==2){
                                    ?>
                                    <label for="">Choose authorize for <?php echo $row["hoten"]; ?></label>
                                        <select name="role_user" class="custom-select mb-3">
                                            <option value="0">Admin</option>
                                            <option value="1">Teacher</option>
                                            <option value="<?php $row["role_user"]; ?>" selected>Student</option>
                                        </select>
                                    <?php
								}
                            }
                        ?>
                    
                </div>
				<button name="sbm" class="btn btn-success" type="submit">Edit</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>