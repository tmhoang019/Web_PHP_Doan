<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style-menu.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--Jquery-->
    <title>Menu | ViTasty</title>
    <script>
      $(document).ready(function(){
        $('#logout').click(function(){
            document.location = '../home/logout.php';
        });
      });
    </script>
</head>
<body onload="showTheLoai(); showProduct(1,1);">
  <div id="background" class="view">
    <div class="d-flex flex-column">
      <?php include("../home/nav-bar.php"); 
      ?>
      <section class="d-flex flex-column of-menu">
       <div class="d-flex flex-column inside-menu">
        <div class="header-menu">
          <strong>Menu</strong> <br>
          9am - 10pm
        </div>
        <div class="search">
          <form id="formid">
            <input id='search-txt' type="text"  name='search-txt' placeholder="Tìm kiếm....">
            <div class="search-btn" name='search-btn' id='search-btn'> 
              <i class="fas fa-search" aria-hidden="true">
                          
              </i>
            </div>
            <div class="search-option">
              <select id="theloai-option" name="type">
                <option value="0">Loại sản phẩm ..</option>
                <option value="1">Món chính</option>
                <option value="2">Tráng miệng & nước uống</option>
              </select>
              <select id="price-option" name="price">
                <option value="0">Khoảng giá ..</option>
                <option value="1">Dưới 15.000đ</option>
                <option value="2">15.000đ đến dưới 30.000đ</option>
                <option value="3">30.000đ đến dưới 45.000đ</option>
                <option value="4">Từ 45.000đ trở lên</option>
              </select>
            </div>
          </form>
        </div>
        <div class="cart-fixed">
          <a href="../order/order.php">Giỏ hàng</a>
          <?php 
          if (isset($_SESSION['cart'])) {
            # code...
            $count = count($_SESSION['cart']);
            echo "<div id='count-cart'><span>".$count."</span></div>";
          }
          else{
            echo "<div id='count-cart'><span>0</span></div>";
          }
          ?>
        </div>
        <div class="row type-menu">
          <div class="col-sm-4" >
            <div class="flex-column product-list" id="sticky-list">
              <div class="title-purple">Món ngon tại ViTasty</div>
              <div class="d-flex flex-column">
                <ul class="list-unstyled" id="theloai">
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-8" id="product">
            
          </div>
        </div>
       </div>
      </section>
      <?php include("../home/contact.php"); 
      ?>
    </div>
  </div>
</body>
<script>
  function showTheLoai() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("theloai").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("GET","gettheloai.php",true);
            xmlhttp.send();
        }
  function showProduct(theloai,phantrang) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("product").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("GET","getsanpham.php?theloai="+theloai+"&phantrang="+phantrang,true);
            xmlhttp.send();
        }
  function showProductofSearch(phantrang) {
            var search = document.getElementById('search-txt').value;
            console.log(search);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("product").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("GET","search.php?phantrang="+phantrang+"&search-ptrang="+search,true);
            xmlhttp.send();
  }
  function showProductofSearchNangCao(phantrang) {
            var search = document.getElementById('search-txt').value;
            var loaisp = document.getElementById('theloai-option').value;
            var gia = document.getElementById('price-option').value;
            console.log(search);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("product").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("GET","search.php?type=1&phantrang="+phantrang+"&search-ptrang="+search+"&loai-ptrang="+loaisp+"&gia-ptrang="+gia,true);
            xmlhttp.send();
  }
  function addtoCart(id,name,price) {
            var xmlhttp = new XMLHttpRequest();
            var string = "quantity-number-" + id;
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
              }
            };
            xmlhttp.open("GET","order-inc.php?action=add&id="+id+"&name="+name+"&price="+price+"&qty="+qty.value,true);
            xmlhttp.send();
        }
  window.onscroll = function() {myStickyFunction()};

        // Get the header
        var menu = document.getElementById("sticky-list");

        // Get the offset position of the navbar
        var sticky = menu.offsetTop;
        var contact = document.getElementById("contact-id").offsetTop;

        //getwidth of device
        var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

        // add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myStickyFunction() {
          if (window.pageYOffset > sticky && window.pageYOffset < (sticky + 1600)) {
            menu.classList.add("sticky");
          } else {
              menu.classList.remove("sticky"); 
          } 
        }
  // Get the container element
  var btnContainer = document.getElementById("phantrang");

  // Get all buttons with class="btn" inside the container

  // Loop through the buttons and add the active class to the current/clicked button
  //Jquery
