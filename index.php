<!--  Trang Chủ Giao Diên NGười dùng  -->
<?php
require("sql/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trang Chủ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- css tư code -->
  <link rel="stylesheet" href="css/index.css">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=753554728154928";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container">
	<header>
		<?php include('header.php');?>
	</header>
	<content>
		<div class="content">
			<div class="col-md-8">
			<?php
			include('slide.php');
			include('trangchu.php');
			?>
			</div>
		</div>
		<div class="right-sidebar">
			<?php include('rightsidebar.php');?>
		</div>
	</content>
</div>
  <div class="abs">
    <?php include('quangcao.php');?>
  </div>
	<footer style="clear: both;">
		<?php include('footer.php');?>
	</footer>

<!-- jQuery 2.2.3 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">


<script src="admin/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
    $('#myCarousel').carousel({
        interval: 10000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
});
	$(document).ready(function (){
	
    $('.thumbnail').click(function (){
    	alert($slx);
    });
});
</script>
</body>
</html>