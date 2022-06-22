
<?php
   $sql = "SELECT * FROM sanpham inner join loaisp on sanpham.idloai = loaisp.idloai";
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
             
             <h2>Danh sách món ăn 
             <?php if (checkPrivilege('/admin.php?page-layout=product-add&id=1')) {?>
             <a style="float:right;" class="btn btn-primary" href="admin.php?page-layout=product-add&id=<?php echo $n+1;?>">THÊM MÓN</a>
             
             <?php }?>
             
             <div class="admin-search">
               <form action="admin.php?page-layout=product-search" method="post" style="display: inherit;">
               
                 <input class="input-search" id="input-search" name="input-search" type="text" placeholder="    Tên sản phẩm">
                   <input type="number" class="input-number" id="input-number-low" name="input-number-low" placeholder="    Giá thấp nhất"/>
                   <span>-</span>
                   <input type="number" class="input-number" id="input-number-high" name="input-number-high" placeholder="    Giá cao nhất">
                   <select name="order" id="order" class="order" style="font-size: 17px;">
                    <option value="DESC">Giá giảm dần</option>
                    <option value="ASC">Giá tăng dần</option>
                 </select>
                  
                     <button class="btn-search" type="submit" style="filter: none;background: inherit;">
                       <i class="icon-search-admin fas fa-search"></i>
                     </button>
                   </form>
             </div>
               
               
             </h2>
			      
         </div>
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-hover">
			             <thead class="thead-dark">
				             <tr class="table-active">
					                <th width="45px">Mã</th>
						              <th width="105px">Tên Món</th>
						              <th width="110px">Hình Ảnh</th>
                          <th >Mô tả</th>
						              <th width="74px">Giá</th>
						              <th width="85px">Loại Món</th>
						              <th width="75px">Sửa</th>
						              <th width="67px">Xóa</th>
                          <th width="67px">Tình trạng</th>
					           </tr>
				           </thead>
				           <tbody>
				               <?php
					               
					               while($row= mysqli_fetch_assoc($query)){ ?>
						               <tr>
                           <td width="45px"><?php echo $row['idsanpham']; ?></td>
								           <td width="105px"><?php echo $row['tensp']; ?></td>
								           <td width="110px">
								           <img style="width: 100px; height:100px;" src="../menu/<?php echo $row['hinhanh']; ?>" />
								 
								           </td>
								           <td ><?php echo $row['mota']; ?></td>
								           <td width="74px"><?php echo $row['gia']; ?></td>
								           <td width="80px"><?php echo $row['tenloai']; ?></td>
                           
                      
								           <td width="75px">
                             <?php if (checkPrivilege('/admin.php?page-layout=product-change&id=1')) { ?>
                                   <a href="admin.php?page-layout=product-change&id=<?php echo $row['idsanpham'];?>"><i class="fas fa-cogs" style="color:navy; font-size:25px; cursor: pointer;"></i></a>
                             
                             <?php } ?>
                           </td>
                      
                             
                      
								           <td width="65px">
                             <?php if (checkPrivilege('/admin.php?page-layout=product-delete&id=1')) { ?>
                                  <a onclick="return Del('<?php echo $row['tensp']?>')" href="admin.php?page-layout=product-delete&id=<?php echo $row['idsanpham'];?>"><i class="fas fa-trash-alt" style="color:red; font-size:25px; cursor: pointer;"></i></a>
                             <?php } ?>
                           </td>
                           <?php 
						                  if($row['tinhtrang']==0){ 
                                echo '<td width="90px" style="color:red;">Món ăn đã hết nguyên liệu</td>';
                              }
                              else { 
                                echo '<td width="90px" >Món ăn đủ nguyên liệu</td>';
                              }
						                ?>   
                           
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
      return confirm("Bạn có chắc xóa món ăn " + name + " hay không?");
  }
</script>


