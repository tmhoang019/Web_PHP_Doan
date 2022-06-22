<?php
if(!isset($_GET['type'])){
	if(isset($_POST['loai']) && isset($_POST['price'])) {
		if($_POST['loai'] == 0 && $_POST['price'] == 0){
			if (isset($_POST['search'])||isset($_GET['search-ptrang'])) {
				# code...
				if(isset($_POST['search'])){
					$input = $_POST['search'];	
				}
				elseif (isset($_GET['search-ptrang'])) {
					# code...
					$input = ($_GET['search-ptrang']);
				}
				$con = mysqli_connect('localhost','root','','webbanhang');
				if (!$con) {
				  die('Could not connect: ' . mysqli_error($con));
				}

				$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND tinhtrang='1'";
				$result = mysqli_query($con,$qry);
				if (mysqli_num_rows($result)>0) {
					# code...
					while($row = mysqli_fetch_array($result)) {
						$new_array[] = $row;
					}
						$arraylength = count($new_array);
						$sophantrang=(($arraylength/6)+1);
						if (isset($_GET['phantrang'])) {
							# code...
							$phantrang=$_GET['phantrang'];
							$i=($_GET["phantrang"]-1)*6;
						}
						else{
						$phantrang=1;
						$i=0;
						}
						$count=0;
						echo "<div class='row'>";
						for ($i; $i < $arraylength ; $i++) { 
							# code...
							echo "<div class='col-sm-6'>";
							echo "<div class='wrap-product'>";
						    echo "<div class='img-product' style='background-image: url(".$new_array[$i]['hinhanh'].");'></div>";
						    echo "<div class='product-inf'>";
						    echo "<div class='price-product'>";
						    echo "Giá";
						    echo "<div>".$new_array[$i]['gia']."</div>";
						    echo "VNĐ";
						    echo "</div>";
						    echo "<span class='title-product'>".$new_array[$i]['tensp']."</span>";
						    echo "<div id='sao'>******</div>";
						    echo "<p>".$new_array[$i]['mota']."</p>";
						    echo "<form class='cart' action='../order/order-inc.php?action=add&id=" .$new_array[$i]['idsanpham'] . "' method='post'>";
						    echo "<div class='quantity'>";
						    echo "<label class='screen-reader' for='quantity-number'>Số Lượng</label>";
						    echo "<input type='number' id='quantity-number' name='quantity' value='1'>";
						    echo "<input type='hidden' name='hidden-name' value='". $new_array[$i]['tensp'] ."'>";
						    echo "<input type='hidden' name='hidden-price' value='". $new_array[$i]['gia'] ."'>";
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
						if ($sophantrang > 2)
						{
							echo "<div class='col-sm-12' id='phantrang'>";
									for ($j=1; $j <$sophantrang ; $j++) { 
										# code...
										if ($j == $phantrang) {
											# code...
											echo "<button class='btn1 active' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
										}
										else {
									    echo "<button class='btn1' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
										}
									}
									    echo "</div>";
						}
				}
				else{
					exit("không tìm thấy món hoặc đã hết");
				}
			}
			else{
				exit();
			}
		}
		elseif ($_POST['loai'] > 0 && $_POST['price'] > 0 ) {
			$loaisp=$_POST['loai'];
			$price=$_POST['price'];
			if (isset($_POST['search'])||isset($_GET['search-ptrang'])) {
				# code...
				if(isset($_POST['search'])){
					$input = $_POST['search'];	
				}
				elseif (isset($_GET['search-ptrang'])) {
					# code...
					$input = ($_GET['search-ptrang']);
				}
				if ($price==1) {
					# code...
					$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND gia < 15000 AND tinhtrang='1'";

				}
				elseif ($price==2) {
					# code...
					$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND gia >=15000 AND gia < 30000 AND tinhtrang='1'";

				}
				elseif ($price==3) {
					# code...
					$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND gia >= 30000 AND gia < 45000 AND tinhtrang='1'";

				}
				elseif ($price==4) {
					# code...
					$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND gia >= 45000 AND tinhtrang='1'";

				}	
				$con = mysqli_connect('localhost','root','','webbanhang');
				if (!$con) {
				  die('Could not connect: ' . mysqli_error($con));
				}

				$result = mysqli_query($con,$qry);
				if (mysqli_num_rows($result)>0) {
					# code...
					while($row = mysqli_fetch_array($result)) {
						$new_array[] = $row;
					}
						$arraylength = count($new_array);
						$sophantrang=(($arraylength/6)+1);
						if (isset($_GET['phantrang'])) {
							# code...
							$phantrang=$_GET['phantrang'];
							$i=($_GET["phantrang"]-1)*6;
						}
						else{
						$phantrang=1;
						$i=0;
						}
						$count=0;
						echo "<div class='row'>";
						for ($i; $i < $arraylength ; $i++) { 
							# code...
							echo "<div class='col-sm-6'>";
							echo "<div class='wrap-product'>";
						    echo "<div class='img-product' style='background-image: url(".$new_array[$i]['hinhanh'].");'></div>";
						    echo "<div class='product-inf'>";
						    echo "<div class='price-product'>";
						    echo "Giá";
						    echo "<div>".$new_array[$i]['gia']."</div>";
						    echo "VNĐ";
						    echo "</div>";
						    echo "<span class='title-product'>".$new_array[$i]['tensp']."</span>";
						    echo "<div id='sao'>******</div>";
						    echo "<p>".$new_array[$i]['mota']."</p>";
						    echo "<form class='cart' action='../order/order-inc.php?action=add&id=" .$new_array[$i]['idsanpham'] . "' method='post'>";
						    echo "<div class='quantity'>";
						    echo "<label class='screen-reader' for='quantity-number'>Số Lượng</label>";
						    echo "<input type='number' id='quantity-number' name='quantity' value='1'>";
						    echo "<input type='hidden' name='hidden-name' value='". $new_array[$i]['tensp'] ."'>";
						    echo "<input type='hidden' name='hidden-price' value='". $new_array[$i]['gia'] ."'>";
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
						if ($sophantrang > 2)
						{
							echo "<div class='col-sm-12' id='phantrang'>";
									for ($j=1; $j <$sophantrang ; $j++) { 
										# code...
										if ($j == $phantrang) {
											# code...
											echo "<button class='btn1 active' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
										}
										else {
									    echo "<button class='btn1' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
										}
									}
									    echo "</div>";
						}
				}
				else{
					exit("không tìm thấy món hoặc đã hết");
				}
			}
			else{
				exit();
			}
		}
		elseif ($_POST['loai'] > 0 || $_POST['price'] > 0 ) {
				if($_POST['loai'] > 0){
								$loaisp=$_POST['loai'];
								if (isset($_POST['search'])||isset($_GET['search-ptrang'])) {
									# code...
									if(isset($_POST['search'])){
										$input = $_POST['search'];	
									}
									elseif (isset($_GET['search-ptrang'])) {
										# code...
										$input = ($_GET['search-ptrang']);
									}
									$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND tinhtrang='1'";
									
									$con = mysqli_connect('localhost','root','','webbanhang');
									if (!$con) {
									  die('Could not connect: ' . mysqli_error($con));
									}
				
									$result = mysqli_query($con,$qry);
									if (mysqli_num_rows($result)>0) {
										# code...
										while($row = mysqli_fetch_array($result)) {
											$new_array[] = $row;
										}
											$arraylength = count($new_array);
											$sophantrang=(($arraylength/6)+1);
											if (isset($_GET['phantrang'])) {
												# code...
												$phantrang=$_GET['phantrang'];
												$i=($_GET["phantrang"]-1)*6;
											}
											else{
											$phantrang=1;
											$i=0;
											}
											$count=0;
											echo "<div class='row'>";
											for ($i; $i < $arraylength ; $i++) { 
												# code...
												echo "<div class='col-sm-6'>";
												echo "<div class='wrap-product'>";
											    echo "<div class='img-product' style='background-image: url(".$new_array[$i]['hinhanh'].");'></div>";
											    echo "<div class='product-inf'>";
											    echo "<div class='price-product'>";
											    echo "Giá";
											    echo "<div>".$new_array[$i]['gia']."</div>";
											    echo "VNĐ";
											    echo "</div>";
											    echo "<span class='title-product'>".$new_array[$i]['tensp']."</span>";
											    echo "<div id='sao'>******</div>";
											    echo "<p>".$new_array[$i]['mota']."</p>";
											    echo "<form class='cart' action='../order/order-inc.php?action=add&id=" .$new_array[$i]['idsanpham'] . "' method='post'>";
											    echo "<div class='quantity'>";
											    echo "<label class='screen-reader' for='quantity-number'>Số Lượng</label>";
											    echo "<input type='number' id='quantity-number' name='quantity' value='1'>";
											    echo "<input type='hidden' name='hidden-name' value='". $new_array[$i]['tensp'] ."'>";
											    echo "<input type='hidden' name='hidden-price' value='". $new_array[$i]['gia'] ."'>";
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
											if ($sophantrang > 2)
											{
												echo "<div class='col-sm-12' id='phantrang'>";
														for ($j=1; $j <$sophantrang ; $j++) { 
															# code...
															if ($j == $phantrang) {
																# code...
																echo "<button class='btn1 active' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
															}
															else {
														    echo "<button class='btn1' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
															}
														}
														    echo "</div>";
											}
									}
									else{
										exit("không tìm thấy món hoặc đã hết");
									}
								}
								else{
									exit();
								}
				}
				else{
						$price=$_POST['price'];
						if (isset($_POST['search'])||isset($_GET['search-ptrang'])) {
							# code...
							if(isset($_POST['search'])){
								$input = $_POST['search'];	
							}
							elseif (isset($_GET['search-ptrang'])) {
								# code...
								$input = ($_GET['search-ptrang']);
							}
							if ($price==1) {
								# code...
								$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND gia < 15000 AND tinhtrang='1'";

							}
							elseif ($price==2) {
								# code...
								$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND gia >=15000 AND gia < 30000 AND tinhtrang='1'";

							}
							elseif ($price==3) {
								# code...
								$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND gia >= 30000 AND gia < 45000 AND tinhtrang='1'";

							}
							elseif ($price==4) {
								# code...
								$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND gia >= 45000 AND tinhtrang='1'";

							}	
							$con = mysqli_connect('localhost','root','','webbanhang');
							if (!$con) {
							  die('Could not connect: ' . mysqli_error($con));
							}

							$result = mysqli_query($con,$qry);
							if (mysqli_num_rows($result)>0) {
								# code...
								while($row = mysqli_fetch_array($result)) {
									$new_array[] = $row;
								}
									$arraylength = count($new_array);
									$sophantrang=(($arraylength/6)+1);
									if (isset($_GET['phantrang'])) {
										# code...
										$phantrang=$_GET['phantrang'];
										$i=($_GET["phantrang"]-1)*6;
									}
									else{
									$phantrang=1;
									$i=0;
									}
									$count=0;
									echo "<div class='row'>";
									for ($i; $i < $arraylength ; $i++) { 
										# code...
										echo "<div class='col-sm-6'>";
										echo "<div class='wrap-product'>";
									    echo "<div class='img-product' style='background-image: url(".$new_array[$i]['hinhanh'].");'></div>";
									    echo "<div class='product-inf'>";
									    echo "<div class='price-product'>";
									    echo "Giá";
									    echo "<div>".$new_array[$i]['gia']."</div>";
									    echo "VNĐ";
									    echo "</div>";
									    echo "<span class='title-product'>".$new_array[$i]['tensp']."</span>";
									    echo "<div id='sao'>******</div>";
									    echo "<p>".$new_array[$i]['mota']."</p>";
									    echo "<form class='cart' action='../order/order-inc.php?action=add&id=" .$new_array[$i]['idsanpham'] . "' method='post'>";
									    echo "<div class='quantity'>";
									    echo "<label class='screen-reader' for='quantity-number'>Số Lượng</label>";
									    echo "<input type='number' id='quantity-number' name='quantity' value='1'>";
									    echo "<input type='hidden' name='hidden-name' value='". $new_array[$i]['tensp'] ."'>";
									    echo "<input type='hidden' name='hidden-price' value='". $new_array[$i]['gia'] ."'>";
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
									if ($sophantrang > 2)
									{
										echo "<div class='col-sm-12' id='phantrang'>";
												for ($j=1; $j <$sophantrang ; $j++) { 
													# code...
													if ($j == $phantrang) {
														# code...
														echo "<button class='btn1 active' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
													}
													else {
												    echo "<button class='btn1' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
													}
												}
												    echo "</div>";
									}
							}
							else{
								exit("không tìm thấy món hoặc đã hết");
							}
						}
						else{
							exit();
						}
					}
				}
	}
}
else{
		if(isset($_GET['loai-ptrang']) && isset($_GET['gia-ptrang'])) {
		if($_GET['loai-ptrang'] ==0 && $_GET['gia-ptrang'] == 0){
			if (isset($_POST['search'])||isset($_GET['search-ptrang'])) {
				# code...
				if(isset($_POST['search'])){
					$input = $_POST['search'];	
				}
				elseif (isset($_GET['search-ptrang'])) {
					# code...
					$input = ($_GET['search-ptrang']);
				}
				$con = mysqli_connect('localhost','root','','webbanhang');
				if (!$con) {
				  die('Could not connect: ' . mysqli_error($con));
				}

				$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND tinhtrang='1'";
				$result = mysqli_query($con,$qry);
				if (mysqli_num_rows($result)>0) {
					# code...
					while($row = mysqli_fetch_array($result)) {
						$new_array[] = $row;
					}
						$arraylength = count($new_array);
						$sophantrang=(($arraylength/6)+1);
						if (isset($_GET['phantrang'])) {
							# code...
							$phantrang=$_GET['phantrang'];
							$i=($_GET["phantrang"]-1)*6;
						}
						else{
						$phantrang=1;
						$i=0;
						}
						$count=0;
						echo "<div class='row'>";
						for ($i; $i < $arraylength ; $i++) { 
							# code...
							echo "<div class='col-sm-6'>";
							echo "<div class='wrap-product'>";
						    echo "<div class='img-product' style='background-image: url(".$new_array[$i]['hinhanh'].");'></div>";
						    echo "<div class='product-inf'>";
						    echo "<div class='price-product'>";
						    echo "Giá";
						    echo "<div>".$new_array[$i]['gia']."</div>";
						    echo "VNĐ";
						    echo "</div>";
						    echo "<span class='title-product'>".$new_array[$i]['tensp']."</span>";
						    echo "<div id='sao'>******</div>";
						    echo "<p>".$new_array[$i]['mota']."</p>";
						    echo "<form class='cart' action='../order/order-inc.php?action=add&id=" .$new_array[$i]['idsanpham'] . "' method='post'>";
						    echo "<div class='quantity'>";
						    echo "<label class='screen-reader' for='quantity-number'>Số Lượng</label>";
						    echo "<input type='number' id='quantity-number' name='quantity' value='1'>";
						    echo "<input type='hidden' name='hidden-name' value='". $new_array[$i]['tensp'] ."'>";
						    echo "<input type='hidden' name='hidden-price' value='". $new_array[$i]['gia'] ."'>";
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
						if ($sophantrang > 2)
						{
							echo "<div class='col-sm-12' id='phantrang'>";
									for ($j=1; $j <$sophantrang ; $j++) { 
										# code...
										if ($j == $phantrang) {
											# code...
											echo "<button class='btn1 active' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
										}
										else {
									    echo "<button class='btn1' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
										}
									}
									    echo "</div>";
						}
				}
				else{
					exit("Không tìm thấy món hoặc đã hết");
				}
			}
			else{
				exit();
			}
		}
		elseif ($_GET['loai-ptrang'] > 0 && $_GET['gia-ptrang'] > 0 ) {
			$loaisp=$_GET['loai-ptrang'];
			$price=$_GET['gia-ptrang'];
			if (isset($_POST['search'])||isset($_GET['search-ptrang'])) {
				# code...
				if(isset($_POST['search'])){
					$input = $_POST['search'];	
				}
				elseif (isset($_GET['search-ptrang'])) {
					# code...
					$input = ($_GET['search-ptrang']);
				}
				if ($price==1) {
					# code...
					$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND gia < 15000 AND tinhtrang='1'";

				}
				elseif ($price==2) {
					# code...
					$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND gia >=15000 AND gia < 30000 AND tinhtrang='1'";

				}
				elseif ($price==3) {
					# code...
					$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND gia >= 30000 AND gia < 45000 AND tinhtrang='1'";

				}
				elseif ($price==4) {
					# code...
					$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND gia >= 45000 AND tinhtrang='1'";

				}	
				$con = mysqli_connect('localhost','root','','webbanhang');
				if (!$con) {
				  die('Could not connect: ' . mysqli_error($con));
				}

				$result = mysqli_query($con,$qry);
				if (mysqli_num_rows($result)>0) {
					# code...
					while($row = mysqli_fetch_array($result)) {
						$new_array[] = $row;
					}
						$arraylength = count($new_array);
						$sophantrang=(($arraylength/6)+1);
						if (isset($_GET['phantrang'])) {
							# code...
							$phantrang=$_GET['phantrang'];
							$i=($_GET["phantrang"]-1)*6;
						}
						else{
						$phantrang=1;
						$i=0;
						}
						$count=0;
						echo "<div class='row'>";
						for ($i; $i < $arraylength ; $i++) { 
							# code...
							echo "<div class='col-sm-6'>";
							echo "<div class='wrap-product'>";
						    echo "<div class='img-product' style='background-image: url(".$new_array[$i]['hinhanh'].");'></div>";
						    echo "<div class='product-inf'>";
						    echo "<div class='price-product'>";
						    echo "Giá";
						    echo "<div>".$new_array[$i]['gia']."</div>";
						    echo "VNĐ";
						    echo "</div>";
						    echo "<span class='title-product'>".$new_array[$i]['tensp']."</span>";
						    echo "<div id='sao'>******</div>";
						    echo "<p>".$new_array[$i]['mota']."</p>";
						    echo "<form class='cart' action='../order/order-inc.php?action=add&id=" .$new_array[$i]['idsanpham'] . "' method='post'>";
						    echo "<div class='quantity'>";
						    echo "<label class='screen-reader' for='quantity-number'>Số Lượng</label>";
						    echo "<input type='number' id='quantity-number' name='quantity' value='1'>";
						    echo "<input type='hidden' name='hidden-name' value='". $new_array[$i]['tensp'] ."'>";
						    echo "<input type='hidden' name='hidden-price' value='". $new_array[$i]['gia'] ."'>";
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
						if ($sophantrang > 2)
						{
							echo "<div class='col-sm-12' id='phantrang'>";
									for ($j=1; $j <$sophantrang ; $j++) { 
										# code...
										if ($j == $phantrang) {
											# code...
											echo "<button class='btn1 active' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
										}
										else {
									    echo "<button class='btn1' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
										}
									}
									    echo "</div>";
						}
				}
				else{
					exit("không tìm thấy món hoặc đã hết");
				}
			}
			else{
				exit();
			}
		}
		elseif ($_GET['loai-ptrang'] > 0 || $_GET['gia-ptrang'] > 0 ) {
				if($_GET['loai-ptrang'] > 0){
								$loaisp=$_GET['loai-ptrang'];
								if (isset($_POST['search'])||isset($_GET['search-ptrang'])) {
									# code...
									if(isset($_POST['search'])){
										$input = $_POST['search'];	
									}
									elseif (isset($_GET['search-ptrang'])) {
										# code...
										$input = ($_GET['search-ptrang']);
									}
									$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND idloai = $loaisp AND tinhtrang='1'";
									
									$con = mysqli_connect('localhost','root','','webbanhang');
									if (!$con) {
									  die('Could not connect: ' . mysqli_error($con));
									}
				
									$result = mysqli_query($con,$qry);
									if (mysqli_num_rows($result)>0) {
										# code...
										while($row = mysqli_fetch_array($result)) {
											$new_array[] = $row;
										}
											$arraylength = count($new_array);
											$sophantrang=(($arraylength/6)+1);
											if (isset($_GET['phantrang'])) {
												# code...
												$phantrang=$_GET['phantrang'];
												$i=($_GET["phantrang"]-1)*6;
											}
											else{
											$phantrang=1;
											$i=0;
											}
											$count=0;
											echo "<div class='row'>";
											for ($i; $i < $arraylength ; $i++) { 
												# code...
												echo "<div class='col-sm-6'>";
												echo "<div class='wrap-product'>";
											    echo "<div class='img-product' style='background-image: url(".$new_array[$i]['hinhanh'].");'></div>";
											    echo "<div class='product-inf'>";
											    echo "<div class='price-product'>";
											    echo "Giá";
											    echo "<div>".$new_array[$i]['gia']."</div>";
											    echo "VNĐ";
											    echo "</div>";
											    echo "<span class='title-product'>".$new_array[$i]['tensp']."</span>";
											    echo "<div id='sao'>******</div>";
											    echo "<p>".$new_array[$i]['mota']."</p>";
											    echo "<form class='cart' action='../order/order-inc.php?action=add&id=" .$new_array[$i]['idsanpham'] . "' method='post'>";
											    echo "<div class='quantity'>";
											    echo "<label class='screen-reader' for='quantity-number'>Số Lượng</label>";
											    echo "<input type='number' id='quantity-number' name='quantity' value='1'>";
											    echo "<input type='hidden' name='hidden-name' value='". $new_array[$i]['tensp'] ."'>";
											    echo "<input type='hidden' name='hidden-price' value='". $new_array[$i]['gia'] ."'>";
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
											if ($sophantrang > 2)
											{
												echo "<div class='col-sm-12' id='phantrang'>";
														for ($j=1; $j <$sophantrang ; $j++) { 
															# code...
															if ($j == $phantrang) {
																# code...
																echo "<button class='btn1 active' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
															}
															else {
														    echo "<button class='btn1' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
															}
														}
														    echo "</div>";
											}
									}
									else{
										exit("không tìm thấy món hoặc đã hết");
									}
								}
								else{
									exit();
								}
				}
				else{
						$price=$_GET['gia-ptrang'];
						if (isset($_POST['search'])||isset($_GET['search-ptrang'])) {
							# code...
							if(isset($_POST['search'])){
								$input = $_POST['search'];	
							}
							elseif (isset($_GET['search-ptrang'])) {
								# code...
								$input = ($_GET['search-ptrang']);
							}
							if ($price==1) {
								# code...
								$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND gia < 15000 AND tinhtrang='1'";

							}
							elseif ($price==2) {
								# code...
								$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND gia >=15000 AND gia < 30000 AND tinhtrang='1'";

							}
							elseif ($price==3) {
								# code...
								$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND gia >= 30000 AND gia < 45000 AND tinhtrang='1'";

							}
							elseif ($price==4) {
								# code...
								$qry = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%' AND gia >= 45000 AND tinhtrang='1'";

							}	
							$con = mysqli_connect('localhost','root','','webbanhang');
							if (!$con) {
							  die('Could not connect: ' . mysqli_error($con));
							}

							$result = mysqli_query($con,$qry);
							if (mysqli_num_rows($result)>0) {
								# code...
								while($row = mysqli_fetch_array($result)) {
									$new_array[] = $row;
								}
									$arraylength = count($new_array);
									$sophantrang=(($arraylength/6)+1);
									if (isset($_GET['phantrang'])) {
										# code...
										$phantrang=$_GET['phantrang'];
										$i=($_GET["phantrang"]-1)*6;
									}
									else{
									$phantrang=1;
									$i=0;
									}
									$count=0;
									echo "<div class='row'>";
									for ($i; $i < $arraylength ; $i++) { 
										# code...
										echo "<div class='col-sm-6'>";
										echo "<div class='wrap-product'>";
									    echo "<div class='img-product' style='background-image: url(".$new_array[$i]['hinhanh'].");'></div>";
									    echo "<div class='product-inf'>";
									    echo "<div class='price-product'>";
									    echo "Giá";
									    echo "<div>".$new_array[$i]['gia']."</div>";
									    echo "VNĐ";
									    echo "</div>";
									    echo "<span class='title-product'>".$new_array[$i]['tensp']."</span>";
									    echo "<div id='sao'>******</div>";
									    echo "<p>".$new_array[$i]['mota']."</p>";
									    echo "<form class='cart' action='../order/order-inc.php?action=add&id=" .$new_array[$i]['idsanpham'] . "' method='post'>";
									    echo "<div class='quantity'>";
									    echo "<label class='screen-reader' for='quantity-number'>Số Lượng</label>";
									    echo "<input type='number' id='quantity-number' name='quantity' value='1'>";
									    echo "<input type='hidden' name='hidden-name' value='". $new_array[$i]['tensp'] ."'>";
									    echo "<input type='hidden' name='hidden-price' value='". $new_array[$i]['gia'] ."'>";
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
									if ($sophantrang > 2)
									{
										echo "<div class='col-sm-12' id='phantrang'>";
												for ($j=1; $j <$sophantrang ; $j++) { 
													# code...
													if ($j == $phantrang) {
														# code...
														echo "<button class='btn1 active' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
													}
													else {
												    echo "<button class='btn1' onclick='showProductofSearchNangCao(".$j.")'>".$j."</button>";
													}
												}
												    echo "</div>";
									}
							}
							else{
								exit("không tìm thấy món hoặc đã hết");
							}
						}
						else{
							exit();
						}
					}
				}
	}
}
mysqli_close($con);