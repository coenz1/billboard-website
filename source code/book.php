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
  .row{
       padding: 15px;
}
.cell {
    box-shadow: 4px 4px 10px 2px rgba(0,0,0,0.2);
    border-radius: 5px;
    transition: 0.3s;
            
    height: 200px;
    margin-top: 20px;
}
.cell .user-info .title{
    color: #fff;
    font-weight: bold;
    position: absolute;
    top: 20px;
    font-size: 17px;
    padding: 0px 5px;
}
.cell .user-info .subject{
    color: #fff;
    position: absolute;
    top: 38px;
    padding: 0px 5px;
}
.cell .user-info .gv{
    color: #fff;
    position: absolute;
    top: 55px;
    padding: 0px 5px;
}
.cell .user-info .room{
    color: #fff;
    position: absolute;
    top: 73px;
    padding: 0px 5px;
}
        
.cell img {
    width: 100%;
	height: 100%;
    border-radius: 5px 5px 0 0;
}
.cell:hover {
    box-shadow: 4px 6px 7px 4px rgba(0,0,0,0.3);
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
	
	<div class="container-fluid" style="padding-top:80px">
        <h1>Book</h1>
        <div class="row1">
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
                
                $truyvan = "SELECT * FROM `billiards`";
                $data = mysqli_query($ketnoi,$truyvan);
                                    
                while($row = mysqli_fetch_assoc($data)){
            ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="cell">
                        <img src="img/download.jpg"/>
                        <div class="user-info">
                            <a href="classes.php">
                                <p class="title"><?php echo "Table ID: ".$row["tableID"]; ?></p>
                                <p class="subject"><?php echo "Number: ".$row["numbers"]; ?></p>
                            </a>
                            <p class="gv"><?php echo "Type: ".$row["types"]; ?></p>
                            <p class="room"><?php echo "Price: ".$row["prices"]; ?></p>
                        </div>
                    </div>
					<a class="btn btn-primary" href="index_bill.php?page_layout=table_form">Book</a>
                </div>
            <?php
                }			
            ?>  
			
        </div>
    </div>
    
</body>
</html>