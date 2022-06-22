<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<section class="d-flex flex-column of-nav">
        <nav class="navbar navbar-expand-md bg-white navbar-light">
          <a href="index.php"><img src="img/icon.jfif" class="navbar-brand" style="width:75px; height: 85px; margin-left: 100px;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav justify-content-end">
              <li class="nav-item">
                <a class="nav-link" href="/LapTrinhWeb2/index.php" id="home">Trang Chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/LapTrinhWeb2/menu/menu.php" id="menu">Thực đơn</a>
              </li>
              <?php 
                if (isset($_SESSION['user'])) {
                  # code...
                  echo "<li class='nav-item'>
                          <a class='nav-link' href='/LapTrinhWeb2/order/order.php' id='order'>Giỏ hàng</a>
                        </li>";
                  echo "<li class='nav-item'>";
                  echo "<a class='nav-link'  href='/LapTrinhWeb2/order/donhang.php' id='user-ordered'>Đơn hàng của tôi</a>";
                  echo "</li>";
                  echo "<li class='nav-item'>";
                  echo "<a class='nav-link' id='user'>".$_SESSION['user']."</a>";
                  echo "</li>";
                  echo "<li class='nav-item'>
                  <div style='cursor:pointer;'class='nav-link' id='logout'>
                  <i class='fas fa-sign-out-alt'></i>
                  </div>";
                  echo "</li>";
                }
                elseif (isset($_SESSION['user_nv'])) {
                  # code...
                  echo "<li class='nav-item'>";
                  echo "<a class='nav-link' href='/LapTrinhWeb2/admin/admin.php'>Quản lý</a>";
                  echo "</li>";
                  echo "<li class='nav-item'>";
                  echo "<a class='nav-link' id='user'>".$_SESSION['user_nv']."</a>";
                  echo "</li>";
                  echo "<li class='nav-item'>
                  <div style='cursor:pointer;'class='nav-link' id='logout'>
                  <i class='fas fa-sign-out-alt'></i>
                  </div>";
                  echo "</li>";
                }
                else{
                  echo "<li class='nav-item'>";
                  echo "<a class='nav-link' href='/LapTrinhWeb2/user/login.php' id='user'>Đăng nhập</a>";
                  echo "</li>";
                }
              ?>   
            </ul>
          </div>  
        </nav>
        <br>
    </section>
</html>