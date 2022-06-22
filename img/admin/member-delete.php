<?php
   $layout= $_GET['page-layout'];
   $id= $_GET['id'];
   if($layout == "member-delete"){
       $sql_del = "DELETE FROM user_nv WHERE idNV= ".$id;
       $qry = mysqli_query($connect, $sql_del); 
   }
   header("Location: http://localhost:8080/admin/admin.php?page-layout=danhsach-member");
?>