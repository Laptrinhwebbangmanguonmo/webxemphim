<?php
require("sql/connect.php");
	$sql = "SELECT * FROM PHIM.PHIM ORDER BY SOLUOTXEM DESC";
	$stmt = db2_prepare($conn, $sql);
	$result = db2_execute($stmt);
	if($result)
	{		
?>
<div class="col-md-4">
	<div class="text-center">
		<h3 class="title-rightsitebar">Bài viết Xem Nhiều Nhất!</h3>
	</div>
	<div class="body-rightsitebar">
	<?php
		while ($row=db2_fetch_array($stmt)) {
	?>
	<div class="media">
	  <div class="media-left media-middle">
	    <a href="danhmuc.php?page=<?php echo $row[2];?>">
	      <img title="<?php echo $row[1];?>" width="100" class="media-object" src="admin/upload/<?php echo $row[5];?>" alt="215x311">
	    </a>
	  </div>
	  <div class="media-body">
	    <h4 class="media-heading"><?php echo $row[1];?></h4>
	    	<?php echo $row[3];?>
	    <div>Số Lượt Xem: <?php echo $row[7];?></div>
	  </div>
	</div>
	<?php
	}}
	?>
</div>
<?php
$sql = "SELECT * FROM PHIM.PHIM WHERE NOIBAT=1";
	$stmt = db2_prepare($conn, $sql);
	$result = db2_execute($stmt);
	if($result)
	{		
?>
	<div class="text-center">
		<h3 class="title-rightsitebar">Bài viết nổi bật</h3>
	</div>
	<div class="body-rightsitebar">
	<?php
		while ($row=db2_fetch_array($stmt)) {
	?>
	<div class="media">
	  <div class="media-left media-middle">
	    <a href="danhmuc.php?page=<?php echo $row[2];?>">
	      <img title="<?php echo $row[1];?>" width="100" class="media-object" src="admin/upload/<?php echo $row[5];?>" alt="215x311">
	    </a>
	  </div>
	  <div class="media-body">
	    <h4 class="media-heading"><?php echo $row[1];?></h4>
	    	<?php echo $row[3];?>
	    <div>Số Lượt Xem: <?php echo $row[7];?></div>
	  </div>
	</div>
	<?php
	}}
	?>
	</div>
</div>