<!-- Trang Tạo Quảng Cáo Cho Web-->
<?php
if(isset($_POST['UpdatequangCao']))
{
	if(!empty($_POST['linkabslert']))
	{
		$linkabslert = $_POST['linkabslert'];
		echo $linkabslert;
	}
	else
	{
		$errors[]='linkabslert';
	}
	if($_FILES['imgabslert']['name']!=NULL)
	{
		if($_FILES['imgabslert']['type'] != "image/jpeg" && $_FILES['imgabslert']['type'] != "image/png" && $_FILES['imgabslert']['type'] != "image/gif")
		{
			$errors[]='imgabslertdinhdang';
		}
		else
		{
			$imgabslert=rand().$_FILES['imgabslert']['name'];
			echo $imgabslert;

		}

	}
	else
	{
		$errors[]='imgabslert';
	}
	if(!empty($_POST['linkabsright']))
	{
		$linkabsright = $_POST['linkabsright'];
		echo $linkabsright;
	}
	else
	{
		$errors[]='linkabsright';
	}
	if($_FILES['imgabsright']['name']!=NULL)
	{
		if($_FILES['imgabsright']['type'] != "image/jpeg" && $_FILES['imgabsright']['type'] != "image/png" && $_FILES['imgabsright']['type'] != "image/gif")
		{
			$errors[]='imgabsrightdinhdang';
		}
		else
		{
			$imgabsright=rand().$_FILES['imgabsright']['name'];
			echo $imgabsright;

		}

	}
	else
	{
		$errors[]='imgabsright';
	}
	if(!empty($_POST['hienthi']))
	{
		$hienthi = $_POST['hienthi'];

	}
	else
	{
		$hienthi='0';
	}
	echo $hienthi;
	if(empty($errors))
	{
	require("../sql/connect.php");
	$update="UPDATE PHIM.QUANGCAO SET LINKLERTABS='$linkabslert',IMGLERTABS='$imgabslert',LINKRIGHTABS='$linkabsright',IMGRIGHTABS='$imgabsright',HIENTHI='$hienthi' where ID=1";
	$stmt = db2_prepare($conn, $update);
	$result = db2_execute($stmt);
	if($result) 
	{
		move_uploaded_file($_FILES['imgabslert']['tmp_name'],"upload/$imgabslert");
		move_uploaded_file($_FILES['imgabsright']['tmp_name'],"upload/$imgabsright");
	$success[]="suathanhcong";
	}
	}
}

?>
<section class="content-header">
      <h1>
        Quảng cáo
        <small>Update</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Cập Nhật Quảng Cáo</li>
      </ol>
</section>
<div <div class="btn-success text-center success" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
	<?php
	if(isset($success) && in_array('suathanhcong',$success))
      {
        echo"<li>Update thành công!</li>";
      }
    ?>
</div>
<section class="content form-horizontal">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	    <label class="col-sm-2 control-label">Quảng Cáo Trái:</label>
	    <div class="col-sm-10">
	      	<input type="text" name="linkabslert" class="form-control" placeholder="Link Quảng Cáo">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('linkabslert',$errors))
		      {
		        echo"<li>Link Quảng Cáo Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
		    <br>
		    <input type="file" name="imgabslert" class="form-control">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('imgabslert',$errors))
		      {
		        echo"<li>Hình Ảnh Quảng Cáo Không Được Để Trống</li>";
		      }
		      if(isset($errors) && in_array('imgabslertdinhdang',$errors))
		      {
		      	echo"<li>File bạn Lựa Chọn Không Phải là File Ảnh!</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	
  	<div class="form-group">
	    <label class="col-sm-2 control-label">Quảng Cáo Phải:</label>
	    <div class="col-sm-10">
	      	<input type="text" name="linkabsright" class="form-control" placeholder="Link Quảng Cáo">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('linkabsright',$errors))
		      {
		        echo"<li>Link Quảng Cáo Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
		    <br>
		    <input type="file" name="imgabsright" class="form-control">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('imgabsright',$errors))
		      {
		        echo"<li>Hình Ảnh Quảng Cáo Không Được Để Trống</li>";
		      }
		      if(isset($errors) && in_array('imgabsrightdinhdang',$errors))
		      {
		      	echo"<li>File bạn Lựa Chọn Không Phải là File Ảnh!</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label for="hienthi" class="col-sm-2 control-label">Hiển Thị:</label>
	    <div class="col-sm-10">
	      	<label><input type="checkbox" name="hienthi" value="1"> Hiện Thị Quảng Cáo</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 control-label"></label>
	    <div class="col-sm-10">
	      <button name="UpdatequangCao" id="UpdatequangCao" class="btn btn-info glyphicon glyphicon-floppy-save"> Update</button>
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