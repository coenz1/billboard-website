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
				case 'history':
					require_once 'history.php';
					break;
				case 'table_form':
					require_once 'table_form.php';
					break;
				case 'del_bill':
					require_once 'del_bill.php';
					break;
				case 'ed_bill':
					require_once 'ed_bill.php';
					break;
				
				default:
					require_once 'history.php';
					break;
			}
		}else{
			require_once 'history.php';
		}
	?>	
</body>
</html>