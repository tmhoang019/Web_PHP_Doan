<?php   session_start();
		include 'connect-sql.php';
		include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Quản lý</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./resources/css/styles.css">
    <link rel="stylesheet" href="./vendors/css/fontawesome-free-5.14.0-web/css/all.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      </head>
	  <style>
	  body {
  --table-width: 100%; /* Or any value, this will change dinamically */
}
	      tbody {
             display:block;
             max-height:480px;
             overflow-y:auto;
          }
		  thead, tbody tr {
  display:table;
  width: 1050px;
  table-layout:fixed;
}
  thead {
      width: calc( 1050px -2em)
  } 
	  </style>
  <body>
    <div class="admin-container grid-fullwidth gridrow">
        <div class="admin-container-left"><?php require_once 'leftmenu-admin.php';?></div>
        <div class="admin-conainer-right">
            <header class="header-admin">
			<div class="header-admin-left">
				<div style=" width:80px;"><a style="float:left; margin-right:20px;" class="btn btn-outline-info" href="../index.php">Homepage</a></div>
                </div>
                <div class="header-admin-right">
				    <div style=" width:80px;"><a style="float:right; margin-right:20px;" class="btn btn-outline-info" href="logout.php">Đăng xuất</a></div>
				</div>
            </header>
            <div class="admin-body"><?php
				    if(!empty($_SESSION['current_user']['privileges'])){
		            if(isset($_GET['page-layout'])){
		                 switch($_GET['page-layout']){
							   case 'danhsach-product':
							   if (checkPrivilege('/admin.php?page-layout=danhsach-product')) {
									require_once 'admin-product.php';
									break;
									}
							   case 'product-add':
							   if (checkPrivilege('/admin.php?page-layout=product-add&id=1')) {
									require_once 'product-add.php';
									break;
									}
							   case 'product-change':
							   if (checkPrivilege('/admin.php?page-layout=product-change&id=1')) {
									require_once 'product-change.php';
									break;
								    }
							   case 'product-delete':
							   if (checkPrivilege('/admin.php?page-layout=product-delete&id=1')) {
									require_once 'product-delete.php';
									break;
									}
                               case 'danhsach-member':
							   if (checkPrivilege('/admin.php?page-layout=danhsach-nhanvien')) {
									require_once 'admin-member.php';
									break;
									}
							   case 'member-add':
							   if (checkPrivilege('/admin.php?page-layout=member-add&id=1')) {
									require_once 'member-add.php';
									break;
									}
							   case 'member-change':
							   if (checkPrivilege('/admin.php?page-layout=member-change&id=1')) {
									require_once 'member-change.php';
									break;
									}
							   case 'member-delete':
							   if (checkPrivilege('/admin.php?page-layout=member-delete&id=1')) {
									require_once 'member-delete.php';
									break;
									}
							   case 'phanquyen':
							   if (checkPrivilege('/admin.php?page-layout=phanquyen&id=1')) {
									require_once 'member_privilege.php';
									break;
									}
							   case 'product-search':
							   if (checkPrivilege('/admin.php?page-layout=danhsach-product')) {
									require_once 'admin-product-search.php';
									break;
									}
							   case 'danhsach-hoadon':
							   if (checkPrivilege('/admin.php?page-layout=danhsach-bill')) {
									require_once 'admin-hoadon.php';
									break;
									}
							   case 'hoadon-delete':
							   if (checkPrivilege('/admin.php?page-layout=bill-delete&id=1')) {
									require_once 'hoadon-delete.php';
									break;
									}
							   case 'hoadon-chitiet-delete':
							   if (checkPrivilege('/admin.php?page-layout=bill-delete&id=1')) {
									require_once 'hoadon-delete.php';
									break;
									}
							   case 'hoadon-chitiet':
							   if (checkPrivilege('/admin.php?page-layout=danhsach-bill')) {
									require_once 'hoadon-chitiet.php';
									break;
									}
							   case 'revenue':
							   if (checkPrivilege('/admin.php?page-layout=thongke')) {
									require_once 'revenue-item.php';
									require_once 'revenue-user.php';
									break;
									}
							   case 'danhsach-user':
							   if (checkPrivilege('/admin.php?page-layout=danhsach-user')) {
									require_once 'admin-user.php';
									break;
									}
                               case 'user-change':
							   if (checkPrivilege('/admin.php?page-layout=user-change&id=1')) {
									require_once 'user-change.php';
									break;
									}
							   case 'user-delete':
							   if (checkPrivilege('/admin.php?page-layout=user-delete&id=1')) {
									require_once 'user-delete.php';
									break;
									}
							   default:
									require_once 'admin.php';
									break;
			           }
				    }
					}
					else{
					    header("Location: login.php");
					}
					if(isset($_REQUEST['month'])){
					    if (checkPrivilege('/admin.php?page-layout=thongke')) { 
					        require_once 'revenue-item.php';
						    require_once 'revenue-doanhthu.php';
						}
					}	
				?>
           </div>
  </body>
  <script>
       const userStatus = document.querySelectorAll('.table-user-list-itemuser.fs')
    for (let index = 0; index < userStatus.length; index++) {
        const element = userStatus[index];
        if (element.querySelector('div:nth-child(5)').innerHTML.includes("Active")) {
            element.querySelector('.icon-status').style.color = "green";
        } else if (element.querySelector('div:nth-child(5)').innerHTML.includes("Suspended")) {
            element.querySelector('.icon-status').style.color = "red";
        } else if (element.querySelector('div:nth-child(5)').innerHTML.includes("Inactive")) {
            element.querySelector('.icon-status').style.color = "yellow"
        }
    }
	function showitem(){
        document.getElementById("admin-menu-item-div-account").style.display="block";
		document.getElementById("taga").style.backgroundColor="#0b585b";
        document.getElementById("admin-menu-item-account").style.height="170px"
        document.getElementById("admin-menu-item-account").style.display="block"
        document.getElementById("admin-menu-item-account").style.textAlign="none"

    }
    function unshowitem(){
        document.getElementById("admin-menu-item-div-account").style.display="none";
        document.getElementById("admin-menu-item-account").style.height="70px"
        document.getElementById("admin-menu-item-account").style.display="flex"
        document.getElementById("admin-menu-item-account").style.textAlign="center"  
          }
  </script>
</html>

