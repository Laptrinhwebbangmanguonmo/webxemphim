<?php
if(isset($_GET["lv"]))
{
    $lv=$_GET["lv"];
}
if($lv==1)
{
if(isset($_POST['themdanhmuc']))
{
	if(!empty($_POST['tendanhmuc']))
	{
		$tendanhmuc = $_POST['tendanhmuc'];
		require("../sql/connect.php");
		$sql = "SELECT * FROM PHIM.DANHMUC";
		$stmt = db2_prepare($conn, $sql);
		$result = db2_execute($stmt);
		if(isset($result))
		{
		while ($row = db2_fetch_array($stmt)) {
			if($row[1]=="$tendanhmuc")
			{
				$errors[]='tendanhmuctrung';

				
			}
		}
		db2_close($conn);
		}
	}
	else
	{
		$errors[]='tendanhmuc';
	}
	if(!empty($_POST['tendanhmuckhongdau']))
	{
		$tendanhmuckhongdau = $_POST['tendanhmuckhongdau'];
	}
	else
	{
		$errors[]='tendanhmuckhongdau';
	}
	if(empty($errors))
	{
	require("../sql/connect.php");
	$ins="INSERT INTO PHIM.DANHMUC(TEN,TENKHONGDAU) VALUES('$tendanhmuc','$tendanhmuckhongdau')";
	$stmt1 = db2_prepare($conn, $ins);
	$result1 = db2_execute($stmt1);
	if($result1)
	{
	$success[]="themdanhmucthanhcong";
	db2_close($conn);
	}
	}
}

?>
<section class="content-header">
      <h1>
        Danh Mục
        <small>Thêm Mới</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Thêm mới Danh Mục</li>
      </ol>
</section>
<div <div class="btn-success text-center success" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
	<?php
	if(isset($success) && in_array('themdanhmucthanhcong',$success))
      {
        echo"<li>Thêm Danh Mục thành công!</li>";
      }
    ?>
</div>
<section class="content form-horizontal">
	<form method="post" id="themdanhmuc" enctype="multipart/form-data">
	<div class="form-group">
	    <label for="tendanhmuc" class="col-sm-2 control-label">Tên danh mục:</label>
	    <div class="col-sm-10">
	      	<input type="text" name="tendanhmuc" class="form-control" placeholder="Nhập Tên Danh Mục">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('tendanhmuc',$errors))
		      {
		        echo"<li>Tên Danh Mục Không Được Để Trống</li>";
		      }
		       if(isset($errors) && in_array('tendanhmuctrung',$errors))
		      {
		        echo"<li>Tên Danh Mục Đã Tồn Tại</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div> 	
  	<div class="form-group">
	    <label for="tendanhmuckhongdau" class="col-sm-2 control-label">Tên Danh Mục Không Dấu</label>
	    <div class="col-sm-10">
	      	<input type="text" name="tendanhmuckhongdau" class="form-control" placeholder="Nhập Tên Danh Mục Không Dấu">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('tendanhmuckhongdau',$errors))
		      {
		        echo"<li>Tên Danh Mục Không Dấu Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 control-label"></label>
	    <div class="col-sm-10">
	      <button name="themdanhmuc" id="themdanhmuc" class="btn btn-info glyphicon glyphicon-floppy-save">Thêm</button>
	    </div>
  	</div>
  	</form>
</section>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
	$("div.errors").delay(2500).slideUp();
	$("div.success").delay(2500).slideUp();
} );
</script>
<?php
}
else
{
?>
    <div class="row" style="height: 200px"></div>
    <div class="text-red text-center"><h1>Bạn không đủ quyền truy cập trang này!Vui lòng quay lại :<a href="index.php">Trang chủ...</a></h1></div>
<?php
}
?>