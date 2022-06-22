<?php
		require_once 'connect-sql.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>DevTools</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./resources/css/styles.css">
    <link rel="icon" href="./resources/img/logo/owl1.png">
    <link rel="stylesheet" href="./vendors/css/fontawesome-free-5.14.0-web/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
  <body>
    <?php
        session_start();
        
        $error = false;
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
		    $usr = $_POST['username'];
			$pas=  $_POST['password'];
            $result = mysqli_query($connect, "SELECT * FROM user_nv WHERE username ='$usr' AND password = '$pas' AND trangthai <> 1");
			
            if ($result->num_rows == 0) {
                $error = mysqli_error($connect);
				
            } else {
                $user = mysqli_fetch_assoc($result);
				$q= "SELECT * FROM user_privilege INNER JOIN `privilege` ON user_privilege.pri_id = privilege.id WHERE user_privilege.user_id = ".$user['idNV'];
				
                $userPrivileges = mysqli_query($connect, $q);
                
                $user['privileges'] = array();
                while($row_match = mysqli_fetch_array($userPrivileges)){
				    
					     $user['privileges'][]= $row_match['uri_match'];	
					     $uid= $row_match['user_id'];
				}

				$qryli = mysqli_query($connect, "SELECT username FROM user_nv WHERE idNV= ".$uid);
				$r=mysqli_fetch_array($qryli);
                $user['usrname']=$r['username'];

                $_SESSION['current_user'] = $user;
                header("Location: ../admin/admin.php");
            }
			
            if ($result->num_rows == 0) {
			    
                ?>
                <div id="login-notify" class="box-content">
                    <h1>Thông báo</h1>
                    <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác hoặc tài khoản bạn bị khóa" ?></h4>
                    <a href="login.php">Quay lại</a>
                </div>
                <?php
                exit;
            }
            ?>
		<?php } ?>
    <div class="container-login  sw-form1">
	  
            <div class="form-container" >
                <form action="" class="form form-login" id="formlogin" method="POST">
                    <h2>Sign in</h2>
                    <div class="feedback-email form-div">
                        <input class="input" type="text" name="username" id="email" required>
                        <label for="user" class="form-label">
                            <span class="label-content">Username</span>
                        </label>
                        <span class="input-error"></span>
                    </div>
                    <div class="feedback-name form-div">
                        <!-- <i class="fas fa-signature"></i> -->
                        <input class="input" type="password" name="password" id="password" required>
                        <label for="name" class="form-label">
                            <span class="label-content">Password</span>
                        </label>
                        <span class="input-error"></span>
                    </div>
                    <a class="fogot-password" href="#"> Fogot password ?</a>
                    <button name="sbm" type="submit" class="btn btn-outline-success" style="font-size:18px;">Đăng nhập</button>
                    <div class="socials-form">
                        
                    </div>
                </form>
				</div>
        </div>
    </div>
</body>
</html>


