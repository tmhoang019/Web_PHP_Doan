<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style-order.css">
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
    <title>Menu | ViTasty</title>
    <script>
	$(":input").bind('keyup mouseup', function () {
		$('#submit-btn').prop("disabled",false);           
	});
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
	        <?php
				if (isset($_GET['remove'])) {
					# code...
					foreach ($_SESSION['cart'] as $key => $value) {
				 		# code...
				 		if ($value['id'] == $_GET['hidden-id']) {
				 			# code...
				 			unset($_SESSION['cart'][$key]);
				 			echo "<script>alert('Đã xóa thành công');</script>";
				 			echo "<script>window.location = 'order.php';</script>";
				 		}
				 	}
				}
			?>
	        <section class="d-flex flex-column of-order">
	        	<div class="d-flex flex-column inside-order">
	        		<div class="header-order">
	          			<h2>Giỏ Hàng</h2>
	        		</div>
	        		<div class="row type-order">
	          			<div class="col-sm-8" id="cart-product">
		            			<table cellspacing="0" class="table-class">
		            				<thead>
		            					<tr>
		            						<th class="product-remove">&nbsp</th>
		            						<th class="product-name">Sản phẩm</th>
		            						<th class="product-price">Giá</th>
		            						<th class="product-quantity">Số lượng</th>
		            						<th class="product-subtotal">Tổng</th>
		            					</tr>
		            				</thead>
		            				<tbody>
		            					<?php
		            						$tongtien=0;

											if (isset($_SESSION["cart"])) {
											 	# code...
												 	if (count($_SESSION['cart']) > 0) {
													 	foreach ($_SESSION["cart"] as $key => $value) {
													 		# code...
													 		echo "<form id='cart-form' method='get' action='order.php?action=remove&id=".$value['id']."'>
													 			  <tr class='cart-item'>
				            									  <td class='product-remove'>
				            									  <input type='submit' name='remove' value='X'>
				            									  <input type='hidden' name='hidden-id' value='".$value['id']."'>
				            									  </td>
				            									  <td class='product-name'>
				            									  <span>".$value['name']."</span>
				            									  </td>
				            						  			  <td class='product-price'>
				            									  <span>".$value['price']."đ</span>
				            									  </td>
				            									  <td class='product-quantity'>
				            									  <input disabled type='text' name='quantity' id='quantity-product-".$value['id']."' value='".$value['qty']."'>
				            									  </td>
				            									  <td class='product-subtotal'>
				            									  <span>".number_format($value['price']*$value['qty'])."</span>
				            									  </td>
				            					 				  </tr>
				            					 				  </form>";
				            					 			$tongtien+=($value['price']*$value['qty']);
													 	}
													 	echo "</tbody>
				            									  </table>
				            									  <div class='update-btn'>	
				            				 						<div>Tổng tiền : ".$tongtien."</div>
				            				 						<button id='thanhtoan-btn' type='submit' value='Thanh toán'>Đặt giao món ngay</button>";
				            				 		}
			            				 		elseif (count($_SESSION['cart'])==0) {
			            				 			# code...
													echo "<tr class='cart-item'>
													<td class='product-name'>
			            									  <span>Chưa có sản phẩm nào</span>
			            									  </td>
													</tr>
													</tbody>
			            									  </table>
			            									  <div class='update-btn'>	
			            				 						<div>Tổng tiền : 0đ</div>
			            				 						<button id='thanhtoan-btn' disabled type='submit' value='Thanh toán'>Đặt giao món ngay</button>";
			            				 		}
											 }
											 else{
											 	echo "<tr class='cart-item'>
													<td class='product-name'>
			            									  <span>Chưa có sản phẩm nào</span>
			            									  </td>
													</tr>
													</tbody>
			            									  </table>
			            									  <div class='update-btn'>	
			            				 						<div>Tổng tiền : 0đ</div>
			            				 						<button id='thanhtoan-btn' disabled type='submit' value='Thanh toán'>Đặt giao món ngay</button>";
											 }
										?>
		            			</div>
	            		</div>
			        	<div class="col-sm-4">
			        		<div class=" guest-inf">
			            		<?php 
			            		if (isset($_SESSION['user'])) {
			            			# code...
			            			$username = $_SESSION['user'];
			            			$conn = mysqli_connect('localhost','root','','webbanhang');
			            			$qry = "SELECT * FROM `user` WHERE username = '$username'";
			            			$result = mysqli_query($conn,$qry);
			            			$row = mysqli_fetch_assoc($result);
			            			echo "<h2>Xin chao," ;
			            			echo $row['tenKH'];
			            			echo "</h2>";
			            			echo 	"<form class='user-inf'>
			            					<div class='user-div'>
			            					<span>Địa chỉ : </span>
			            				  	<div><input type='text' id='diachi-txt' name='diachi-txt' value='".$row['Diachi']."'></div>
			            				  	</div>
			            				  	<div class='user-div'>
			            					<span>Số điện thoại : </span>
			            				  	<div><input type='text' id='sdt-txt' name='sdt-txt' value='".$row['SDT']."'></div>
			            				  	</div>
			            				  	<div class='user-div'>
			            					<span>Ghi chú : </span>
			            				  	<div><textarea id='ghichu-txt' style='width=100%' name='ghichu-txt' rows='4' cols='40' placeholder='Thêm ghi chú cho đơn hàng....'></textarea></div>
			            				  	</div>
			            				  	<div class='user-div'>
			            				  	<span class='warning'>Vui lòng kiểm tra thông tin trước khi ấn thanh toán!!!</span>
			            				  	</div>
			            				  	</form>";
			            		}
			            		else{
			            			echo "<h2 style='font-size:21px !important'>Đăng nhập để mua hàng nào </h2>";
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
<footer>
	
</footer>
</html>
<script>
	$(document).ready(function(){
	    $('#thanhtoan-btn').click(function(){
	      var dchi = $('#diachi-txt').val();
	      var sdt = $('#sdt-txt').val();
	      var ghichu = $('#ghichu-txt').val();
	      if (dchi != '' && sdt != '') {
	        $.ajax({
	          url:"xulydonhang.php",
	          method:"post",
	          data:{dchitxt:dchi,
	                sdttxt:sdt,
	                gchutxt:ghichu,
	                },
	          dataType:"text",
	          success:function(data)
	          {
	            if (data == "thanh cong" ) {
	            	location.reload();
	            	alert("Đặt món thành công");
				}
	            else{ 
					if(data == "khong thanh cong" ) {
	            		alert("Đặt món không thành công, vui lòng thử lại");
	            	}
					if(data == 'pswlength')
						alert("Số điện thoại không hợp lệ");
						document.getElementById("sdt-txt").focus();
				}
	          }
	        });
	      }
	      else{
	        if (dchi == '') {
	        	alert("Địa chỉ không được bỏ trống");
	        	document.getElementById("diachi-txt").focus();
	        }
	        if (sdt == '') {
	        	alert("Số điện thoại không được bỏ trống");
	        	document.getElementById("sdt-txt").focus();
	        }
	      }
	    });
	  }) ;

	
</script>
