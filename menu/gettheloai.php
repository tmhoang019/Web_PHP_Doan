<?php

$con = mysqli_connect('localhost','root','','webbanhang');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM loaisp ";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
  echo "<li onclick='showProduct(".$row['idloai'].",1)'>";
  echo "<a href='#product'>".$row['tenloai']."</a>";
  echo "</li>";
}

mysqli_close($con);
?>
