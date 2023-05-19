<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    }

    require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Vertical Form Layout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .bg {
            background: #eceb7b;
        }
    </style>
</head>
<body>
<?php
	$error = '';
	$phone='';
    $student_name = '';
	$ID='';
    $birth_day = '';
    $email = '';
    $user = '';
    $pass = '';
    $pass_confirm = '';

    if (isset($_POST['name']) && isset($_POST['birth'])&& isset($_POST['phone'])&& isset($_POST['studentid']) && isset($_POST['email'])
    && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass-confirm']))
    {
		$ID=$_POST['studentid'];
        $student_name = $_POST['name'];
        $birth_day = $_POST['birth'];
		$phone = $_POST['phone'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $pass_confirm = $_POST['pass-confirm'];
        $pass_confirm = md5($pass_confirm);
        $role_user = 2;

        if (empty($student_name)) {
            $error = 'Please enter your name';
        }
        else if (empty($birth_day)) {
            $error = 'Please enter your birthday';
        }
		if (empty($ID)) {
            $error = 'Please enter your ID';
        }
		else if (empty($phone)) {
            $error = 'Please enter your phone number';
        }
        else if (empty($email)) {
            $error = 'Please enter your email';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'This is not a valid email address';
        }
        else if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Password does not match';
        }
        else {
            // register a new account
			$result = register($ID,$user,$pass,$student_name,$birth_day,$email,$phone,$role_user);
            if($result['code']==0){
                //thanh cong
                header('Location: login.php');
                exit();
            }else if($result['code']==1) {
                $error = 'This email is already exists';
            }else{
                $error='ID is already exists';
			}
		}
    }
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 border my-5 p-4 rounded mx-3">
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Create a new account</h3>
                <form method="post" action="" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="student_name">Customer name</label>
                            <input value="<?= $student_name?>" name="name" required class="form-control" type="text" placeholder="Customer name" id="hotensv">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="$birth_day">Birthday</label>
                            <input value="<?= $birth_day?>" name="birth" required class="form-control" type="date" placeholder="Birthday" id="ngaysinhsv">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="ID">Customer ID</label>
                        <input value="<?= $ID?>" name="studentid" required class="form-control" type="text" placeholder="Customer ID" id="mssv">
                    </div>
					
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?= $email?>" name="email" required class="form-control" type="email" placeholder="Email" id="emailsv">
                    </div>
					
					<div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input  value="<?= $phone?>" name="phone" required class="form-control" type="text" placeholder="Phone number" id="sdtsv">
                    </div>
					
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input value="<?= $user?>" name="user" required class="form-control" type="text" placeholder="Username" id="usernamesv">
                        <div class="invalid-feedback">Please enter your username</div>
                    </div>
                    
					
					
					<div class="form-group">
                        <label for="pass">Password</label>
                        <input  value="<?= $pass?>" name="pass" required class="form-control" type="password" placeholder="Password" id="passwordsv">
                        <div class="invalid-feedback">Password is not valid.</div>
                    </div>
                    <div class="form-group">
                        <label for="pass2">Confirm Password</label>
                        <input value="<?= $pass_confirm?>" name="pass-confirm" required class="form-control" type="password" placeholder="Confirm Password" id="pass2">
                        <div class="invalid-feedback">Password is not valid.</div>
                    </div>

                    <div class="form-group">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button type="submit" class="btn btn-success px-5 mt-3 mr-2">Register</button>
                        <button type="reset" class="btn btn-outline-success px-5 mt-3">Reset</button>
                    </div>
                    <div class="form-group">
                        <p>Already have an account? <a href="login.php">Login</a> now.</p>
                    </div>
                </form>
                                
            </div>
        </div>

    </div>
</body>
</html>

