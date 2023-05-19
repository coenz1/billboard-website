<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: admin.php');
        exit();
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
<body>

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

    $truyvan = "SELECT username, password_mk, role_user FROM `account`";
    $data = mysqli_query($ketnoi,$truyvan);   
    $dem=0;           
    while($row = mysqli_fetch_assoc($data)){
        $arrayuser[$dem]=$row["username"];
        $arraypass[$dem]=$row["password_mk"];
        $dem++;
        $arraycheck[$row["username"]]=$row["password_mk"];
        $arraycheckrole[$row["username"]]=$row["role_user"];
    }

    $error = '';
    $user = '';
    $pass = '';

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        // ma hoa mat khau
        $pass = md5($pass);

        if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        }
        else{
            if (in_array($user, $arrayuser) && in_array($pass, $arraypass) && $arraycheck[$user]==$pass && $arraycheckrole[$user]==0) {
                // success
                $_SESSION['user'] = 'admin';
                header('Location: admin.php');
                exit();
            }else if (in_array($user, $arrayuser) && in_array($pass, $arraypass) && $arraycheck[$user]==$pass && $arraycheckrole[$user]==1) {
                // success
                $_SESSION['user'] = 'teacher';
                header('Location: admin.php');
                exit();
            }else if (in_array($user, $arrayuser) && in_array($pass, $arraypass) && $arraycheck[$user]==$pass && $arraycheckrole[$user]==2) {
                // success
                $_SESSION['user'] = 'student';
                header('Location: home.php');
                exit();
            }else {
                $error = 'Invalid username or password';
            }
        }
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">User Login</h3>
            <form method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input value="<?= $user ?>" name="user" id="user" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="pass" value="<?= $pass ?>" id="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input <?= isset($_POST['remember']) ? 'checked' : '' ?> name="remember" type="checkbox" class="custom-control-input" id="remember">
                    <label class="custom-control-label" for="remember">Remember login</label>
                </div>
                <div class="form-group">
                    <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
                    <button class="btn btn-success px-5">Login</button>
                </div>
                <div class="form-group">
                    <p>Don't have an account yet? <a href="register.php">Register now</a>.</p>
                    <p>Forgot your password? <a href="forgot.php">Reset your password</a>.</p>
                </div>
            </form>
            
        </div>
    </div>
</div>

</body>
</html>
