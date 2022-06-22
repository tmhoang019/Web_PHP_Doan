<div class="admin-menu">
                <div class="admin-logo admin-profile">
                    <a href="admin.php">
                        <img src="./img/admin-manager.jpg" alt="" style="border-radius: 80%;">
                    </a>
                </div>
                <div class="admin-profile-ava admin-profile">
                    <span class="admin-profile-ava-name">
                  <?php echo $_SESSION['current_user']['usrname'];?></span>
                </div>
<?php if (checkPrivilege('/admin.php?page-layout=danhsach-product')) { ?>
  <a href="admin.php?page-layout=danhsach-product" class="taga">
    <div class="admin-menu-item">
                    <div>
                        <i class="fas fa-table"></i>
                        <span>Quản lý Món ăn</span>
                    </div>
                </div>
                </a>
<?php }?>
<?php if (checkPrivilege('/admin.php?page-layout=danhsach-bill')) { ?>
          <a href="admin.php?page-layout=danhsach-hoadon" class="taga">
                      <div class="admin-menu-item">
                            <div>
                                <i class="far fa-calendar-alt"></i>
                                <span>Quản lý hóa đơn</span>
                            </div>
                        </div>
           </a>
<?php } ?>
<?php if (checkPrivilege('/admin.php?page-layout=danhsach-account')) { ?>
                <div class="admin-menu-item" id="admin-menu-item-account" onclick="showitem();" ondblclick="unshowitem();">
                    <div>
                        <i class="fas fa-user-circle"></i>
                        <span>Quản lý tài khoản</span>
                    </div>
                     <div class="admin-menu-item-div" id="admin-menu-item-div-account">
                       <?php if (checkPrivilege('/admin.php?page-layout=danhsach-user')) { ?>
                       <a href="admin.php?page-layout=danhsach-user" id="taga">
                         <span class="admin-menu-item-div-item" style="color: #C2C1C1;" id="admin-menu-item-div-item">Thành viên</span>
                       </a>
                       <?php }?>
                       <?php if (checkPrivilege('/admin.php?page-layout=danhsach-nhanvien')) { ?>
                       <a href="admin.php?page-layout=danhsach-member" id="taga">
                         <span class="admin-menu-item-div-item" style="color: #C2C1C1;" id="admin-menu-item-div-item">Nhân viên</span>
                       </a>
                       <?php }?>
                    </div>
                </div>
<?php }?>
<?php if (checkPrivilege('/admin.php?page-layout=thongke')) { ?>
        <a href="admin.php?page-layout=revenue" class="taga">
          <div class="admin-menu-item">
            <div>
              <i class="fas fa-chart-bar"></i>
              <span>Thống kê</span>
            </div>
          </div>
        </a>
<?php } ?> 
</div>