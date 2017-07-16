<?php
require("../sql/connect.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
if(isset($_POST['suadanhmuc']))
{
	if(!empty($_POST['tendanhmuc']))
	{
		$tendanhmuc = $_POST['tendanhmuc'];
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
	$update="UPDATE PHIM.DANHMUC SET TEN='$tendanhmuc',TENKHONGDAU='$tendanhmuckhongdau'where ID='$id'";
	$stmt = db2_prepare($conn, $update);
	$result = db2_execute($stmt);
	if($result) 
	{
	$success[]="suathanhcong";
	}
	}
}

?>
<section class="content-header">
      <h1>
        Danh Mục
        <small>Sữa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Sửa Danh Mục</li>
      </ol>
</section>
<div <div class="btn-success text-center success" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
	<?php
	if(isset($success) && in_array('suathanhcong',$success))
      {
        echo"<li>Sữa Danh Mục thành công!</li>";
      }
    ?>
</div>
<section class="content form-horizontal">
<?php
		$sql = "SELECT * FROM PHIM.DANHMUC WHERE ID='$id'";
        $stmt = db2_prepare($conn, $sql);
        $result = db2_execute($stmt);
        if(isset($result))
        {
        	while ($row = db2_fetch_array($stmt)) {
	?>
	<form method="post" id="themdanhmuc" enctype="multipart/form-data">
	<div class="form-group">
	    <label for="tendanhmuc" class="col-sm-2 control-label">Tên danh mục:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[1];?>" type="text" name="tendanhmuc" class="form-control" placeholder="Nhập Tên Danh Mục">
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
	      	<input value="<?php echo $row[2];?>" type="text" name="tendanhmuckhongdau" class="form-control" placeholder="Nhập Tên Danh Mục Không Dấu">
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
	      <button name="suadanhmuc" id="suadanhmuc" class="btn btn-info glyphicon glyphicon-floppy-save">Sữa</button>
	    </div>
  	</div>
  	</form>
<?php }}?>
</section>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
	$("div.errors").delay(2500).slideUp();
	$("div.success").delay(2500).slideUp();
} );
</script>