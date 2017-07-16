<!-- trang login -->
<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/login.css">
</head>
<body class="bg-body">
<div class="container">
<?php
  require("../sql/connect.php");
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $errors=array();
    if(empty($_POST['Email']))
    {
      $errors[]='email';
    }
    else
    {
      $email=$_POST['Email'];
    }
     if(empty($_POST['Password']))
    {
      $errors[]='password';
    }
    else
    {
      $pass=$_POST['Password'];
    }
    if(empty($errors))
    {
      $sql = "SELECT * FROM PHIM.USER";
      $stmt = db2_prepare($conn, $sql);
      $result = db2_execute($stmt);
      while ($row = db2_fetch_array($stmt)) {
        if($email==$row[3])
        {
         if(password_verify($pass,$row[4]))
         {
            $_SESSION["email"] = $email;
            $_SESSION["pass"] = $pass;
            $_SESSION["level"] = $row[8];
            header("location:index.php");
            db2_close($conn);
         }
        else
          {
            $errors[]='khongtontai';
          }
        }
        else
        {
            $errors[]='khongtontai';
        }
      }

  }
}
?>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="padding-top: 100px">
      <form id="form-login" method="post" action="">
      
        <div class="" style="text-align: center;">
          <img src="upload/logo-text.png" width="100px">
        </div>
        <hr>
        <div class="btn-danger text-center" id="errors">
           <?php 
          if(isset($errors) && in_array('email',$errors))
          {
            echo"<li>Email Không Được Để Trống</li>";
          }
          if(isset($errors) && in_array('password',$errors))
          {
            echo"<li>Password Không Được Để Trống</li>";
          }
          if(isset($errors) && in_array('khongtontai',$errors))
          {
            echo"<li>Email Password không đúng!</li>";
          }
        ?>
        </div>
        <br/>
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><b class="glyphicon glyphicon-user"></b></span>
          <input title="Nhập Email" type="email" name="Email" class="form-control" placeholder="Email của bạn" aria-describedby="sizing-addon2">
        </div>

        </br>
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2" title="Click show Password"><b class="glyphicon glyphicon-eye-close" id="eye-close"></b></span>
          <input title="Nhập Password" type="Password" name="Password" id="Password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2">
        </div>
        <div class="checkbox ">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <hr>
        <div class="form-control" style="background-color: #990000;border: 2px solid #eee">
          <button type="submit" id="submit" class="btn btn-danger form-control glyphicon glyphicon-log-in"><b> Login</b></button>
        </div>
      
      </form>
    </div>
  </div>
</div>
</body>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#errors").delay(3000).slideUp();
});

// $('#form-login').submit(function(){
//   var user = $("#Username").val();
//   var pass = $("#Password").val();
//   $.ajax({
//     url:"checklogin.php",
//     type:"post",
//     data:{
//       user:user,
//       pass:pass
//     },
//     success:function(data){
//       console.log(data);
//     }

//   });

// });
</script>
</html>