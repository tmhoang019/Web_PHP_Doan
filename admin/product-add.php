<?php
    $sql_type = "SELECT * FROM loaisp";
    $query = mysqli_query($connect, $sql_type);
    function phpAlert($msg) {
         echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    if(isset($_POST['sbm'])){
         $id = $_GET['id'];
         $name = $_POST['pro_name'];
         
         $image = $_FILES['pro_image']['name'];
         $image_tmp = $_FILES['pro_image']['tmp_name'];
         
         $decription = $_POST['pro_decription'];
         $price = $_POST['pro_price'];
         $type = $_POST['pro_type'];
         
         
         $check = mysqli_query($connect,"SELECT `tensp` FROM `sanpham` WHERE tensp='$name'");
         $row_check= mysqli_fetch_array($check);
         
         if($row_check==null){
         $sql_add = "INSERT INTO sanpham (idsanpham, tensp, hinhanh, mota, gia, idloai) VALUES ($id,'$name', 'img/$image', '$decription', $price, $type)";
         $qry = mysqli_query($connect, $sql_add); 
         move_uploaded_file($image_tmp, "../menu/img/$image");
         header("Location: ../admin/admin.php?page-layout=danhsach-product");
         }
         else{
             phpAlert("Tên sản phẩm bạn nhập đã tồn tại !!!");
         }
         
    }
?>
<div class="container">
    <div class="card">
	     <div class="card-header" >
             <h2>Thêm Món Ăn</h2>
			 
         </div>
         <div class="card-body">
             <form method="POST" enctype="multipart/form-data">
			     <div class="form-group">
			          <label for="name">Tên món:</label>
                <input type="text" class="form-control" name="pro_name" id="name" placeholder="Enter the name of the dish" height="20px" required/>
				 </div>

				 <div class="form-group">
			          <label for="image">Hình ảnh:</label>
                <br>
                <input type="file" name="pro_image" id="image"/>
				 </div>

				 <div class="form-group">
			          <label for="decription">Mô tả:</label>
                <input type="text" class="form-control" name="pro_decription" id="decription" placeholder="Enter a description of the dish" height="20px" required/>
				 </div>

				 <div class="form-group">
			          <label for="price">Giá:</label>
                <input type="number" class="form-control" name="pro_price" id="price" placeholder="Enter the price of the dish" height="20px" required/>
				 </div>

               <div class="form-group">
                <label for="type">Tình trạng:</label>
                <select class="form-control" name="pro_state" id="state" height="20px"/>
                    <option  selected="selected" value='0'>Món ăn đã hết nguyên liệu.</option>";
                    <option  value='1'>Món ăn đủ nguyên liệu.</option>";
                </select>
         </div>

         <div class="form-group">
                <label for="type">Loại món:</label>
                <select class="form-control" name="pro_type" id="type" placeholder="Enter the type of dish" height="20px"/>
                     <?php
                          while($row= mysqli_fetch_assoc($query)){ ?>
                               <option value="<?php echo $row['idloai'];?>"><?php echo $row['tenloai'];?></option>
                       <?php } ?>
                     
           
                </select>
         </div>
               <button name="sbm" type="submit" class="btn btn-success">ADD</button>
			 </form>
         </div>
    </div>
</div>


