<?php 
	session_start();
	$dchi = $_POST['dchitxt'];
	$sdt = $_POST['sdttxt'];
	if (isset($_POST['gchutxt'])) {
		# code...
		$ghichu = $_POST['gchutxt'];
	}
	$username = $_SESSION['user'];
	$conn = mysqli_connect("localhost","root","","webbanhang");
	$qry1 = "SELECT idKH FROM `user` WHERE username = '$username'";
	$result1 = mysqli_query($conn,$qry1);
	$row = mysqli_fetch_assoc($result1);
	$idKH = $row['idKH'];
	$qry2 = "SELECT * FROM `hoadon`";
	$result2 = mysqli_query($conn,$qry2);
	$rowcount = mysqli_num_rows($result2);
	$idHD =  $rowcount +1 ;
	$tinhtrang = 1;
	$ngaydat = date("Y-m-d");
	$tongtien=0;
	$product = array();
	$i = 0;
	if(checkphoneNumber($sdt) !== false)
	{
		exit('pswlength');
	}
	foreach ($_SESSION['cart'] as $key => $value) {
		# code...
		$product[$i++] = array(
			"idHD" => "$idHD" ,
			"idSP" => $value['id'],
			"Soluong" => $value['qty'],
			"Dongia" => $value['price'],
			"Thanhtien" => $value['price']*$value['qty']);
		$tongtien+=($value['price']*$value['qty']);
	}
	if (mysqli_query($conn,"INSERT INTO `hoadon`(`idKH`, `Tongtien`, `Ngaydat`, `Diachi`, `SDT`, `Ghichu`, `idtrangthai`) VALUES ('".$idKH."','".$tongtien."','".$ngaydat."','".$dchi."','".$sdt."','".$ghichu."','".$tinhtrang."')")) {
		$last_id = mysqli_insert_id($conn);
		  for ($j=0; $j < count($product); $j++) { 
			# code...
			mysqli_query($conn,"INSERT INTO `chitiethoadon`(`idHD`, `idSP`, `Soluong`, `Dongia`, `Thanhtien`) VALUES ('".$last_id."','".$product[$j]['idSP']."','".$product[$j]['Soluong']."','".$product[$j]['Dongia']."','".$product[$j]['Thanhtien']."')");
			}
			unset($_SESSION['cart']);
			exit("thanh cong");
	} else {
	  exit("khong thanh cong");
	}
	function checkphoneNumber($phonenumber){
        $result = false;
        if (!preg_match("/^0[0-9]{9}$/",$phonenumber)){
            $result = true;
        }
        else
            $result = false;
        return $result;
    }
?>