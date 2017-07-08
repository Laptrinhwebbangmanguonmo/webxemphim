<?php
if(!isset($_GET["lv"]))
{
?>
    <div class="row" style="height: 200px"></div>
    <div class="text-red text-center"><h1>Bạn không đủ quyền truy cập trang này!Vui lòng quay lại :<a href="index.php">Trang chủ...</a></h1></div>
<?php
}else
{
    $lv=$_GET["lv"];
}
if($lv==1)
{
if(isset($_POST['sua']))
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
        require("../sql/connect.php");
        $sql = "SELECT * FROM PHIM.USER";
        $stmt = db2_prepare($conn, $sql);
        $result = db2_execute($stmt);
        if(isset($result))
        {
        while ($row = db2_fetch_array($stmt)) {
            if($row[3]=="$email")
            {
                $errors[]='email';

                
            }
        }
            $success[]="dangkythanhcong";
        }

        db2_close($conn);
        
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
    require("../sql/connect.php");
    $ins="INSERT INTO PHIM.USER(LASTNAME,FIRSTNAME,EMAIL,PASSWORD,NGAYSINH,HINH,GIOITINH,LEVEL) VALUES('$lastname','$fisrtname','$email','$password','$ngaysinh','$anhdaidien','$gioitinh','$qtc')";
    $stmt1 = db2_prepare($conn, $ins);
    $result1 = db2_execute($stmt1);
    move_uploaded_file($_FILES['anhdaidien']['tmp_name'],"upload/$anhdaidien");
    db2_close($conn);
    }
}
if(isset($_GET['success'])){
$success[]=$_GET['success'];
}
require("../sql/connect.php");
$sql = "SELECT * FROM PHIM.USER";
        $stmt = db2_prepare($conn, $sql);
        $result = db2_execute($stmt);
        if(isset($result))
        {
?>
<section class="content-header">
      <h1>
        Thành Viên
        <small>Danh Sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">tất cả thành viên</li>
      </ol>
</section>
<div <div class="btn-danger text-center errors">
    <?php
    if(isset($errors) && in_array('xoathatbai',$errors))
      {
        echo"<li>Xóa không thành công!</li>";
      }
    ?>
</div>
<div <div class="btn-success text-center success">
    <?php
    if(isset($success) && in_array('xoathanhcong',$success))
      {
        echo"<li>Xóa thành công!</li>";
      }
    ?>
</div>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
<table class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>LastName</th>
                <th>FirstName</th>
                <th>Email</th>
                <th>Ngày Sinh</th>
                <th>Ảnh đại diện</th>
                <th>Giới tính</th>
                <th>Quyền truy cập</th>
                <th>Sữa</th>
                <th>Xóa</th>
            </tr>
        </thead>

        <tbody>
             <?php
            while ($row = db2_fetch_array($stmt)) {
            ?>
            <tr>
                <th><?php echo $row[1]; ?></th>
                <th><?php echo $row[2]; ?></th>
                <th><?php echo $row[3]; ?></th>
                <th><?php echo $row[5]; ?></th>
                <th><img width="100" src="upload/<?php echo $row[6]; ?>"/></th>
                <th><?php echo $row[7]; ?></th>
                <th><?php echo $row[8]; ?></th>
                <th><a class="btn btn-primary fa fa-pencil-square-o" href="index.php?page=suauser&id=<?php echo $row[0]; ?>"> Sữa</a></th>
                <th><a class="btn btn-danger  fa fa-trash-o" href="xoauser.php?id=<?php echo $row[0]; ?>&lv=<?php echo $lv; ?>"> Xóa</a></th>
            </tr>
            <?php }}?>
        </tbody>
</table>
</div>
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

