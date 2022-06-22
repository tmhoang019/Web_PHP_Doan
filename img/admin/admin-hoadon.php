<?php
   $date = getdate();  
   $sql = "SELECT idHD, user.tenKH, Tongtien, Ngaydat, hoadon.Diachi , hoadon.SDT, Ghichu, idtrangthai FROM hoadon, user WHERE hoadon.idKH = user.idKH";
   $sql2 = "SELECT idHD, user.tenKH, Tongtien, Ngaydat, hoadon.Diachi , hoadon.SDT, Ghichu, idtrangthai FROM hoadon, user WHERE hoadon.idKH = user.idKH";
   $query = mysqli_query($connect,$sql);
   $query2 = mysqli_query($connect,$sql2);
   
   $input_date_low="";
   $input_date_high="";
   
   if($date['mon']<10){$mon="0".$date['mon'];}else{$mon=$date['mon'];}
   if($date['mday']<10){$day="0".$date['mday'];}else{$day=$date['mday'];}
   if(isset($_GET['sbm'])){
      $row2="";
      if(isset($_GET['input-date-low']))
      {
          if($_GET['input-date-low']!=NULL){
              $input_date_low= strtotime($_GET['input-date-low']); 
          }
          else{ $input_date_low= strtotime("1970-01-01"); }
          }
      if(isset($_GET['input-date-high']))
      {
          if($_GET['input-date-high']!=NULL){
              $input_date_high= strtotime($_GET['input-date-high']);
          }
          else{ $input_date_high=$date['year'];
                $input_date_high.="-";
                $input_date_high.=$date['mon'];
                $input_date_high.="-";
                $input_date_high.=$date['mday']; 
            
                $input_date_high = strtotime($input_date_high);
          }
      }
      $result=mysqli_query($connect,"SELECT idHD, Ngaydat FROM hoadon");
      $a= array(); $j=0;
      while($row_test=mysqli_fetch_assoc($result)){
           if(strtotime($row_test['Ngaydat']) <= $input_date_high && strtotime($row_test['Ngaydat']) >= $input_date_low){
               $a[$j]= $row_test['idHD'];
               $j= $j+1;
           }
      }
      $k=$j;   
      echo $j;
      
   }
   $key=0;
   if(isset($_GET['loc'])){
       $tt= $_GET['tinhtrang'];
       $sql3= "SELECT idHD, user.tenKH, Tongtien, Ngaydat, hoadon.Diachi , hoadon.SDT, Ghichu, idtrangthai FROM hoadon, user WHERE hoadon.idKH = user.idKH AND hoadon.idtrangthai = ".$tt;
       $query3 = mysqli_query($connect,$sql3);
       if(!empty($query3)){
       $key=1;
       }
   }
