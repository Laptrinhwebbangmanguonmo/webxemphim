<?php
require("../sql/connect.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
if(isset($_POST['suaphim']))
{	
	if(!empty($_POST['tieudephim']))
	{
		$tieudephim=$_POST['tieudephim'];
	}
	else
	{
		$errors[]='tieudephim';
	}
	if(!empty($_POST['tieudephimkhongdau']))
	{

		$tieudephimkhongdau = $_POST['tieudephimkhongdau'];
	}
	else
	{
		$errors[]='tieudephimkhongdau';
	}
	if(!empty($_POST['noidungphim']))
	{
		$noidungphim=$_POST['noidungphim'];
	}
	else
	{
		$noidungphim="";
	}

	if(!empty($_POST['linkvideo']))
	{
		$linkvideo = $_POST['linkvideo'];
	}
	else
	{
		$errors[]='linkvideo';
	}
	if($_FILES['hinhanhphim']['name']!=NULL)
	{
		if($_FILES['hinhanhphim']['type'] != "image/jpeg" && $_FILES['hinhanhphim']['type'] != "image/png" && $_FILES['hinhanhphim']['type'] != "image/gif")
		{
			$errors[]='anhdinhdang';
		}
		else
		{
			$hinhanhphim=rand().$_FILES['hinhanhphim']['name'];

		}

	}
	else
	{
		$errors[]='hinhanhphim';
	}
	if(!empty($_POST['noibat']))
	{
		$noibat = $_POST['noibat'];
	}
	else
	{
		$errors[]='noibat';
	}
	if(!empty($_POST['luachondanhmuc']))
	{
		$luachondanhmuc = $_POST['luachondanhmuc'];
	}
	else
	{
		$errors[]='luachondanhmuc';
	}
	if(empty($errors))
	{
	$update="UPDATE PHIM.PHIM SET TIEUDE='$tieudephim',TIEUDEKHONGDAU='$tieudephimkhongdau',NOIDUNG='$noidungphim',VIDEO='$linkvideo',HINHANH='$hinhanhphim',NOIBAT='$noibat',IDDANHMUC='$luachondanhmuc',TACGIA='$email' where ID='$id'";
	$stmt = db2_prepare($conn, $update);
	$result = db2_execute($stmt);
	if($result) 
	{
	move_uploaded_file($_FILES['hinhanhphim']['tmp_name'],"upload/$hinhanhphim");
	$success[]="suathanhcong";
	}
	}
}

?>
<section class="content-header">
      <h1>
        Quản Lý Phim
        <small>Sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Sửa Phim</li>
      </ol>
</section>
<div <div class="btn-success text-center success" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
	<?php
	if(isset($success) && in_array('suathanhcong',$success))
      {
        echo"<li>Sữa Slide thành công!</li>";
      }
    ?>
</div>
<section class="content form-horizontal">
<?php
		$sql = "SELECT * FROM PHIM.PHIM WHERE ID='$id'";
        $stmt = db2_prepare($conn, $sql);
        $result = db2_execute($stmt);
        if(isset($result))
        {
        	while ($row = db2_fetch_array($stmt)) {
	?>
	<form method="post" id="themdanhmuc" enctype="multipart/form-data">
	<input value="<?php echo $row[7]?>" type="hidden" name="soluotxem">
	<div class="form-group">
	    <label for="tieudephim" class="col-sm-2 control-label">Tiêu Đề Phim:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[1]?>" type="text" name="tieudephim" class="form-control" placeholder="Nhập Tiêu Đề Phim">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('tieudephim',$errors))
		      {
		        echo"<li>Tiêu đề phim Không Được Để Trống</li>";
		      }
		       if(isset($errors) && in_array('titleslide trung',$errors))
		      {
		        echo"<li>Tiêu đề Phim Đã Tồn Tại</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label for="tieudephimkhongdau" class="col-sm-2 control-label">Tiêu Đề Phim Không Dấu:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[2]?>" type="text" name="tieudephimkhongdau" class="form-control" placeholder="Nhập Tiêu Đề Phim Không Dấu">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('tieudephimkhongdau',$errors))
		      {
		        echo"<li>Tiêu Đề Không Dấu Không Được Để Trống</li>";
		      }
		       if(isset($errors) && in_array('tieudephimkhongdau trung',$errors))
		      {
		        echo"<li>Tiêu Đề Không Dấu Đã Tồn Tại</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>  
  	<div class="form-group">
	    <label for="noidungphim" class="col-sm-2 control-label">Nội Dung Phim:</label>
	    <div class="col-sm-10">
	    	<textarea  id="noidungphim" name="noidungphim" class="form-control ckeditor" placeholder="Nhập nội dung phim"><?php echo $row[3]?></textarea>
	    </div>
  	</div> 
  	<div class="form-group">
	    <label for="linkvideo" class="col-sm-2 control-label">Link Video:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[4]?>" type="text" name="linkvideo" class="form-control" placeholder="Nhập link VIDEO">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('linkvideo',$errors))
		      {
		        echo"<li>Link Video Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div> 
  	<div class="form-group">
	    <label for="hinhanhphim" class="col-sm-2 control-label">Hình Ảnh:</label>
	    <div class="col-sm-10">
	      	<input type="file" name="hinhanhphim" class="form-control">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		      <?php 
		      if(isset($errors) && in_array('anhdinhdang',$errors))
		      {
		        echo"<li>File bạn chọn không phải File hình ảnh! vui lòng kiểm tra lại!</li>";
		      }
		      if(isset($errors) && in_array('hinhanhphim',$errors))
		      {
		        echo"<li>Hình Ảnh Phim Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
 	<div class="form-group">
	    <label for="noibat" class="col-sm-2 control-label">Nổi Bật:</label>
	    <div class="col-sm-10">
	    	<div class="form-control">
		      	<label><input type="radio" name="noibat" value="1"?>Nỗi Bật</label>
		      	<label><input type="radio" name="noibat" value="2">Không Nỗi Bật</label>
	      	</div>
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       	<?php 
		      	if(isset($errors) && in_array('noibat',$errors))
		      	{
		        echo"<li>Nỗi Bật Không Được Để Trống</li>";
		     	 }
		      	?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 control-label">Chọn Danh Mục</label>
	    <div class="col-sm-10">
	      <select name="luachondanhmuc" class="form-control">
	      	<option value="">...Lựa chọn danh mục cho phim...</option>
	      	<?php 
	      	$sql = "SELECT * FROM PHIM.DANHMUC";
			$stmt = db2_prepare($conn, $sql);
			$result = db2_execute($stmt);
			if($result)
			{
			while ($row = db2_fetch_array($stmt)) {
	      	?>
	      	<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
	      	<?php }}?>
	      </select>
	      <div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('luachondanhmuc',$errors))
		      {
		        echo"<li>Lựa Chọn Danh Mục Không Được Để Trống Không Được Để Trống</li>";
		      }
		      ?>
		  </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 control-label"></label>
	    <div class="col-sm-10">
	      <button name="suaphim" id="suaslide" class="btn btn-info glyphicon glyphicon-floppy-save">Sữa</button>
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