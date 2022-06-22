<?php
    
    function phpAlert($msg) {
         echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    if(isset($_POST['sbm'])){
         $u_name = $_POST['user_name'];
         $pass = $_POST['user_pass'];
         $f_name = $_POST['full_name'];
         $id=$_GET['id'];
         
         
         $check = mysqli_query($connect,"SELECT username FROM user_nv WHERE username='$u_name'");
         $row_check= mysqli_fetch_array($check);
         
         $date = getdate();
         $time =$date['mday'];
         $time.=$date['mon'];
         $time.=$date['year'];
         
         if($row_check==null){
         $sql_add = "INSERT INTO user_nv (idNV,username, password, fullname, last_update) VALUES ('$id','$u_name', '$pass', '$f_name', $time)";
         $qry = mysqli_query($connect, $sql_add); 
         
         header("Location: ../admin/admin.php?page-layout=phanquyen&id=".$id);
         }
         else{
             phpAlert("Tên tài khoản đã tồn tại !!!");
         } 
    }
?>
<div class="container">
    <div class="card">
	     <div class="card-header" >
             <h2>THÊM NHÂN VIÊN</h2>
			 
         </div>
         <div class="card-body">
             <form method="POST" enctype="multipart/form-data">
			     <div class="form-group">
			          <label for="uname">Tên tài khoản:</label>
                <input type="text" class="form-control" name="user_name" id="uname" placeholder="Nhập tên tài khoản" height="20px" required/>
				 </div>

				 <div class="form-group">
           <label for="pass">Mật khẩu:</label>
           <input type="text" class="form-control" name="user_pass" id="pass" placeholder="Nhập mật khẩu" height="20px" required=""/>
				 </div>

				 <div class="form-group">
			          <label for="fname">Chủ tài khoản:</label>
                <input type="text" class="form-control" name="full_name" id="fname" placeholder="Nhập tên chủ tài khoản" height="20px" required/>
				 </div>

				 
               <button name="sbm" type="submit" class="btn btn-success">THÊM</button>
			 </form>
         </div>
    </div>
</div>


