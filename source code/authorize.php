
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
  <style>
      table{
        margin:auto;
      }
      td, th{
        border: 1px solid black;
        padding: 5px 20px;
      }
      th{
          text-align: center;
      }
  </style>
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
                    <a class="nav-link" href="authorize.php">Authorization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="classlist.php">Class List</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Class</a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Join class</a>
                    <a class="dropdown-item" href="index.php?page_layout=add">Create class</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div> 
    </nav>
    <div class="container-fluid" style="margin-top:80px">
        <h1>List account</h1>
        <div class="row">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Authorize</th>
                    <th>Edit</th>
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
                $dem=0;            
                while($row = mysqli_fetch_assoc($data)){
            ?>
                <tr>
                    <td><?php echo $row['hoten']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['sdt']; ?></td>
                    <?php
                        if($row['role_user']==0){
                            ?>
                                <td>Amin</td>
                            <?php
                        }else if($row['role_user']==1){
                            ?>
                                <td>Teacher</td>
                            <?php
                        }else if($row['role_user']==2){
                            ?>
                                <td>Student</td>
                            <?php
                        }
                    ?>
                    <td><a href="index2.php?page_layout=edit&id=<?php echo $row['id']?>">Edit</a></td>
                </tr>
            <?php
                    $dem++;
                }
            ?>
            </table>
        </div>
    </div>
    
</body>
</html>