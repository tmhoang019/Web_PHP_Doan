<?php
  function phpAlert($msg) {
         echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }
  $id= $_GET['id'];
	$sql= "SELECT * FROM user WHERE idKH= ".$id;
	$qry = mysqli_query($connect, $sql); 
	$row_up= mysqli_fetch_assoc($qry);
    if(isset($_POST['sbm'])){
        $name = $_POST['user_name'];
        $tk=$_POST['user_tk'];
        $pass = $_POST['user_pass'];
        $encryptpwd = md5($_POST['user_pass']);
        $address = $_POST['user_address'];
        $number=$_POST['user_number'];
        $sex=$_POST['user_sex'];
        $birthday=$_POST['user_birthday'];
        $id=$_GET['id'];
        $ttrang = $_POST['tt'];    
		 $date = getdate();
         $time =$date['mday'];
         $time.=$date['mon'];
         $time.=$date['year'];
         if(!checkUsername($tk) || !checkPhone($number)){
              if(!checkUsername($tk)){ 
                  phpAlert("Tên tài khoản không được chứa số và ký tự đặt biệt !!!");
              }
              if(!checkUsername($tk)==null){ 
                  phpAlert("Số điện thoại gồm 10 số và bắt đầu bằng số 0 !!!");
              }
         }
         else{
         $sql_change = "UPDATE `user` SET `tenKH`='$name',`username`='$tk',`password`='$encryptpwd',`Diachi`='$address',`SDT`='$number',`Gioitinh`='$sex',`NgaySinh`='$birthday',`trangthai`=$ttrang WHERE idKH=$id ";
         $qryli = mysqli_query($connect, $sql_change);
         header("Location: ../admin/admin.php?page-layout=danhsach-user");  
         }
    }
?>
<div class="container">
    <div class="card">
	     <div class="card-header" >
             <h2>SỬA THÀNH VIÊN</h2>
			 
         </div>
         <div class="card-body">
             <form method="POST" enctype="multipart/form-data">
             <div class="form-group">
			          <label for="uname">Tên thành viên: </label>
                <input type="text" class="form-control" name="user_name" id="user-name"  value="<?php echo $row_up['tenKH']; ?>" placeholder="Nhập tên tài khoản" height="20px" style="width: 80%;" required/>
                </div>

                 <div class="form-group">
			          <label for="uname">Tài khoản: </label>
                <input type="text" class="form-control" name="user_tk" id="user-tk" value="<?php echo $row_up['username'];?>" placeholder="Nhập tài khoản" height="20px" style="width: 80%;" required/>
                </div>

				 <div class="form-group">
                 <label for="pass">Mật khẩu:</label>
                <input type="text" class="form-control" name="user_pass" id="pass" value="<?php echo $row_up['password']; ?>" placeholder="Nhập mật khẩu" height="20px" style="width: 80%;" required/>
                </div>

				 <div class="form-group">
			          <label for="fname">Nhập địa chỉ:</label>
                <input type="text" class="form-control" name="user_address" id="user-address" value="<?php echo $row_up['Diachi']; ?>" placeholder="Nhập địa chỉ" height="20px" style="width: 80%;" required/>
                </div>

         <div class="form-group">
			          <label for="uname">Số điện thoại: </label>
                <input type="text" class="form-control" name="user_number" id="user-number" value="<?php echo $row_up['SDT']; ?>" placeholder="Nhập số điện thoại" height="20px" style="width: 80%;" required/>
                </div>
         <div class="form-group">
			          <label for="uname">Giới tính: </label>
                      <?php
                                if($row_up['Gioitinh']=='Nam'){
                                    echo '<input type="radio" class="" name="user_sex" id="user-sex" value="Nam" checked/> Nam
                                            <input type="radio" class="" name="user_sex" id="user-sex" value="Nữ"  style="margin-left:15px" />Nữ
                                        ';
                                }else echo '<input type="radio" class="" name="user_sex" id="user-sex" value="Nam" /> Nam
                                <input type="radio" class="" name="user_sex" id="user-sex" value="Nữ"  style="margin-left:15px" checked/>Nữ';

                        ?>
                
                
				 </div>
				 
         <div class="form-group">
			          <label for="fname">Nhập ngày sinh:</label>
                <input type="date" class="form-control" name="user_birthday" id="user-birthday" value="<?php echo $row_up['NgaySinh']; ?>" placeholder="Nhập ngày sinh" height="20px" style="width:auto;"/>
				 </div>


                 
         <div class ="form-group">
               <label for="trangthai">Trạng thái:</label>
               <select class="form-control" name="tt" id="trangthai" placeholder="Enter the type of dish" height="20px" style="width: 200px;"/>"<?php 
							   if($row_up['trangthai']==1){ ?>

               <option  selected="selected" value="1">Khóa</option>
               <option  value="0">Hoạt động</option>
               <?php }
							   else{ ?>

               <option  selected="selected" value="0">Hoạt động</option>
               <option  value="1">Khóa</option>
               <?php  } ?>
							   

               </select>
           </div>
                
         
               <button name="sbm" type="submit" class="btn btn-success" style="width: 100px; text-align: center;">SỬA</button>
			 </form>
         </div>
    </div>
</div>


