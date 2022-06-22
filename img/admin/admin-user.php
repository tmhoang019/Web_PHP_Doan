
<?php
   $sql = "SELECT * FROM user";
   $query = mysqli_query($connect,$sql);
   $sql2 = "SELECT * FROM sanpham";
   $query2 = mysqli_query($connect,$sql2);
	 $n=0;
   while($row2=mysqli_fetch_array($query2)){
	     $n=$row2['idsanpham'];
   }
   
   
?>
<div class="container">
    <div class="card">
	     <div class="card-header" >
             
             <h2>Danh sách thành viên</h2>
			      
         </div>
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-hover">
			             <thead class="thead-dark">
				             <tr class="table-active">
					                <th width="45px">Mã</th>
						              <th width="105px">Tên Khách</th>
						              <th width="105px">Tài khoản</th>
                          
						              <th width="105px">Password</th>
                          <th width="85px">SĐT</th>
                          <th width="67px">Giới tính</th>
						              <th width="67px">Sửa</th>
						              <th width="67px">Xóa</th>
					           </tr>
				           </thead>
				           <tbody>
				               <?php
					               while($row= mysqli_fetch_assoc($query)){ ?>
						               <tr>
                           <td width="45px"><?php echo $row['idKH']; ?></td>
								           <td width="105px"><?php echo $row['tenKH']; ?></td>
								           <td width="105px">
                             <?php echo $row['username']; ?>
								 
								           </td>
								           
								           
								           <td width="105px"><?php echo $row['password']; ?></td>
                             <td width="85px"><?php echo $row['SDT']; ?></td>
                             <td width="67px">
                               <?php echo $row['Gioitinh']; ?>
                             </td>
								           <td width="67px">
                             <?php if (checkPrivilege('/admin.php?page-layout=user-change&id=1')) { ?>
                                   <a href="admin.php?page-layout=user-change&id=<?php echo $row['idKH'];?>"><i class="fas fa-cogs" style="color:navy; font-size:25px; cursor: pointer;"></i></a>
                             
                             <?php } ?>
                           </td>
                      
                             
                      
								           <td width="67px">
                             <?php if (checkPrivilege('/admin.php?page-layout=user-delete&id=1')) { ?>
                                  <a onclick="return Del('<?php echo $row['tenKH']?>')" href="admin.php?page-layout=user-delete&id=<?php echo $row['idKH'];?>"><i class="fas fa-trash-alt" style="color:red; font-size:25px; cursor: pointer;"></i></a>
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
       return confirm("Bạn có chắc xóa người dùng tên " + name + " hay không?");
  }
</script>


