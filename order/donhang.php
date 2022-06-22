<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style-donhang.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--Jquery-->
    <title>Đơn hàng của tôi | ViTasty</title>
    <script>
      $(document).ready(function(){
        $('#logout').click(function(){
            document.location = '../home/logout.php';
        });
      });
    </script>
</head>
<body>
  <div id="background" class="view">
    <div class="d-flex flex-column">
      <?php include("../home/nav-bar.php"); 
      ?>
      <section class="d-flex flex-column of-donhang">
       <div class="d-flex flex-column inside-donhang">
        <div class="row">
          <div class="col-sm-1">
            <div class="user-inf" style="font-size: 19px">
              <div class='user-icon'><i class="far fa-user"></i></div>
              <div><span>
                <?php
                  echo "TK: ".$_SESSION['user'];
                ?>
              </span></div>
            </div>
          </div>
          <div class="col-sm-11">
            <div>
              <h2 style="text-align: center;">Đơn hàng của bạn</h2>
              <div class='border-bottom1'></div>
              <?php 
                $conn = mysqli_connect("localhost","root","","webbanhang");
                $userlogin=$_SESSION['user'];
                $qry1 = "SELECT idKH FROM `user` WHERE username = '$userlogin'";
                $result1 = mysqli_query($conn,$qry1);
                $row1 = mysqli_fetch_assoc($result1);
                $idKH = $row1['idKH'];
                $qry2 = "SELECT * FROM `hoadon` WHERE idKH = '$idKH'";
                $result2 = mysqli_query($conn,$qry2);
                $i=1;
                $rows = mysqli_num_rows($result2);
                if ($rows==0) {
                  # code...
                  echo "<div class='thongbaodonhang'>Hiện bạn chưa có đơn hàng nào</div>";
                }
                while($row2 = mysqli_fetch_array($result2)) {
                  $date = explode("-", $row2['Ngaydat']);
                  $ngay = $date[2];
                  $thang = $date[1];
                  $nam = $date[0];
                  $s='';
                  $qry3 = "SELECT tensp,Soluong FROM `chitiethoadon`,`sanpham` WHERE idHD = '".$row2['idHD']."' AND sanpham.idsanpham = chitiethoadon.idSP";
                  $result3 = mysqli_query($conn,$qry3);
                  while ($row3 = mysqli_fetch_array($result3)) {
                    # code...
                    $s.="<span>".$row3['tensp']." x ".$row3['Soluong']."</span><br>";
                  }
                  echo "<table  class='table-class'>
                          <thead>
                            <tr>
                              <th class='donhang-id'>&nbsp</th>
                              <th class='donhang-product'>Sản phẩm</th>
                              <th class='donhang-date'>Ngày đặt</th>
                              <th class='donhang-addr'>Giao tới</th>
                              <th class='donhang-phonenum'>Số điện thoại</th>
                              <th class='donhang-note'>Ghi chú đơn hàng</th>
                              <th class='donhang-status'>Trạng thái</th>
                              <th class='donhang-delete'>&nbsp</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class='donhang-item'>
                              <td class='donhang-id'>
                                <span>Đơn hàng thứ ".$i++."</span>
                              </td>
                              <td class='donhang-product'>
                                ".$s."
                              </td>
                              <td class='donhang-date'>
                                <span>$ngay-$thang-$nam</span>
                              </td>
                              <td class='donhang-addr'>
                                <span>".$row2['Diachi']."</span>
                              </td>
                              <td class='donhang-phonenum'>
                                <span>".$row2['SDT']."</span>
                              </td>
                              <td class='donhang-note'>
                                <span>".$row2['Ghichu']."</span>
                              </td>
                              <td class='donhang-status'>";
                                if ($row2['idtrangthai']==1) {
                                  # code...
                                  echo "<span class='text-muted'>Chờ xác nhận</span></td>";
                                  echo "<td class='donhang-delete'><div id='delete-donhang' name='".$row2['idHD']."' style='cursor: pointer' ><i style='color:red' class='far fa-trash-alt'></i></div></td>";
                                }
                                else if ($row2['idtrangthai']==2) {
                                  # code...
                                  echo "<span class='text-muted'>Chuẩn bị hàng</span></td>";
                                  echo "<td class='donhang-delete'><div id='delete-donhang' name='".$row2['idHD']."' style='cursor: pointer' ><i style='color:red' class='far fa-trash-alt'></i></div></td>";
                                }
                                else if ($row2['idtrangthai']==3) {
                                  echo "<span class='text-success'>Đang vận chuyển</span></td>";
                                  echo "<td style='width:15%' class='donhang-delete'><div id='delete-donhang-disabled'><span style='margin-left: 10px;'>Đã xử lý nên không thể xóa</span></div></td>";
                                } else if ($row2['idtrangthai']==4) {
                                  echo "<span class='text-success'>Giao hàng thành công</span></td>";
                                  echo "<td style='width:15%' class='donhang-delete'><div id='delete-donhang-disabled'><span style='margin-left: 10px;'>Đã xử lý nên không thể xóa</span></div></td>";
                                } else {
                                  echo "<span class='text-success'>Đơn đã huỷ</span></td>";
                                }
                              echo "</tr>
                          </tbody>
                        </table>
                          <div class='update-btn'>  
                            <div>Tổng tiền : ".number_format($row2['Tongtien'])."đ</div>
                          </div>
                          <div class='border-bottom1'>
                          </div>";
                }
              ?>
              
            </div>
          </div>
        </div>
       </div>
      </section>
      <?php include("../home/contact.php"); 
      ?>
    </div>
  </div>
</body>
<script>
  $(document).ready(function(){
    $('#delete-donhang').click(function(){
      var id = $(this).attr('name');
      var r = confirm("Bạn có chắc muốn xóa đơn hàng ???");
        if(r==true){
          $.ajax({
            url:"deletedonhang.php",
            method:"post",
            data:{idDH:id},
            dataType:"text",
            success:function(data)
            { 
              if (data == 'đã xóa') {
                location.reload();
              }
            }
          });
        }
    });
  }) ;
</script>
<footer>
	
</footer>
</html>