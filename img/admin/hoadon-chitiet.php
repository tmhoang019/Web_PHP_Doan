<?php
 
    function phpAlert($msg) {
         echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    $date = getdate(); 
    if(isset($_GET['sbm'])){
        $idHD= $_GET['id'];
        $trangthai= $_GET['tt'];
        $sql2="UPDATE hoadon SET idtrangthai = $trangthai WHERE idHD= $idHD" ;
        $qry2 = mysqli_query($connect, $sql2); 
        header("Location: ../admin/admin.php?page-layout=danhsach-hoadon");
    }
   
  $id= $_GET['id'];
	$sql= "SELECT hoadon.idHD, sanpham.idsanpham , sanpham.tensp, Soluong, sanpham.gia, Thanhtien,tenKH, Tongtien, Ngaydat, hoadon.Diachi, hoadon.SDT, Ghichu, idtrangthai FROM chitiethoadon, hoadon, user, sanpham WHERE chitiethoadon.idHD = hoadon.idHD AND hoadon.idKH = user.idKH AND chitiethoadon.idSP= sanpham.idsanpham AND hoadon.idHD = ".$id;
	$qry = mysqli_query($connect, $sql);  
?>
<div class="container">
  <div class="card">
    <div class="card-header" >

      <h2>
        Chi Tiết Hóa Đơn
        <a style="float:right;" class="btn btn-outline-primary" href="hoadon-printing.php?id=<?php echo $_GET['id'];?>">IN HÓA ĐƠN</a>

        <div class="admin-search">
        </div>


      </h2>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr class="table-active">
              
              <th width="105px">Tên Món</th>
              <th width="68px">Số lượng</th>
              
              <th width="85px">Đơn giá</th>
              <th width="110px">Thành tiền</th>
              <th width="75px">Sửa</th>
              <th width="67px">Xóa</th>
            </tr>
          </thead>
          <tbody>
            <form method="GET" action="">
            <?php
					               $tongtien=0; $tenKH=""; $diachi=""; $sdt=""; $ngaydat=""; $idtrangthai=""; $ghichu=""; $hd="";
					               while($row= mysqli_fetch_assoc($qry)){ $hd=$row['idHD'];?>
            <tr>
              
                <td width="105px">
                  <?php echo $row['tensp'];?>
                </td>
                <td width="68px">
                  <?php echo $row['Soluong'];?>
                </td>

                <td width="85px">
                  <?php echo $row['gia']; ?>đ
                </td>
                <td width="110px">
                  <?php $thanhtien= $row['Soluong']*$row['gia']; echo $thanhtien; $tongtien=$tongtien + $thanhtien;?>đ
                </td>


                <td width="75px">
                  -----
                </td>



                <td width="67px">
                  -----
                </td>
              

            </tr>
            </form>
            <?php $tenKH=$row['tenKH']; $diachi=$row['Diachi']; $sdt=$row['SDT']; $ngaydat=$row['Ngaydat']; $idtrangthai=$row['idtrangthai']; $ghichu=$row['Ghichu'];  } ?>
            <tr>
              <td colspan="6">Tổng tiền: &nbsp &nbsp <?php echo $tongtien; ?>đ</td>
              
            </tr>
          </tbody>

        </table>
        <span style="font-size:18px;">
          <strong>Người đặt: </strong>&nbsp <?php echo $tenKH; ?>
        </span>
        <br>
        <span style="font-size:18px;">
          <strong>Địa chỉ giao hàng: </strong>&nbsp <?php echo $diachi; ?>
        </span>
        <br>
        <span style="font-size:18px;">
          <strong>SĐT liên lạc: </strong>&nbsp <?php echo $sdt; ?>
        </span>
        <br>
        <span style="font-size:18px;">
          <strong>Ngày đặt: &nbsp </strong> &nbsp<?php echo $ngaydat; ?>
          </span>
        <br>
          
            <span style="font-size:18px;">
              <strong>Ghi chú:</strong>
          </span><br>
          <textarea style="font-size:18px;" readonly><?php echo $ghichu; ?></textarea>
        <br>
        <span style="font-size:18px;" >
            <strong>Tình trạng: &nbsp </strong>
          </span>
           <form method="GET">
                <input type="hidden" name="page-layout" value="hoadon-chitiet"></input>
                <input type="hidden" name="id" value="<?php echo $hd; ?>"></input>
                <select class="form-control" name="tt" id="type" style="display:inline-block; width:200px; " onchange="Block()" placeholder="Enter the type of dish" height="20px">
                <?php 
                      // $sa1 = "SELECT * FROM trangthaigiao";
                      // $rs=mysqli_query($connect,$sql);
                      // var_dump($rs);
                      // while ( $tinhtrang=mysqli_fetch_assoc($rs) ){
                      //   $temp1=$tinhtrang['tentinhtrang'];
                      //   $temp2=$tinhtrang['idtinhtrang'];
                      //   if($idtrangthai==$tinhtrang['idtinhtrang'])
                      //   {
                      //     echo "<option selected='selected' value=\"$temp2\" >$temp1</option>";
                      //   } else { 
                      //     echo "<option value=\"$temp2\">$temp1</option>";
                      //   }
                      //}
                      if ($idtrangthai == 1){ 
                        echo "<option selected='selected' value=\"$idtrangthai\" >Chờ xác nhận.</option>"; 
                        echo "<option value=\"2\" >Chuẩn bị hàng.</option>";
                        echo "<option value=\"3\" >Đang giao hàng.</option>";
                        echo "<option value=\"4\" >Giao hàng thành công.</option>";
                        echo "<option value=\"5\" >Huỷ đơn.</option>";
                      }
                      else if ($idtrangthai == 2){ 
                        echo "<option value=\"1\" >Chờ xác nhận.</option>"; 
                        echo "<option selected='selected' value=\"2\" >Chuẩn bị hàng.</option>";
                        echo "<option value=\"3\" >Đang giao hàng.</option>";
                        echo "<option value=\"4\" >Giao hàng thành công.</option>";
                        echo "<option value=\"5\" >Huỷ đơn.</option>";
                      }
                      else if ($idtrangthai == 3){ 
                        echo "<option value=\"1\" >Chờ xác nhận.</option>"; 
                        echo "<option value=\"2\" >Chuẩn bị hàng.</option>";
                        echo "<option selected='selected' value=\"3\" >Đang giao hàng.</option>";
                        echo "<option value=\"4\" >Giao hàng thành công.</option>";
                        echo "<option value=\"5\" >Huỷ đơn.</option>";
                      }
                      else if ($idtrangthai == 4){ 
                        echo "<option value=\"1\" >Chờ xác nhận.</option>"; 
                        echo "<option value=\"2\" >Chuẩn bị hàng.</option>";
                        echo "<option value=\"3\" >Đang giao hàng.</option>";
                        echo "<option selected='selected' value=\"4\" >Giao hàng thành công.</option>";
                        echo "<option value=\"5\" >Huỷ đơn.</option>";
                      }
                      else if ($idtrangthai == 5){ 
                        echo "<option value=\"1\" >Chờ xác nhận.</option>"; 
                        echo "<option value=\"2\" >Chuẩn bị hàng.</option>";
                        echo "<option value=\"3\" >Đang giao hàng.</option>";
                        echo "<option value=\"4\" >Giao hàng thành công.</option>";
                        echo "<option selected='selected' value=\"5\" >Huỷ đơn.</option>";
                      }
                      

                ?>
                </select>
                <button name="sbm" type="submit" id="btn" style="display:none; margin-left:10px;" class="btn btn-success">Cập nhật</button>
          </form>

          <br>
      </div>
    </div>
  </div>
</div>
<script>
  function Block(){
      document.getElementById("btn").style.display="inline-block";
  }
</script>
