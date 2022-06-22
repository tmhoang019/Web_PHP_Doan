<?php
  session_start();
  if(isset($_SESSION["user"]) || isset($_SESSION['user_nv']))
  {
    header("Location: ../index.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập ViTasTy</title>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.js" integrity="sha256-mkdmXjMvBcpAyyFNCVdbwg4v+ycJho65QLDwVE3ViDs=" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/login_register.css">

</head>
<body >
<!-- partial:index.partial.html -->
<!-- NORMALIZED CSS INSTALLED-->
<!-- View settings for more info.-->
<div id="container">
  <div id="inviteContainer">
    <div class="logoContainer"><img class="logo" src="img/Logo.jpg"/><img class="text" src="img/LogoText.PNG"/></div>
    <div class="acceptContainer">
      <form action="login.php" method="post" name="form1" id="loginform">
        <a href="../index.php" class="backtohome">Trở về trang chủ</a>
        <h1>CHÀO MỪNG TRỞ LẠI!</h1> 
        <h4 id="error-msg" class="error-msg"></h4>
        <div class="formContainer">
          <div class="formDiv" style="transition-delay: 0.1s">
            <p>TÊN NGƯỜI DÙNG</p>
            <input type="text" name="username" id="userinput"/>
            <p id="username-error">Vui lòng không bỏ trống!</p>
          </div>
          <div class="formDiv" style="transition-delay: 0.1s">
            <p>MẬT KHẨU</p>
            <input type="password" name="password" id="passwordinput"/>
            <p id="password-error">Vui lòng không bỏ trống!</p>
            <a class="forgotPas" href="#">QUÊN MẬT KHẨU?</a>
          </div>
          <div class="formDiv" style="transition-delay: 0.2s">
            <button class="acceptBtn" type="button" name="login" value="login">Đăng nhập</button><span class="register">Chưa có tài khoản?<a href="register.php">Đăng kí</a></span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- partial -->
<script  src="js/scriptlogin_register.js"></script>
</body>
</html>
