<?php
 
    function phpAlert($msg) {
         echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    
    
  $id= $_GET['id'];
	$sql= "SELECT * FROM user_nv WHERE idNV= ".$id;
	$qry = mysqli_query($connect, $sql); 
	$row_up= mysqli_fetch_assoc($qry);

    if(isset($_POST['sbm'])){
         $u_name = $_POST['user_name'];
         $pass = $_POST['user_pass'];
         $f_name = $_POST['full_name']; 
         $ttrang = $_POST['tt']; 
         
		     $date = getdate();
         $time =$date['mday'];
         $time.=$date['mon'];
         $time.=$date['year'];
         
         $check = mysqli_query($connect,"SELECT username FROM user_nv WHERE username = '$u_name' AND idNV <> $id");
         $row_check= mysqli_fetch_array($check);
         
         if($row_check==null){
         $sql_change = "UPDATE  user_nv SET username= '$u_name', password= '$pass', fullname= '$f_name', last_update=$time, trangthai= $ttrang WHERE idNV=".$id;
         $qryli = mysqli_query($connect, $sql_change); 
         
         header("Location: ../admin/admin.php?page-layout=danhsach-member");
         }
         else{
             phpAlert("Tên tài khoản đã tồn tại !!!");
         }
    }
?>
<div class="container">
    <div class="card">
	     <div class="card-header" >
             <h2>SỬA NHÂN VIÊN</h2>
			 
         </div>
         <div class="card-body">
             <form method="POST" enctype="multipart/form-data">
			     <div class="form-group">
			          <label for="name">Tên tài khoản:</label>
                <input type="text" class="form-control" name="user_name" id="name" placeholder="Nhập tên tài khoản" height="20px" required value="<?php echo $row_up['username']; ?>"/>
				 </div>

				 

				 <div class="form-group">
			          <label for="pass">Mật khẩu:</label>
                <input type="text" class="form-control" name="user_pass" id="pass" placeholder="Nhập mật khẩu" height="20px" required value="<?php echo $row_up['password']; ?>"/>
				 </div>

				 <div class="form-group">
			          <label for="fname">Chủ tài khoản:</label>
                <input type="text" class="form-control" name="full_name" id="fname" placeholder="Nhập tên chủ tài khoản" height="20px" required value="<?php echo $row_up['fullname']; ?>"/>
				 </div>
         <div class ="form-group">
               <label for="trangthai">Trạng thái:</label>
               <select class="form-control" name="tt" id="trangthai" placeholder="Enter the type of dish" height="20px"/>
               
               <?php 
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
                
         
               <button name="sbm" type="submit" class="btn btn-success">SỬA</button>
               
               <?php if (checkPrivilege('/admin.php?page-layout=phanquyen&id=1')){?>
               <a href="admin.php?page-layout=phanquyen&id=<?php echo $row_up['idNV'];?>" class="btn btn-outline-primary" style="margin-left:12px;">
                 PHÂN QUYỀN
               </a>
               <?php }?>
			 </form>
         </div>
    </div>
</div>


