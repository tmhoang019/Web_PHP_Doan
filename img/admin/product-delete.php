<?php
   $layout= $_GET['page-layout'];
   $id= $_GET['id'];
   if($layout == "product-delete"){
        $check="Select * from chitiethoadon where idSP= $id";
        $rs=mysqli_query($connect,$check);
        $row=mysqli_fetch_assoc($rs);
        if($row['idSP'] != NULL ) {
            echo '<script type="text/javascript">alert("Không thể xoá món ăn đã có đơn hàng!!!"); 
                window.location.href = "http://localhost:8080/LapTrinhWeb2/admin/admin.php?page-layout=danhsach-product";
            </script>';          
        }
        else{
        $sql_del = "DELETE FROM sanpham WHERE idsanpham= $id";
        $qry = mysqli_query($connect, $sql_del); 
        echo '<script type="text/javascript">alert("Đã xoá thành công món ăn!!!"); 
                window.location.href = "http://localhost:8080/LapTrinhWeb2/admin/admin.php?page-layout=danhsach-product";
            </script>'; 
        }
   }
?>