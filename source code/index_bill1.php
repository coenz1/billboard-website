<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
?>
<?php
	require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <a href="logout.php">Đăng xuất</a>

	<?php
		if(isset($_GET['page_layout'])){
			switch ($_GET['page_layout']){
				case 'bill':
					require_once 'bill.php';
					break;
				case 'del_bill1':
					require_once 'del_bill1.php';
					break;
				case 'ed_bill1':
					require_once 'ed_bill1.php';
					break;
				
				default:
					require_once 'bill.php';
					break;
			}
		}else{
			require_once 'bill.php';
		}
	?>	
</body>
</html>