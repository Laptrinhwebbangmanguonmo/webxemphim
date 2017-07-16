<!--  Trang Hiển Thị QUảng Cáo Giao Diên NGười dùng -->
<?php
require("sql/connect.php");
	$sql = "SELECT * FROM PHIM.QUANGCAO";
	$stmt = db2_prepare($conn, $sql);
	$result = db2_execute($stmt);
	if($result)
	{
		$row=db2_fetch_array($stmt);
		if(count($row[0])>0){
			if($row[5]=="1")
			{
?>
<div class="abs-lert">
	<a href="<?php echo $row[1];?>">
		<img class="abs-img-lert" src="admin/upload/<?php echo $row[2];?>">
	</a>
</div>
<div class="abs-right">
	<a href="<?php echo $row[3];?>"">
		<img class="abs-img-right" src="admin/upload/<?php echo $row[4];?>">
	</a>
</div>
<?php
}
}
}
?>