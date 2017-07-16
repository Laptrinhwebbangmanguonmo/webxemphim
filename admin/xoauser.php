<!-- Trang Xóa User -->
<?php
	ob_start();
	session_start();
	$id=$_GET['id'];
	$lv=$_GET['lv'];
	require("../sql/connect.php");
	$del="delete from PHIM.USER where ID='$id'";
	$stmt2 = db2_prepare($conn, $del);
	$result2 = db2_execute($stmt2);
	if(isset($result2))
	{
	db2_close($conn);
	header("location: index.php?page=tatcanguoidung&success=xoathanhcong&lv=$lv");
	}
	else
	{
		header('location: index.php?page=tatcanguoidung&errors=xoathatbai&lv=<?php echo $lv;?>');
	}

?>