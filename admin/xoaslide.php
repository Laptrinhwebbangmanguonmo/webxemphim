<!-- Trang Xóa Slide -->
<?php
	ob_start();
	session_start();
	$id=$_GET['id'];
	$lv=$_GET['lv'];
	require("../sql/connect.php");
	$del="DELETE FROM PHIM.SLIDE WHERE ID='$id'";
	$stmt2 = db2_prepare($conn, $del);
	$result2 = db2_execute($stmt2);
	if(isset($result2))
	{
	db2_close($conn);
	header("location: index.php?page=danhsachslide&success=xoathanhcong&lv=$lv");
	}
	else
	{
		header("location: index.php?page=danhsachslide&errors=xoathatbai&lv=$lv");
	}

?>