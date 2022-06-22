<?php
    $id= $_GET['id'];
    $sql_type = "SELECT * FROM loaisp";
    $query = mysqli_query($connect, $sql_type);

	$sql= "SELECT * FROM sanpham WHERE idsanpham='$id'";
	$qry = mysqli_query($connect, $sql); 
	$row_up= mysqli_fetch_assoc($qry);

    if(isset($_POST['sbm'])){
         $id = $_GET['id'];
         $name = $_POST['pro_name'];
         
         if($_FILES['pro_image']['name']==""){
		     $image= $row_up['hinhanh'];
		 }
		 else{
             $image= $_FILES['pro_image']['name'];
			 $image_tmp = $_FILES['pro_image']['tmp_name'];    
			 move_uploaded_file($image_tmp, "../menu/img/$image");         
         }
		
         $decription = $_POST['pro_decription'];
         $price = $_POST['pro_price'];
         $type = $_POST['pro_type'];
         $state = $_POST['pro_state'];
         $sql_change = "UPDATE  sanpham SET idsanpham=$id , tensp= '$name', hinhanh= 'img/$image', mota= '$decription', gia= $price, idloai= $type, tinhtrang= $state WHERE idsanpham=$id";
         $qryli = mysqli_query($connect, $sql_change); 

         header("Location: ../admin/admin.php?page-layout=danhsach-product");
    }
?>
<div class="container">
    <div class="card">
	     <div class="card-header" >
             <h2>SỬA MÓN ĂN</h2>
			 
         </div>
         <div class="card-body">
             <form method="POST" enctype="multipart/form-data">
			     <div class="form-group">
			          <label for="name">Tên món:</label>
                <input type="text" class="form-control" name="pro_name" id="name" placeholder="Enter the name of the dish" height="20px" required value="<?php echo $row_up['tensp']; ?>"/>
				 </div>

				 <div class="form-group">
			          <label for="image">Hình ảnh:</label>
                <br>
                  <img id="hinh" style="width: 100px; height:100px;" src="../menu/<?php echo $row_up['hinhanh']; ?>" />
                  <input type="file" onchange="change(this.value)" name="pro_image" id="image" value="<?php echo $row_up['hinhanh']; ?>"/>
				 </div>

				 <div class="form-group">
			          <label for="decription">Mô tả:</label>
                <input type="text" class="form-control" name="pro_decription" id="decription" placeholder="Enter a description of the dish" height="20px" required value="<?php echo $row_up['mota']; ?>"/>
				 </div>

				 <div class="form-group">
			          <label for="price">Giá:</label>
                <input type="number" class="form-control" name="pro_price" id="price" placeholder="Enter the price of the dish" height="20px" required value="<?php echo $row_up['gia']; ?>"/>
				 </div>
            <div class="form-group">
                <label for="type">Tình trạng:</label>
                <select class="form-control" name="pro_state" id="state" height="20px"/>
                <?php 
						if($row_up['tinhtrang']==0){ 
                            echo "
                            <option  selected=\"selected\" value=\"0\">Món ăn đã hết nguyên liệu.</option>\";
						    <option value=\"1\">Món ăn đủ nguyên liệu.</option>";
                        }
                        else { 
                            echo "
                            <option value=\"0\">Món ăn đã hết nguyên liệu.</option>\";
						    <option selected=\"selected\" value=\"1\">Món ăn đủ nguyên liệu.</option>";
                        }
						?>
                </select>
             </div>
         <div class="form-group">
                <label for="type">Loại món:</label>
                <select class="form-control" name="pro_type" id="type" placeholder="Enter the type of dish" height="20px"/>
                     <?php
                          while($row= mysqli_fetch_assoc($query)){ ?>
						       <?php 
							   if($row['idloai']==$row_up['idloai']){ ?>
							      
                                  <option  selected="selected" value="<?php echo $row['idloai']; ?> "><?php echo $row['tenloai'];?></option>";
						<?php }
							   else{ ?>
							      <option value="<?php echo $row['idloai']; ?> "><?php echo $row['tenloai']; ?></option>";
						<?php  }
							   
                          } ?>
                     
           
                </select>
         </div>

               <button name="sbm" type="submit" class="btn btn-success">SỬA</button>
			 </form>
         </div>
    </div>
</div>
<script>
  function change(x){
  temp = x.split('\\');
  x = temp[temp.length-1];
  document.getElementById("hinh").src="../menu/img/<?php $image?>" + x;
  }
</script>

