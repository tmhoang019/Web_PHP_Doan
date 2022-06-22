<?php
   if(isset($_GET['page-layout'])=='hoadon-delete'){
       if(isset($_GET['id'])){
           $id=$_GET['id'];
           $sql_del = "DELETE FROM hoadon WHERE idHD= ".$id;
           $qry = mysqli_query($connect, $sql_del); 
           header("Location: ../admin/admin.php?page-layout=danhsach-hoadon");
       }
       else{
           echo '<script type="text/javascript">alert("Xóa không thành công!!");</script>';
           header("Location: ../admin/admin.php?page-layout=danhsach-hoadon");
       }
   }
?>