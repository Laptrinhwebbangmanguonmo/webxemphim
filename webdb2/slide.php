<?php
  require("sql/connect.php");
  $dem=0;
?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php
      $sql = "SELECT * FROM PHIM.SLIDE WHERE HIENTHI=1";
      $stmt = db2_prepare($conn, $sql);
      $result = db2_execute($stmt);
      if($result)
      {
      $row=db2_fetch_array($stmt);
      if($row[5]=="1")
      {
    ?>
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <?php
      }
      }
      $sql1 = "SELECT * FROM PHIM.SLIDE";
      $stmt1 = db2_prepare($conn, $sql1);
      $result1 = db2_execute($stmt1);
      if($result1)
      {
      while ($row1=db2_fetch_array($stmt1)) {
      if($row1[5]=="0")
      {
      ?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $dem=$dem+1;?>"></li>
      <?php 
      }}
      }
      ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <?php
      $sql3 = "SELECT * FROM PHIM.SLIDE WHERE HIENTHI=1";
      $stmt3 = db2_prepare($conn, $sql3);
      $result3 = db2_execute($stmt3);
      if($result3)
      {
      $row3=db2_fetch_array($stmt3);
      if($row3[5]=="1")
      {
    ?>
      <div class="item active">
        <a href="<?php echo $row3[4];?>">
          <img src="admin/upload/<?php echo $row3[2];?>" style="width:100%;">
          <div class="body-slide">
          <div class="title-slide btn btn-danger">
            <?php echo $row3[1];?>
          </div>
          <div class="noidung-slide">
            <?php echo $row3[3];?>
          </div>
          </div>
        </a>
      </div>
      <?php
        }
      }
      $sql4 = "SELECT * FROM PHIM.SLIDE";
      $stmt4 = db2_prepare($conn, $sql4);
      $result4 = db2_execute($stmt4);
      if($result4)
      {
      while ($row4=db2_fetch_array($stmt4)) {
      if($row4[5]=="0")
      {
      ?>
      <div class="item">
        <a href="<?php echo $row4[4];?>">
        <img src="admin/upload/<?php echo $row4[2];?>" alt="Chicago" style="width:100%;">
        <div class="body-slide">
          <div class="title-slide btn btn-danger">
            <?php echo $row4[1];?>
          </div>
          <div class="noidung-slide">
           <?php echo $row4[3];?>
          </div>
          </div>
        </a>
      </div>
      <?php
        }
      } 
      }
      ?>    
      </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>