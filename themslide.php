<?php
require("../sql/connect.php");

if(isset($_GET["lv"]))
{
    $lv=$_GET["lv"];
}
if($lv==1)
{
if(isset($_POST['themslide']))
{
	if(!empty($_POST['titleslide']))
	{
		$titleslide = $_POST['titleslide'];
		
		if(isset($result))
		{
		$sql = "SELECT * FROM PHIM.SLIDE";
		$stmt = db2_prepare($conn, $sql);
		$result = db2_execute($stmt);
		while ($row = db2_fetch_array($stmt)) {
			if($row[1]=="$titleslide")
			{
				$errors[]='titleslide trung';

				
			}
		}
		}
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
		$hienthi=$_POST["hienthi"];
		if(isset($result))
		{
		$sql1 = "SELECT * FROM PHIM.SLIDE";
		$stmt1 = db2_prepare($conn, $sql1);
		$result1 = db2_execute($stmt1);
		while ($row1 = db2_fetch_array($stmt1)) {
			if($row1[5]==1)
			{
				$errors[]='hienthitrung';
			}
		}
		}
	}
	else
	{
		$hienthi=0;
	}
	if(empty($errors))
	{
	$ins="INSERT INTO PHIM.SLIDE(TEN,HINH,NOIDUNG,LINK,HIENTHI) VALUES('$titleslide','$hinhanhslide','$noidungslide','$linkslide','$hienthi')";
	$stmt1 = db2_prepare($conn, $ins);
	$result1 = db2_execute($stmt1);
	if($result1)
	{
	move_uploaded_file($_FILES['hinhanhslide']['tmp_name'],"upload/$hinhanhslide");
	$success[]="themslidethanhcong";
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
	if(isset($success) && in_array('themslidethanhcong',$success))
      {
        echo"<li>Thêm Slide thành công!</li>";
      }
    ?>
</div>
<section class="content form-horizontal">
	<form method="post" id="themdanhmuc" enctype="multipart/form-data">
	<div class="form-group">
	    <label for="titleslide" class="col-sm-2 control-label">Title:</label>
	    <div class="col-sm-10">
	      	<input type="text" name="titleslide" class="form-control" placeholder="Nhập Tên Title">
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
	      	<input type="text" name="noidungslide" class="form-control" placeholder="Nhập nội dung">
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
	      	<input type="text" name="linkslide" class="form-control" placeholder="Nhập link slide">
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
	      <button name="themslide" id="themslide" class="btn btn-info glyphicon glyphicon-floppy-save">Thêm</button>
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