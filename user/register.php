<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Đăng kí ViTasTy</title>
  <link rel="stylesheet" href="./css/register.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Đăng kí</h2>
      <h4 id="reg-msg" style="display: none;">Đăng kí thành công chuyển hướng....</h6>
    </div>
    <div class="row clearfix">
      <div class="" id="reg-form">
        <form action="registerprocess.php" method="POST" id="myform">
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" name="username" placeholder="Tên đăng nhập" id="usernamereg"/>
            <p id="error-username" style="display: none;">Không bỏ trống!</p>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Mật khẩu" id="passwordreg"/>
            <p id="error-password" style="display: none;"></p>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" id="repasswordreg"/>
            <p id="error-repassword" style="display: none;"></p>
          </div>
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="firstname" placeholder="Họ" id="fistnamereg"/>
                <p id="error-fistname" style="display: none;">Không bỏ trống!</p>
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="lastname" placeholder="Tên" id="lastnamereg"/>
                <p id="error-lastname" style="display: none;">Không bỏ trống!</p>
              </div>
            </div>
          </div>
          <div class="input_field radio_option">
              <input type="radio" name="radiogroup1" id="rd1" checked value="Nam">
              <label for="rd1">Nam</label>
              <input type="radio" name="radiogroup1" id="rd2" value="Nữ">
              <label for="rd2">Nữ</label>
              </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-map-marker"></i></span>
            <input type="text" name="address" placeholder="Địa chỉ" id="addressreg"/>
            <p id="error-address" style="display: none;">Không bỏ trống!</p>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-map-marker"></i></span>
            <input type="text" name="phonenumber" placeholder="Số điện thoại" id="phonenumberreg"/>
            <p id="error-phonenumber" style="display: none;">Không bỏ trống!</p>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-birthday-cake"></i></span>
            <input type="text" name="birthday" placeholder="Ngày sinh" id="birthdayreg"/>
            <p id="error-birthday"style="display: none;">Không bỏ trống!</p>
          </div>
          <div>
          <span class="register">Đã có tài khoản?<a href="login.php">Đăng nhập</a></span>
          <span class="register">Quay lại trang chủ<a href="../index.php">Trang chủ</a></span>
          </div>
          <input class="regButton" type="button" value="Đăng Kí"/>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
  <script  src="js/scriptlogin_register.js"></script>
</body>
</html>
