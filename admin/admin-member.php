
<?php
   $sql = "SELECT * FROM user_nv";
   $query = mysqli_query($connect,$sql);
   $sql2 = "SELECT * FROM user_nv";
   $query2 = mysqli_query($connect,$sql2);
	 $n=0;
   while($row2=mysqli_fetch_array($query2)){
	     $n=$row2['idNV'];
   }
   
   
?>
<div class="container">
    <div class="card">
	     <div class="card-header" >
             <h2>Danh sách nhân viên 
             <?php if (checkPrivilege('/admin.php?page-layout=member-add&id=1')) { ?>
                 <a style="float:right;" class="btn btn-primary" href="admin.php?page-layout=member-add&id=<?php echo $n+1;?>">THÊM MỚI</a>
             <?php } ?>
             </h2>
			 
         </div>
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-hover">
			             <thead class="thead-dark">
                     <tr class="table-active">
                       <th width="30px">Mã</th>
                       <th width="85px">Tài Khoản</th>
                       <th width="90px">Mật Khẩu</th>
                       <th width="88px">Chủ tài khoản</th>
                       <th width="58px">Ngày cập nhật</th>
                       <th width="58px">Trạng thái</th>
                       <th width="35px">Sửa</th>
                       <th width="35px">Xóa</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php
					               
					            while($row=mysqli_fetch_array($query)){?>   
                     <tr>
                       <td width="30px">
                         <?php echo $row['idNV']; ?>
                       </td>
                       <td width="85px">
                         <?php echo $row['username']; ?>
                       </td>
                       <td width="90px">
                         <?php echo $row['password'] ?>

                       </td>
                       <td width="88px">
                         <?php echo $row['fullname']; ?>
                       </td>
                       <td width="58px">
                         <?php echo $row['last_update']; ?>
                       </td>
                       <td width="58px">
                         <?php if($row['trangthai']==0){ echo 'Hoạt động';}else{ echo 'Khóa';}?>
                       </td>
                       

                       <td width="35px">
                         <?php if (checkPrivilege('/admin.php?page-layout=member-change&id=1')) { ?>
                         <a href="admin.php?page-layout=member-change&id=<?php echo $row['idNV'];?>"><i class="fas fa-cogs" style="color:navy; font-size:25px; cursor: pointer;"></i>
                         </a>

                         <?php } ?>
                       </td>



                       <td width="35px">
                         <?php if (checkPrivilege('/admin.php?page-layout=member-delete&id=1')) { ?>
                         <a onclick="return Del('<?php echo $row['username']?>')" href="admin.php?page-layout=member-delete&id=<?php echo $row['idNV'];?>"><i class="fas fa-trash-alt" style="color:red; font-size:25px; cursor: pointer;"></i>
                         </a>
                         <?php } ?>
                       </td>


                     </tr>

                  <?php } ?>   


                   </tbody>
			      </table>
           </div>
         </div>
    </div>
</div>
<script>
  function Del(name){
      return confirm("Bạn có chắc xóa tài khoản " + name + " hay không?");
  }
</script>




 