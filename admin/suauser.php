<!-- Trang Sữa User -->
<?php
require("../sql/connect.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
if(isset($_POST['luu']))
{
	if(!empty($_POST['lastname']))
	{
		$lastname = $_POST['lastname'];
	}
	else
	{
		$errors[]='lastname';
	}
	if(!empty($_POST['fisrtname']))
	{
		$fisrtname = $_POST['fisrtname'];
	}
	else
	{
		$errors[]='fisrtname';
	}
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];	
	}
	else
	{
		$errors[]='emailnotnull';
	}
	if(!empty($_POST['password']))
	{
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	}
	else
	{
		$errors[]='password';
	}
	if(!empty($_POST['re-password']))
	{
		$re_password=$_POST['re-password'];
		if(!password_verify($re_password, $password))
		{
			$errors[]='re_password';
		}
	}
	else
	{
		$errors[]='re_passwordnotnull';
	}
	if(!empty($_POST['ngaysinh']))
	{
		$ngaysinh = $_POST['ngaysinh'];
	}
	else
	{
		$errors[]='ngaysinh';
	}
	if($_FILES['anhdaidien']['name']!=NULL)
	{
		if($_FILES['anhdaidien']['type'] != "image/jpeg" && $_FILES['anhdaidien']['type'] != "image/png" && $_FILES['anhdaidien']['type'] != "image/gif")
		{
			$errors[]='anhdinhdang';
		}
		else
		{
			$anhdaidien=rand().$_FILES['anhdaidien']['name'];

		}

	}
	else
	{
		$errors[]='anhdaidien';
	}
	if(!empty($_POST['gioitinh']))
	{
		$gioitinh = $_POST['gioitinh'];
	}	
	else
	{
		$errors[]='gioitinh';
	}
	if(!empty($_POST['fisrtname']))
	{
		$qtc = $_POST['qtc'];
	}
	else
	{
		$errors[]='qtc';
	}
	if(empty($errors))
	{

	$del="UPDATE PHIM.USER SET LASTNAME='$lastname',FIRSTNAME='$fisrtname',EMAIL='$email',PASSWORD='$password',NGAYSINH='$ngaysinh',HINH='$anhdaidien',GIOITINH='$gioitinh',LEVEL='$qtc'where ID='$id'";
	$stmt = db2_prepare($conn, $del);
	$result = db2_execute($stmt);
	if($result) 
	{
	move_uploaded_file($_FILES['anhdaidien']['tmp_name'],"upload/$anhdaidien");
	$success[]="suathanhcong";
	}
	}
}

?>
<section class="content-header">
      <h1>
        Thành Viên
        <small>Chỉnh sữa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Chỉnh sữa thành viên</li>
      </ol>
</section>
<div <div class="btn-success text-center success" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
	<?php
	if(isset($success) && in_array('suathanhcong',$success))
      {
        echo"<li>Sữa thành công!</li>";
      }
    ?>
</div>
<section class="content form-horizontal">
	<?php
		$sql = "SELECT * FROM PHIM.USER WHERE ID='$id'";
        $stmt = db2_prepare($conn, $sql);
        $result = db2_execute($stmt);
        if(isset($result))
        {
        	while ($row = db2_fetch_array($stmt)) {
	?>
	<form method="post" id="themmoiuser" enctype="multipart/form-data">
	<div class="form-group">
	    <label for="lastname" class="col-sm-2 control-label">LastName:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[1];?>" type="text" name="lastname" class="form-control" placeholder="LastName">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('lastname',$errors))
		      {
		        echo"<li>LastName Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	
  	<div class="form-group">
	    <label for="fisrtname" class="col-sm-2 control-label">FisrtName</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[2];?>" type="text" name="fisrtname" class="form-control" placeholder="FisrtName">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('fisrtname',$errors))
		      {
		        echo"<li>FisrtName Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[3];?>" type="email" name="email" class="form-control" placeholder="Email">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('email',$errors))
		      {
		        echo"<li>Email đã tồn tại!</li>";
		      }
		      if(isset($errors) && in_array('emailnotnull',$errors))
		      {
		        echo"<li>Email Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label for="password" class="col-sm-2 control-label">PassWord:</label>
	    <div class="col-sm-10">
	      	<input type="password" name="password" class="form-control" placeholder="PassWord">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('password',$errors))
		      {
		        echo"<li>PassWord Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label for="re-password" class="col-sm-2 control-label">Re-password:</label>
	    <div class="col-sm-10">
	      	<input type="password" name="re-password" class="form-control" placeholder="Re-PassWord">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		    	if(isset($errors) && in_array('re_passwordnotnull',$errors))
			    {
			       echo"<li>Re-password Không Được Để Trống</li>";
			    }
			    if(isset($errors) && in_array('re_password',$errors))
			    {
			       echo"<li>Re-password Không trùng với PassWord</li>";
			    }
			    ?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label for="ngaysinh" class="col-sm-2 control-label">Ngày Sinh:</label>
	    <div class="col-sm-10">
	      	<input value="<?php echo $row[6];?>" type="date" name="ngaysinh" class="form-control" placeholder="Ngày Sinh">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('ngaysinh',$errors))
		      {
		        echo"<li>Ngày Sinh Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	
  	<div class="form-group">
	    <label for="anhdaidien" class="col-sm-2 control-label">Ảnh Đại Diện:</label>
	    <div class="col-sm-10">
	      	<input type="file" name="anhdaidien" class="form-control">
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		      <?php 
		      if(isset($errors) && in_array('anhdinhdang',$errors))
		      {
		        echo"<li>File bạn chọn không phải File hình ảnh! vui lòng kiểm tra lại!</li>";
		      }
		      if(isset($errors) && in_array('anhdaidien',$errors))
		      {
		        echo"<li>Ảnh Đại Diện Không Được Để Trống</li>";
		      }
		      ?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label for="gioitinh" class="col-sm-2 control-label">Giới Tính:</label>
	    <div class="col-sm-10">
	    	<div class="form-control">
		      	<input type="radio" name="gioitinh" value="Nam" >Nam
		      	<input type="radio" name="gioitinh" value="Nữ">Nữ
	      	</div>
	    	<div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       	<?php 
		      	if(isset($errors) && in_array('gioitinh',$errors))
		      	{
		        echo"<li>Giới Tính Không Được Để Trống</li>";
		     	 }
		      	?>
		    </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 control-label">Quyền truy cập</label>
	    <div class="col-sm-10">
	      <select name="qtc" class="form-control">
	      	<option value="">....chọn....</option>
	      	<option value="1">Admin</option>
	      	<option value="2">Biên tập viên</option>
	      </select>
	      <div class="btn-danger errors" style="font-size: 16px;box-shadow: 1px 1px 4px 1px #2d2b2b;">
		       <?php 
		      if(isset($errors) && in_array('qtc',$errors))
		      {
		        echo"<li>Quyền Truy Cập Không Được Để Trống</li>";
		      }
		      ?>
		  </div>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 control-label"></label>
	    <div class="col-sm-10">
	      <button name="luu" id="luu" class="btn btn-info glyphicon glyphicon-floppy-save">Lưu</button>
	    </div>
  	</div>
  	</form>
  	<?php
  	}}
  	?>
</section>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
	$("div.errors").delay(2500).slideUp();
	$("div.success").delay(2500).slideUp();
} );
</script>