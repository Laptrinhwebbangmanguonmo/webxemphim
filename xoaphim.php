<?php
	ob_start();
	session_start();
	$id=$_GET['id'];
	require("../sql/connect.php");
	$del="DELETE FROM PHIM.PHIM WHERE ID='$id'";
	$stmt2 = db2_prepare($conn, $del);
	$result2 = db2_execute($stmt2);
	if(isset($result2))
	{
	db2_close($conn);
	header("location: index.php?page=danhsachphim&success=xoathanhcong");
	}
	else
	{
		header("location: index.php?page=danhsachphim&errors=xoathatbai");
	}

?>