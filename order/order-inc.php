<?php
	session_start();
	if(isset($_SESSION['user'])){
		$id = $_GET['id'];
		if (isset($_POST["add-to-cart"])) {
			# code...
			echo $_GET['id'];
			if (isset($_SESSION["cart"])) {
				# code...
				if (!isset($_SESSION["cart"][$_GET['id']])) {
					# code...
					echo "khong trung id";
					$_SESSION["cart"][$_GET['id']]['id'] = $id;
					$_SESSION["cart"][$_GET['id']]['name'] = $_POST['hidden-name'];
					$_SESSION["cart"][$_GET['id']]['price'] = $_POST['hidden-price'];
					$_SESSION["cart"][$_GET['id']]['qty'] = $_POST['quantity'];
					header("Location: ../menu/menu.php"); 
					exit();
				}
				else{
					echo "trung id";
					$_SESSION["cart"][$_GET['id']]['id'] = $id;
					$_SESSION["cart"][$_GET['id']]['name'] = $_POST['hidden-name'];
					$_SESSION["cart"][$_GET['id']]['price'] = $_POST['hidden-price'];
					$_SESSION["cart"][$_GET['id']]['qty'] += $_POST['quantity'];
					header("Location: ../menu/menu.php"); 
					exit();
				}
			}
			else {
				$_SESSION["cart"][$_GET['id']]['id'] = $id;
				$_SESSION["cart"][$_GET['id']]['name'] = $_POST['hidden-name'];
				$_SESSION["cart"][$_GET['id']]['price'] = $_POST['hidden-price'];
				$_SESSION["cart"][$_GET['id']]['qty'] = $_POST['quantity'];
				header("Location: ../menu/menu.php"); 
				exit();
			}
		}
	}
	else{
		header("Location: ../menu/menu.php?error=notlogin"); 
		exit();
	}
?>
