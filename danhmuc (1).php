<?php
// function curl
function curl($url)
{
  $ch = @curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  $head[] = "Connection: keep-alive";
  $head[] = "Keep-Alive: 300";
  $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
  $head[] = "Accept-Language: en-us,en;q=0.5";
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  $page = curl_exec($ch);
  curl_close($ch);
  return $page;
}
$slx=0;
if(isset($_GET['page']))
{
	$page=$_GET['page'];
	require("sql/connect.php");
	$sql = "SELECT * FROM PHIM.PHIM WHERE TIEUDEKHONGDAU='$page'";
	$stmt = db2_prepare($conn, $sql);
	$result = db2_execute($stmt);
	if($result)
	{
	while ($row=db2_fetch_array($stmt)) {
  $slx=$row[7]+1;
  $update="UPDATE PHIM.PHIM SET SOLUOTXEM='$slx' where TIEUDEKHONGDAU='$page'";
  $stmt1 = db2_prepare($conn, $update);
  $result1 = db2_execute($stmt1);
// ===============================
// videoipi
//================================ 
$key = 'd3afe2fae1c26cae7634a2b5f3e3dfec'; // Enter your key on VideoAPI.io
$link = "<?php echo $row[4];?>";
$api = 'https://videoapi.io/api/getlink?key='.$key.'&link='.$link.'&cache=false';
$sources = curl($api);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $row[1];?></title>
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
				<div class="single-content row">
          <script type="text/javascript" src="https://videoapi.io/public/player/videojs/video.min.js"></script>
<script type="text/javascript" src="https://videoapi.io/public/player/videojs/plugins/videojs-resolution-switcher.js"></script>
<link href="https://videoapi.io/public/player/videojs/video-js.min.css" rel="stylesheet">
<link href="https://videoapi.io/public/player/videojs/plugins/videojs-resolution-switcher.css" rel="stylesheet">
<div id="videoapi-player" style="width: 100%;">
  <video id="video" class="video-js vjs-default-skin"></video>
</div>
<script type="text/javascript">
player = videojs("video", {
    width: "760px",
 
    controls: true,
    plugins: {
      videoJsResolutionSwitcher: {
        default: 480,
        dynamicLabel: true
      }
    }
}, function(){
    player.videoJsResolutionSwitcher();
    player.updateSrc(<?php echo $sources; ?>)
});
</script>
              	<!-- 	<iframe width="100%" height="500px" src="<?php echo $row[4];?>" frameborder="0" allowfullscreen></iframe> -->
        </div>
            	<div class="div-title-single-content">
            		<h3 class="h3-title-single-content"><?php echo $row[1];?>-<?php echo $row[2];?></h3>
            	</div>
            	<div class="row">
            		<h4>Chia sẻ:
            		<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div></h4>
            	</div>
            	<h3 class="btn btn-danger">Nội Dung Phim</h3>
            	<div class="row noi-dung-phim">
            	<?php echo $row[3];?></div>
            	<div class="comment-face">
            		<div class="fb-comments" data-width="100%" data-numposts="5"></div>
            	</div>
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
}}}
?>