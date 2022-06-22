<?php
$idtheloai = intval($_GET['theloai']);
$phantrang = intval($_GET['phantrang']);

$con = mysqli_connect('localhost','root','','webbanhang');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM sanpham where tinhtrang='1'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
  $new_array[] = $row;
}
$arraylength = count($new_array);
for ($i=0; $i < $arraylength; $i++) { 
	# code...
	if ($new_array[$i]['idloai']==$idtheloai) {
		# code...
		$temparray[] = $new_array[$i];
	}
}
$arraytemplength = count($temparray);
$sophantrang=(($arraytemplength/6)+1);
$i=($phantrang-1)*6;
$count=0;
echo "<div class='row'>";
for ($i; $i < $arraytemplength ; $i++) { 
	# code...
	echo "<div class='col-sm-6'>";
	echo "<div class='wrap-product'>";
    echo "<div class='img-product' style='background-image: url(".$temparray[$i]['hinhanh'].");'></div>";
    echo "<div class='product-inf'>";
    echo "<div class='price-product'>";
    echo "Giá";
    echo "<div>".$temparray[$i]['gia']."</div>";
    echo "VNĐ";
    echo "</div>";
    echo "<span class='title-product'>".$temparray[$i]['tensp']."</span>";
    echo "<div id='sao'>******</div>";
    echo "<p>".$temparray[$i]['mota']."</p>";
    echo "<form class='cart' action='../order/order-inc.php?action=add&id=" .$temparray[$i]['idsanpham'] . "' method='post'>";
    echo "<div class='quantity'>";
    echo "<label class='screen-reader' for='quantity-number'>Số Lượng</label>";
    echo "<input type='number' id='quantity-number' name='quantity' value='1'>";
    echo "<input type='hidden' name='hidden-name' value='". $temparray[$i]['tensp'] ."'>";
    echo "<input type='hidden' name='hidden-price' value='". $temparray[$i]['gia'] ."'>";
    echo "</div>";
    echo "<input type='submit' name='add-to-cart' id='submit-btn' value='Đặt món ngay'>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    $count++;
    if ($count==6) {
    	# code...
    	break;
    }
}

echo "</div>";
echo "<div class='col-sm-12' id='phantrang'>";
for ($j=1; $j <=$sophantrang ; $j++) { 
	# code...
	if ($j == $phantrang) {
		# code...
		echo "<button class='btn1 active' onclick='showProduct(".$idtheloai.",".$j.")'>".$j."</button>";
	}
	else {
    echo "<button class='btn1' onclick='showProduct(".$idtheloai.",".$j.")'>".$j."</button>";
	}
}
    echo "</div>";
mysqli_close($con);
?>
