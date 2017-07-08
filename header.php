<?php
$sql1 = "SELECT * FROM PHIM.DANHMUC";
  $stmt1 = db2_prepare($conn, $sql1);
  $result1 = db2_execute($stmt1);
  if($result1)
  {

?>
<div class="row header-top">
  <div class="header-logo col-md-4 text-center">
  <a href="index.php"><img width="200" src="admin/upload/logo-text-300x120.png" alt="logo"></a>
  </div>
  <div class="search col-md-4">
    <form method="get" action="search.php">
      <div class="input-group">
        <input name="tim" type="text" class="form-control" placeholder="Nhập từ Khóa Bạn Muốn Tìm...">
        <span class="input-group-btn">
          <button name="search" class="btn btn-default" type="submit">Tìm Kiếm!</button>
      </span>
      </div>
    </form>
  </div>
  <div class="clearfix"></div>
</div>
<div class="header-menu">
  <!-- Menu do Bootstrap cung cấp có hỗ trợ menu trên di động -->
  <nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Trang chủ</a>
    </div>
   
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <?php
        while ($row1=db2_fetch_array($stmt1)) {
        ?>
        <li><a href="theloai.php?page=<?php echo $row1[2];?>"><?php echo $row1[1];?></a></li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <!-- End Menu Bootstrap -->
</div>
<?php
  }
?>