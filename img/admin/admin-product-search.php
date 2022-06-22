<?php
    include_once 'admin.php';
    $input_search="";
    $input_number_low="";
    $input_number_high="";
    $order="";
	if(isset($_REQUEST['input-search'])){
        $input_search=$_REQUEST['input-search'];
    }
    if(isset($_REQUEST['input-number-low']))
    {
        $input_number_low=$_REQUEST['input-number-low'];
        
    }
    if(isset($_REQUEST['input-number-high']))
    {
        $input_number_high=$_REQUEST['input-number-high'];
    }
    if(isset($_REQUEST['order'])){
        $order=$_REQUEST['order'];
    }
    if($input_number_low==""){$input_number_low="-1";}
    if($input_number_high==""){$input_number_high="99999999";}
    $search="SELECT * FROM `sanpham`,`loaisp` WHERE sanpham.idloai=loaisp.idloai and sanpham.gia >= $input_number_low  AND sanpham.gia <= $input_number_high  ";
    if($input_search!=""){
        $search.="AND sanpham.tensp LIKE '%$input_search%'";
    }
    if($order!=""){
      $search.=" ORDER BY gia $order ";
    }
    $query = mysqli_query($connect,$search);
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
             <h2>
			 DANH SÁCH MÓN ĂN
       <?php if (checkPrivilege('/admin.php?page-layout=product-add&id=1')) {?>
             <a style="float:right;" class="btn btn-primary" href="admin.php?page-layout=product-add&id=<?php echo $n+1;?>">THÊM MÓN
             </a>
             <?php }?>
                    <div class="admin-search">
					<form action="admin.php?page-layout=product-search" method="post" style="display: inherit;">
            <input class="input-search" id="input-search" name="input-search" type="text" placeholder="    Tên sản phẩm" value="<?php if($input_search!="") echo $input_search;  ?>">
						<input type="number" class="input-number" name="input-number-low" placeholder="    Giá thấp nhất" value="<?php if($input_number_low!=-1) echo $input_number_low; ?>"/>
						<span>-</span>
						<input type="number" class="input-number" name="input-number-high" placeholder="    Giá cao nhất" value="<?php if($input_number_high!=99999999) echo $input_number_high; ?>" />
            <select name="order" id="order" class="order" style="font-size: 17px;">
                <option value="DESC" <?php if($order=="DESC") echo 'selected'; ?>>Giá giảm dần</option>
                <option value="ASC" <?php if($order=="ASC") echo 'selected'; ?>>Giá tăng dần</option>
            </select>
						<button name="sbm" class="btn-search" type="submit" style="filter: none;background: inherit;">
                        <i class="icon-search-admin fas fa-search"></i></button>
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
                 </tr>
               </thead>
               <tbody>
                 <?php
					     $i=0;
                           $row=mysqli_fetch_assoc($query);
                           if($row==NUll){
                              echo'<div class="notfound">Xin lỗi! Món bạn tìm không có! Vui lòng thử lại</div>';
                              die();
                           }
					     while($row){ 
                             
                             ?>
                 <tr>
                   <td width="45px">
                     <?php echo $i++; ?>
                   </td>
                   <td width="105px">
                     <?php echo $row['tensp']; ?>
                   </td>
                   <td width="110px">
                     <img style="width: 100px; height:100px;" src="../menu/<?php echo $row['hinhanh']; ?>" />

                   </td>
                   <td >
                     <?php echo $row['mota']; ?>
                   </td>
                   <td width="74px">
                     <?php echo $row['gia']; ?>
                   </td>
                   <td width="85px">
                     <?php echo $row['tenloai']; ?>
                   </td>
                   <td width="75px">
                     <?php if (checkPrivilege('/admin.php?page-layout=product-change&id=1')) { ?>
                     <a href="admin.php?page-layout=product-change&id=<?php echo $row['idsanpham'];?>"><i class="fas fa-cogs" style="color:navy; font-size:25px; cursor: pointer;"></i>
                     </a>
                     <?php } ?>
                   </td>
                   <td width="65px">
                     <?php if (checkPrivilege('/admin.php?page-layout=product-delete&id=1')) { ?>
                     <a onclick="return Del('<?php echo $row['tensp']?>')" href="admin.php?page-layout=product-delete&id=<?php echo $row['idsanpham'];?>"><i class="fas fa-trash-alt" style="color:red; font-size:25px; cursor: pointer;"></i>
                     </a>
                     <?php }?>
                   </td>
                 </tr>
                 <?php 
                            $row=mysqli_fetch_assoc($query);
					} ?>

               </tbody>
             </table>
           </div>
         </div>
    </div>
</div>
<script>
  function Del(name){
       return confirm("Are you sure you want to delete the dish " + name + " or not?");
  }
  
</script>
