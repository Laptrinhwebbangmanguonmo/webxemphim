<?php
require("sql/connect.php");
	$sql = "SELECT * FROM PHIM.DANHMUC";
	$stmt = db2_prepare($conn, $sql);
	$result = db2_execute($stmt);
	if($result)
	{
?>
<div class="row footer">
	<div class="col-xs-12 col-md-4 text-center">
		<a href="index.php"><img width="200" src="admin/upload/logo-text-300x120.png" alt="logo"></a>
		<h4>
			Chúng tôi cung cấp cho bạn những video phim lẻ hay nhất cập nhật trailer nhanh nhất!
		</h4>
		<div>Liên hệ chúng tôi:<a href="#"> yeuphimle.net@gmail.com</a></div><hr>
		<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
	</div>
	<div class="col-xs-12 col-md-4 text-center">
		<h3 class="btn-info">Danh mục</h3>
		<?php 
			while ($row=db2_fetch_array($stmt)) {
		?>
			<a class="btn btn-info" href="theloai.php?page=<?php echo $row[2];?>"><?php echo $row[1];?></a><br/>
		<?php
		 }}
		?>
	</div>
	<div class="col-xs-12 col-md-4 text-center">
		<h3 class="btn-info">Facebook Pages</h3>
		<div class="fb-page" data-href="https://www.facebook.com/livephimhd/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/livephimhd/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/livephimhd/">Live Phim HD</a></blockquote></div>
	</div>
</div>
<div class="subfooter row text-center">
	<h5>© Copyright Yeuphimle.net 2017</h5>
</div>