<!-- Kiểm Tra đăng Nhập -->
<?php
ob_start();
session_start();
?>
<?php
  require("../sql/connect.php");
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $errors=array();
    if(empty($_POST['Username']))
    {
      $errors[]='username';
    }
    else
    {
      $user=$_POST['Username'];
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
      $sql = "SELECT * FROM lam.User WHERE USERNAME='$user'AND PASSWORD='$pass'";
      $stmt = db2_prepare($conn, $sql);
      $result = db2_execute($stmt);


      $row = db2_fetch_array($stmt);
        if($row!=NULL)
        {
          if($row[4]==1)
          {
            $_SESSION["user"] = $user;
            $_SESSION["pass"] = $pass;
            header("location:index.php");
            db2_close($conn);
          }
        }
        else
          {
            $errors[]='khongtontai';
          }
      }

  }
?>