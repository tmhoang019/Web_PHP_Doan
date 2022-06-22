<?php
 if (isset($_GET['action'])) {
 	# code...
 	if($_GET['action'] == 'remove'){
 		echo "chay ne";
	 	foreach ($_SESSION['cart'] as $key => $value) {
	 		# code...
	 		if ($value['id'] == $_GET['id']) {
	 			# code...
	 			unset($_SESSION['cart'][$key]);
	 		}
	 	}
 	}
 	header("Location: order.php?return=ok");
 }
 else{
 	echo "khong co action";
 }