<?php 
	if (isset($_POST['idDH'])) {
		# code...
		$conn = mysqli_connect("localhost","root","","webbanhang");
			mysqli_query($conn,"DELETE FROM hoadon WHERE idHD='".$_POST['idDH']."'");
			exit("đã xóa");
	}
?>