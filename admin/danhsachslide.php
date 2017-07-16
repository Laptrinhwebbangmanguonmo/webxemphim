<!-- Trang Danh sách Slide  -->
<?php
if(isset($_GET["lv"]))
{
    $lv=$_GET["lv"];
}
if($lv==1)
{
if(isset($_GET['success'])){
$success[]=$_GET['success'];
}
require("../sql/connect.php");
$sql = "SELECT * FROM PHIM.SLIDE";
        $stmt = db2_prepare($conn, $sql);
        $result = db2_execute($stmt);
        if($result)
        {
?>
<section class="content-header">
      <h1>
        Slide
        <small>Danh Sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Danh Sach Slide</li>
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
                <th>Hình Ảnh Slide</th>
                <th>Title Slide</th>
                <th>Nội Dung Slide</th>
                <th>Link Slide</th>
                <th>Độ Ưu Tiên</th>
                <th>Sữa</th>
                <th>Xóa</th>
            </tr>
        </thead>

        <tbody>
             <?php
            while ($row = db2_fetch_array($stmt)) {
            ?>
            <tr>
                <th><img width="100" src="upload/<?php echo $row[2]; ?>"/></th>
                <th><?php echo $row[1]; ?></th>
                <th><?php echo $row[3]; ?></th>
                <th><?php echo $row[4]; ?></th>
                <th><?php echo $row[5]; ?></th>
                <th><a class="btn btn-primary fa fa-pencil-square-o" href="index.php?page=suaslide&id=<?php echo $row[0]; ?>"> Sữa</a></th>
                <th><a class="btn btn-danger  fa fa-trash-o" href="xoaslide.php?id=<?php echo $row[0]; ?>&lv=<?php echo $lv;?>"> Xóa</a></th>
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