/*
  $(document).ready(function(){
    $('#search-txt').keyup(function(){
      var txt = $('#search-txt').val();
      var loaisp = $('#theloai-option').val();
      var gia = $('#price-option').val();
      if (txt != '') {
        $.ajax({
          url:"search.php",
          method:"post",
          data:{search:txt,
                loai:loaisp,
                price:gia,
                },
          dataType:"text",
          success:function(data)
          {
            if (data == 'không tìm thấy') {
              document.getElementById('search-txt').value='';
              alert("không tìm thấy sản phẩm");
            }
            else{
              $('#product').html(data);
            }
          }
        });
      }
      else{
        showProduct(1,1);
      }
    });
  }) ;

  $(document).ready(function(){
    $('#theloai-option').click(function(){
      var txt = $('#search-txt').val();
      var loaisp = $('#theloai-option').val();
      var gia = $('#price-option').val();
      if (txt != '') {
        $.ajax({
          url:"search.php",
          method:"post",
          data:{search:txt,
                loai:loaisp,
                price:gia,
                },
          dataType:"text",
          success:function(data)
          {
            if (data == 'không tìm thấy') {
              document.getElementById('search-txt').value='';
              alert("không tìm thấy sản phẩm");
            }
            else{
              $('#product').html(data);
            }
          }
        });
      }
      else{
        showProduct(1,1);
      }
    });
  }) ;

  $(document).ready(function(){
    $('#price-option').click(function(){
      var txt = $('#search-txt').val();
      var loaisp = $('#theloai-option').val();
      var gia = $('#price-option').val();
      if (txt != '') {
        $.ajax({
          url:"search.php",
          method:"post",
          data:{search:txt,
                loai:loaisp,
                price:gia,
                },
          dataType:"text",
          success:function(data)
          {
            if (data == 'không tìm thấy') {
              document.getElementById('search-txt').value='';
              alert("không tìm thấy sản phẩm");
            }
            else{
              $('#product').html(data);
            }
          }
        });
      }
      else{
        showProduct(1,1);
      }
    });
  }) ;
*/
    $('#formid').on('keyup', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) { 
        e.preventDefault();
        return false;
      }
    });
  $(document).ready(function(){
    $('#search-btn').click(function(){
      var txt = $('#search-txt').val();
      var loaisp = $('#theloai-option').val();
      var gia = $('#price-option').val();
      if (txt != '' || loaisp != 0 || gia != 0) {
        $.ajax({
          url:"search.php",
          method:"post",
          data:{search:txt,
                loai:loaisp,
                price:gia,
                },
          dataType:"text",
          success:function(data)
          {
            if (data == 'không tìm thấy') {
              document.getElementById('search-txt').value='';

              document.getElementById('theloai-option').value=0;

              document.getElementById('price-option').value=0;

              alert("không tìm thấy sản phẩm");
            }
            else{
              $('#product').html(data);
            }
          }
        });
      }
      else{
        showProduct(1,1);
      }
    });
  }) ;
  

  $(document).ready(function(){
    $('#logout').click(function(){
        document.location = '../home/logout.php';
    });
  });
</script>
<footer>
	
</footer>
</html>
<?php 
  if (isset($_GET["error"])) {
    if ($_GET["error"] == 'notlogin') {
      # code...
      echo '<script>alert("Bạn cần đăng nhập để mua hàng")</script>';
    }
  }
?>