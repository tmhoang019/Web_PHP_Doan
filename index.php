<!DOCTYPE html>
<html lang="en">
<head>
    <link href="fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightslider.css">
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

    <script type="text/javascript" src="js/lightslider.js"></script>
    <title>ViTasty</title>
    <script>
      $(document).ready(function(){
          $('#logout').click(function(){
              document.location = 'home/logout.php';
          });
        });
</script>
</head>
<body>
  <div id="background" class="view">
    <div class="d-flex flex-column">
      <?php include_once("home/nav-bar.php"); 
      ?>
      
      <?php include("home/welcome.php"); 
      ?>

      <?php include("home/about.php"); 
      ?>
      
      <?php include("home/gallery.php"); 
      ?>

      <?php include("home/open.php"); 
      ?>

      <?php include("home/contact.php"); 
      ?>
    </div>
  </div>
<script type="text/javascript" src="js/scriptofslider.js"></script>
</body>
<footer>
	
</footer>
</html>