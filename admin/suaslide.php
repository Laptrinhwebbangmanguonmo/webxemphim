<?php
require("../sql/connect.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
if(isset($_POST['suaslide']))
{
	if(!empty($_POST['titleslide']))
	{
		$titleslide = $_POST['titleslide'];
	}
	else
	{
		$errors[]='titleslide';
	}
	if(!empty($_POST['noidungslide']))
	{
		$noidungslide = $_POST['noidungslide'];
	}
	else
	{
		$errors[]='noidungslide';
	}
	if(!empty($_POST['linkslide']))
	{
		$linkslide = $_POST['linkslide'];
	}
	else
	{
		$errors[]='linkslide';
	}
	if($_FILES['hinhanhslide']['name']!=NULL)
	{
		if($_FILES['hinhanhslide']['type'] != "image/jpeg" && $_FILES['hinhanhslide']['type'] != "image/png" && $_FILES['hinhanhslide']['type'] != "image/gif")
		{
			$errors[]='anhdinhdang';
		}
		else
		{
			$hinhanhslide=rand().$_FILES['hinhanhslide']['name'];
		}

	}
	else
	{
		$errors[]='hinhanhslide';
	}
	if(!empty($_POST["hienthi"]))
	{
		$hienthi=1;
	}
	else
	{
		$hienthi=0;
	}
	if(empty($errors))
	{
	$update="UPDATE PHIM.SLIDE SET TEN='$titleslide',HINH='$hinhanhslide',NOIDUNG='$noidungslide',LINK='$linkslide',HIENTHI='$hienthi' where ID='$id'";
	$stmt = db2_prepare($conn, $update);
	$result = db2_execute($stmt);
	if($result) 
	{
	move_uploaded_file($_FILES['hinhanhslide']['tmp_name'],"upload/$hinhanhslide");
	$success[]="suathanhcong";
	}
	}
}

?>
<section class="content-header">
      <h1>
        Sửa
        <small>Sửa Slide</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Sửa Slide</li>
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
		$sql = "SELECT * FROM PHIM.SLIDE WHERE ID='$id'";
        $stmt = db2_prepare($conn, $sql);
        $result = db2_execute($stmt);
        if(isset($result))
        {
        	while ($row = db2_fetch_array($stmt)) {
	?>
	<form method="post" id="themdanhmuc" enctype="multipart/form-data">
	<div class="form-group">
	    <label for="titleslide" class="col-sm-2 control-label">Title:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[1];?>" type="text" name="titleslide" class="form-control" placeholder="Nhập Tên Title">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('titleslide',$errors))
		      {
		        echo"<li>Title Slide Không Được Để Trống</li>";
		      }
		       if(isset($errors) && in_array('titleslide trung',$errors))
		      {
		        echo"<li>Title Slide Đã Tồn Tại</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div> 
  	<div class="form-group">
	    <label for="noidungslide" class="col-sm-2 control-label">Nội Dung:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[3];?>" type="text" name="noidungslide" class="form-control" placeholder="Nhập nội dung">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('noidungslide',$errors))
		      {
		        echo"<li>Nội Dung Slide Không Được Để Trống</li>";
		      }
		      
		      ?>
		    </div>
	    </div>
  	</div> 
  	<div class="form-group">
	    <label for="linkslide" class="col-sm-2 control-label">Link slide:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[4];?>" type="text" name="linkslide" class="form-control" placeholder="Nhập link slide">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('linkslide',$errors))
		      {
		        echo"<li>Link Slide Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div> 
 	<div class="form-group">
	    <label for="hinhanhslide" class="col-sm-2 control-label">Hình Ảnh Slide:</label>
	    <div class="col-sm-10">
	      	<input type="file" name="hinhanhslide" class="form-control">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		      <?php 
		      if(isset($errors) && in_array('anhdinhdang',$errors))
		      {
		        echo"<li>File bạn chọn không phải File hình ảnh! vui lòng kiểm tra lại!</li>";
		      }
		      if(isset($errors) && in_array('hinhanhslide',$errors))
		      {
		        echo"<li>Hình Ảnh Slide Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label for="hienthi" class="col-sm-2 control-label">Lựa chọn slide đâu tiên:</label>
	    <div class="col-sm-10">
	    	<div class="form-control">
		      	<label><input type="checkbox" name="hienthi" value="1"> Hiển Thị Slide đầu tiên</label>
	      	</div>
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       	<?php 
		      	if(isset($errors) && in_array('hienthitrung',$errors))
		      	{
		        echo"<li>Đã tồn tại slide đầu tiên !Vui lòng xóa slide cũ để tạo slide mới!</li>";
		     	 }
		      	?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 control-label"></label>
	    <div class="col-sm-10">
	      <button name="suaslide" id="suaslide" class="btn btn-info glyphicon glyphicon-floppy-save">Sữa</button>
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