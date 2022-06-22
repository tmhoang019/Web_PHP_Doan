<?php
   $layout= $_GET['page-layout'];
   $id= $_GET['id'];
   if($layout == "user-delete"){
        $check="Select * from hoadon where idKH= $id";
        $rs=mysqli_query($connect,$check);
        $row=mysqli_fetch_assoc($rs);
        if($row['idKH'] != NULL ) {
            echo '<script type="text/javascript">alert("Không thể xoá thành viên đã có đơn hàng!!!"); 
                window.location.href = "http://localhost:8080/LapTrinhWeb2/admin/admin.php?page-layout=danhsach-user";
            </script>';          
        }
        else{
        $sql_del = "DELETE FROM user WHERE idKH= ".$id;
        $qry = mysqli_query($connect, $sql_del); 
        echo '<script type="text/javascript">alert("Đã xoá thành công thành viên!!!"); 
                window.location.href = "http://localhost:8080/LapTrinhWeb2/admin/admin.php?page-layout=danhsach-user";
            </script>'; 
        }
   }
?>