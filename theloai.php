<!-- hiển Thị Menu Giao dien người dung -->
<?php
if(isset($_GET['page']))
{
	$page=$_GET['page'];
	require("sql/connect.php");
	$sql = "SELECT * FROM PHIM.PHIM INNER JOIN PHIM.DANHMUC ON PHIM.PHIM.IDDANHMUC = PHIM.DANHMUC.ID WHERE TENKHONGDAU='$page'";
	$stmt = db2_prepare($conn, $sql);
	$result = db2_execute($stmt);
	if($result)
	{

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Danh mục</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- css tư code -->
  <link rel="stylesheet" href="css/index.css">
  
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
        while($row=db2_fetch_array($stmt)) {
        ?>
				<div class="phim col-xs-6 col-md-3">
<?php
  $array=explode(' ', $row[2]);
  $comma_separated = implode("-", $array);

?>
  <a href="danhmuc.php?page=<?php echo $comma_separated;?>" class="thumbnail">
        <img class="phim-img" src="admin/upload/<?php echo $row[5];?>" alt="215x311">
          <div class="div-class-title">
          <h4><?php echo $row[1];?></h4>
          <h5><?php echo $row[2];?></h5>
          </div>
          <div class="div-class-img">
            <img width="30" src="admin/upload/icon-video-play.png">
          </div>
      </a>
      </div>
      <?php
     }
      ?>
		</div>
		</div>
    		<div class="right-sidebar">
    			<?php include('rightsidebar.php');?>
    		</div>
		</content>
		<footer>
		  <?php include('footer.php');?>
		</footer>
</div>
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
</script>
</body>
</html>
<?php
}}
?>