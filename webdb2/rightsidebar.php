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
		<h3 class="title-rightsitebar">Phim Xem Nhiều Nhất!</h3>
	</div>
	<div class="body-rightsitebar">
	<?php
		$i=0;
		while ($row=db2_fetch_array($stmt)) {
		if($i<10)
		{
	?>
	<div class="media">
	  <div class="media-left media-middle">
<?php
	$array=explode(' ', $row[2]);
	$comma_separated = implode("-", $array);

?>
	<a href="danhmuc.php?page=<?php echo $comma_separated;?>">
	      <img title="<?php echo $row[1];?>" width="100" class="media-object" src="admin/upload/<?php echo $row[5];?>" alt="215x311">
	    </a>
	  </div>
	  <div class="media-body">
	    <h4 class="media-heading"><?php echo $row[1];?></h4>
	    	<h5><?php echo $row[2];?></h5>
	    <div><h6>Số Lượt Xem: <?php echo $row[7];?></h6></div>
	  </div>
	</div>
	<?php
	$i++;
	}
	else
	{
		break;
	}
	}}
	?>
</div>
<?php
$sql = "SELECT * FROM PHIM.PHIM WHERE NOIBAT=1 ORDER BY ID DESC";
	$stmt = db2_prepare($conn, $sql);
	$result = db2_execute($stmt);
	if($result)
	{		
?>
	<div class="text-center">
		<h3 class="title-rightsitebar">Phim Nổi Bật</h3>
	</div>
	<div class="body-rightsitebar">
	<?php
		$j=0;
		while ($row=db2_fetch_array($stmt)) {
		if($j<10)
		{
	?>
	<div class="media">
	  <div class="media-left media-middle">
	  <?php
		$array=explode(' ', $row[2]);
		$comma_separated = implode("-", $array);

		?>
	    <a href="danhmuc.php?page=<?php echo $comma_separated;?>">
	      <img title="<?php echo $row[1];?>" width="100" class="media-object" src="admin/upload/<?php echo $row[5];?>" alt="215x311">
	    </a>
	  </div>
	  <div class="media-body">
	    <h4 class="media-heading"><?php echo $row[1];?></h4>
	    	<h5><?php echo $row[2];?></h5>
	    <div><h6>Số Lượt Xem: <?php echo $row[7];?></h6></div>
	  </div>
	</div>
	<?php
	$i++;
	}
	else
	{
		break;
	}
	}}
	?>
	</div>
</div>