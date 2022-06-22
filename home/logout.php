<?php 
	session_start();
	if (isset($_SESSION['user'])) {
		# code...
		unset($_SESSION['user']);
		echo "alo1";
		header("Location: ../index.php");
	}
	elseif (isset($_SESSION['user_nv'])) {
		# code...
		unset($_SESSION['user_nv']);
		header("Location: ../index.php");
	}
?>