<!-- Trang Danh sách Phim -->
<?php
require("../sql/connect.php");
if(isset($_SESSION["email"]))
{
    $email=$_SESSION["email"];
}
if(isset($_GET['success'])){
$success[]=$_GET['success'];
}

		$sql = "SELECT * FROM PHIM.PHIM";
        $stmt = db2_prepare($conn, $sql);
        $result = db2_execute($stmt);
        if($result)
        {
?>
<section class="content-header">
      <h1>
        Quản Lý Phim
        <small>Danh Sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Danh Sách Phim</li>
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
            	<th>Tiêu Đề</th>
                <th>Tiêu Đề Không Dấu</th>
                <th>Nội Dung Phim</th>
                <th>Link Video</th>
                <th>Hình Ảnh</th>
                <th>Nổi Bật</th>
                <th>Số Lượt Xem</th>
                <th>Danh Mục</th>
                <th>Tác Giả</th>
                <th>Sữa</th>
                <th>Xóa</th>
            </tr>
        </thead>

        <tbody>
             <?php
            while ($row = db2_fetch_array($stmt)) {
            	$iddanhmuc=$row[8]
            ?>
            <tr>
                <th><?php echo $row[1];?></th>
                <th><?php echo $row[2];?></th>
                <th><?php echo $row[3];?></th>
                <th><?php echo $row[4];?></th>
                <th><img width="50" src="upload/<?php echo $row[5];?>"></th>
                <th><?php echo $row[6];?></th>
                <th><?php echo $row[7];?></th>
                <?php 
                $sql = "SELECT * FROM PHIM.DANHMUC Where ID=$iddanhmuc";
        		$stmt1 = db2_prepare($conn, $sql);
        		$result1 = db2_execute($stmt1);
       		 	if($result1)
        		{
        		$row1=db2_fetch_array($stmt1);
                ?>
                <th><?php echo $row1[1];?></th>
                <?php } ?>
              
                <th><?php echo $row[9];?></th>
                <th><a class="btn btn-primary fa fa-pencil-square-o" href="index.php?page=suaphim&id=<?php echo $row[0]; ?>"> Sữa</a></th>
                <th><a class="btn btn-danger  fa fa-trash-o" href="xoaphim.php?id=<?php echo $row[0]; ?>"> Xóa</a></th>
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