?>
<div class="container"> 
    <div class="card">
	     <div class="card-header" >
             
             <h2>Danh sách hóa đơn 
             
             
             <div class="admin-search">
               <form action="" method="GET" style="display: inline;">
                   <input type="hidden" class="input-number" id="input-number-low" name="page-layout" value="danhsach-hoadon">
                   <input type="date" class="input-number" id="input-number-low" name="input-date-low" placeholder=""/>
                   <span>-</span>
                   <input type="date" class="input-number" id="input-number-high" name="input-date-high" max="<?php echo $date['year'];?>-<?php if($date['mon']<10){echo '0';} echo $date['mon'];?>-<?php echo $day;?>">
                   <button name="sbm" class="btn-search" type="submit" style="filter: none;background: inherit;">
                       <i class="icon-search-admin fas fa-search" ></i>
                   </button>
               </form>
               <form action="" method="GET" style="float:right;">
                 <input type="hidden" class="input-number" id="input-number-low" name="page-layout" value="danhsach-hoadon">
                 <label for="ttrang" style="font-size:19px;">Tình trạng: &nbsp</label>
                   <select id="ttrang" name="tinhtrang" style="height:30px;">
                       <option>---</option>
                       <option value="1" style="font-size:19px;">Chờ xác nhận</option>
                       <option value="2" style="font-size:19px;">Chuẩn bị hàng</option>
                       <option value="3" style="font-size:19px;">Đang giao hàng</option>
                       <option value="4" style="font-size:19px;">Giao hàng thành công</option>
                       <option value="5" style="font-size:19px;">Đã huỷ</option>
                      
                   </select>
                 <button name="loc" class="btn btn-info" type="submit" >LỌC</button>
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
						              <th width="150px">Khách hàng</th>
						              <th width="95px">Tổng tiền</th>
                          <th width="105px">Ngày đặt</th>
						              <th width="100px" style="float:center;">Tình trạng</th>
						              <th >&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Ghi chú</th>
						              <th width="65px">Chi tiết</th>
						              <th width="65px">Xóa</th>
					           </tr>
				           </thead>
				           <tbody>
				               <?php
					               if(isset($_GET['sbm'])){
                             
                             if($a==NULL){
                             echo'<div class="notfound"">Xin lỗi! Món bạn tìm không có! Vui lòng thử lại</div>';
                             die();
                           }else{ $j=0;
                           while($row2= mysqli_fetch_assoc($query2)){ 
                               if($a[$j]==$row2['idHD']){?>
                                
                           <tr>
                             <td width="45px">
                               <?php echo $row2['idHD']; ?>
                             </td>
                             <td width="150px">
                               <?php echo $row2['tenKH']; ?>
                             </td>
                             <td width="95px">
                               <?php echo $row2['Tongtien']; ?>
                             </td>

                             <td width="105px">
                               <?php echo $row2['Ngaydat']; ?>
                             </td>
                             <td width="100px">
                               <?php 
                                      $temp=$row2['idtrangthai'];
                                      $querystate = " SELECT * FROM trangthaigiao where idtrangthai = $temp ";
                                      $rs=mysqli_query($connect,$querystate);
                                      $tinhtrang=mysqli_fetch_assoc($rs);
                                      echo $tinhtrang['tentrangthai'];
                               
                               ?>
                             </td>
                             <td >
                               <?php echo $row2['Ghichu']; ?>
                             </td>


                             <td width="65px">
                               <?php if (checkPrivilege('/admin.php?page-layout=danhsach-bill')) { ?>
                               <a href="admin.php?page-layout=hoadon-chitiet&id=<?php echo $row2['idHD'];?>">Chi tiết
                               </a>

                               <?php } ?>
                             </td>



                             <td width="65px">
                               <?php if (checkPrivilege('/admin.php?page-layout=bill-delete&id=1')) { ?>
                               <a onclick="return Del('<?php echo $row2['idHD']?>')" href="admin.php?page-layout=hoadon-delete&id=<?php echo $row2['idHD'];?>"><i class="fas fa-trash-alt" style="color:red; font-size:25px; cursor: pointer;"></i>
                               </a>
                               <?php } ?>
                             </td>
                             

                           </tr>
                           <?php if($j<$k-1){$j=$j+1;}}}} ?><?php
                         }else{
                             if($key==1){
                                while($row3= mysqli_fetch_assoc($query3)){ ?>
                             <tr>
                               <td width="45px">
                                 <?php echo $row3['idHD']; ?>
                               </td>
                               <td width="150px">
                                 <?php echo $row3['tenKH']; ?>
                               </td>
                               <td width="95px">
                                 <?php echo $row3['Tongtien']; ?>
                               </td>

                               <td width="105px">
                                 <?php echo $row3['Ngaydat']; ?>
                               </td>
                               <td width="100px">
                               <?php 
                                      $temp=$row3['idtrangthai'];
                                      $querystate = " SELECT * FROM trangthaigiao where idtrangthai = $temp ";
                                      $rs=mysqli_query($connect,$querystate);
                                      $tinhtrang=mysqli_fetch_assoc($rs);
                                      echo $tinhtrang['tentrangthai'];
                               
                               ?>
                               </td>
                               <td >
                                 <?php echo $row3['Ghichu']; ?>
                               </td>


                               <td width="65px">
                                 <?php if (checkPrivilege('/admin.php?page-layout=danhsach-bill')) { ?>
                                 <a href="admin.php?page-layout=hoadon-chitiet&id=<?php echo $row3['idHD'];?>">Chi tiết</a>
                                 <?php } ?>
                               </td>



                               <td width="65px">
                                 <?php if (checkPrivilege('/admin.php?page-layout=bill-delete&id=1')) { ?>
                                 <a onclick="return Del('<?php echo $row3['idHD']?>')" href="admin.php?page-layout=hoadon-delete&id=<?php echo $row3['idHD'];?>"><i class="fas fa-trash-alt" style="color:red; font-size:25px; cursor: pointer;"></i>
                                 </a>
                                 <?php } ?>
                               </td>


                             </tr><?php
                             }
                          }
                             else{
					               while($row= mysqli_fetch_assoc($query)){ ?>
						               <tr>
                           <td width="45px"><?php echo $row['idHD']; ?></td>
								           <td width="150px"><?php echo $row['tenKH']; ?></td>
								           <td width="95px"><?php echo $row['Tongtien']; ?></td>
								           
								           <td width="105px"><?php echo $row['Ngaydat']; ?></td>
								           <td width="100px"><?php 
                                      $temp=$row['idtrangthai'];
                                      $querystate = " SELECT * FROM trangthaigiao where idtrangthai = $temp ";
                                      $rs=mysqli_query($connect,$querystate);
                                      $tinhtrang=mysqli_fetch_assoc($rs);
                                      echo $tinhtrang['tentrangthai'];
                               
                               ?></td>
								           <td ><?php echo $row['Ghichu']; ?></td>
                             
                      
								           <td width="65px">
                             <?php if (checkPrivilege('/admin.php?page-layout=danhsach-bill')) { ?>
                                   <a href="admin.php?page-layout=hoadon-chitiet&id=<?php echo $row['idHD'];?>">Chi tiết</a>
                             
                             <?php } ?>
                           </td>
                      
                             
                      
								           <td width="65px">
                             <?php if (checkPrivilege('/admin.php?page-layout=bill-delete&id=1')) { ?>
                                  <a onclick="return Del('<?php echo $row['idHD']?>')" href="admin.php?page-layout=hoadon-delete&id=<?php echo $row['idHD'];?>"><i class="fas fa-trash-alt" style="color:red; font-size:25px; cursor: pointer;"></i></a>
                             <?php } ?>
                           </td>
                      
                             
							           </tr>
					           <?php }}} ?>
					 
				           </tbody>
			      </table>
           </div>
         </div>
    </div>
</div>
<script>
  function Del(ID){
       return confirm("Bạn có chắc muốn xóa hóa đơn có mã là: " + ID + " ?");
            
  }
</script>


