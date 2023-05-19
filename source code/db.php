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
	
	
	
    define('HOST','localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'database');

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    
    
    function open_database(){
        $conn = new mysqli(HOST,USER,PASS,DB);
        if($conn->connect_error){
            die('Connect error:'. $conn->connect_error);

        }
        //$conn->set_charsect('utf-8');
        return $conn;
    }

    function is_email_exists($email_sv){
        $sql = 'select username from account where email=?';
        $conn= open_database();

        $stm= $conn->prepare($sql);
        $stm->bind_param('s',$email_sv);
        if(!$stm->execute()){
            die('Query error: '.$stm->error);
        }

        $result = $stm->get_result();
        if($result->num_rows >0){
            return true;
        }else{
            return false;
        }       

    }
    function register($ID,$user,$pass,$student_name,$birth_day,$email,$phone,$role_user){
		$conn=open_database();
        if(is_email_exists($email)){
            return array('code' => 1 , 'error'=> 'Email exists');
        }
		$hash = password_hash($pass,PASSWORD_DEFAULT);
		$sql = "insert into account(id, username, password_mk, hoten, ngaysinh, email, sdt, role_user ) values (?,?,?,?,?,?,?,?)";
		$conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssssss',$ID,$user,$pass,$student_name,$birth_day,$email,$phone,$role_user);// muốn ẩn mật khẩu trong database thì thay $pass = $hash

        if(!$stm->execute()){
            return array('code' => 2 , 'error'=> 'Can not execute command');
        }

        //send_activate_email($email,$token);

        return array('code' => 0 , 'error'=> 'Create account successful');
	}
    
?>