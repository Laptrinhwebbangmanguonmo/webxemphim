<?php
require("sql/connect.php");
$sql = "SELECT * FROM PHIM.PHIM";
$stmt = db2_prepare($conn, $sql);
$result = db2_execute($stmt);
if($result)
{
?>
<div class="div-content-title">
	<h3 class="h3-content-title">Tiêu đề </h3>
</div>
<?php
while ($row = db2_fetch_array($stmt)) {
	$slx=$row[7];
?>
<div class="phim col-xs-6 col-md-3">
	<a href="danhmuc.php?page=<?php echo $row[2];?>" class="thumbnail">
	<img title="<?php echo $row[1];?>" class="phim-img" src="admin/upload/<?php echo $row[5];?>" alt="215x311">
		<div class="div-class-title">
		<h4 title="<?php echo $row[1];?>"><?php echo $row[1];?></h4>
		<h5 title="<?php echo $row[2];?>"><?php echo $row[2];?></h5>
		</div>
		<div class="div-class-img">
			<img width="30" src="admin/upload/icon-video-play.png">
		</div>
</a>
</div>
<?php
}}
?>
