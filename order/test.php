<?php 
	session_start();
	if (isset($_SESSION['cart'])) {
	print_r($_SESSION['cart']);
		# code...
	echo count($_SESSION['cart']);
	if (count($_SESSION['cart']) == 0) {
		# code...
		echo "SOn";
	}
	}
	else {
		# code...
		echo "Thinh";
	}
	$conn = mysqli_connect('localhost','root','','webbanhang');
	$qry = "SELECT idKH FROM `user` WHERE username = 'abc'";
	$result = mysqli_query($conn,$qry);
	$row = mysqli_fetch_assoc($result);
	$id = $row['idKH'];
	echo "alo alo $id";
?>