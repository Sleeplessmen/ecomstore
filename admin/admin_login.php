<?php 
session_start();
include("admin_partials/head.php");

if(isset($_POST['login'])) {
include("../partials/connect.php");

$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE admin_username='$name'";
    
$result = $connect->query($sql);
if($result->num_rows > 0) {
    $final = $result->fetch_assoc();
    if ($password == $final['admin_password']) {
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $final['admin_password'];
    $_SESSION['id'] = $final['adminID'];
    $_SESSION['lastname'] = $final['contact_lastname'];
    $_SESSION['firstname'] = $final['contact_firstname'];
    header('Location: admin_index.php');  
    } else {
      echo "<script> alert('Mật khẩu không đúng');
      window.location.href='admin_login.php';
      </script>";
    }
} else {
  echo "<script> alert('Tên đăng nhập không tồn tại');
  window.location.href='admin_login.php';
  </script>";
}
}  

?>

<div class="row">
    <div class="col-sm-4"></div>

    <div class="col-sm-4">
        <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title" style="font-family: 'Open Sans', sans-serif;">Quản trị viên đăng nhập</h3>
            </div>
            <!-- /.box-header -->
             
            <!-- form start -->
            <form class="form-horizontal" action="admin_login.php" method="post">
              <div class="box-body">

                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label" style="font-family: 'Open Sans', sans-serif;">Tên đăng nhập</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Tên đăng nhập" name="name" style="font-family: 'Open Sans', sans-serif;">
                  </div> 
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label" style="font-family: 'Open Sans', sans-serif;">Mật khẩu</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password" style="font-family: 'Open Sans', sans-serif;">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Nhớ mật khẩu
                      </label>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="login" style="font-family: 'Open Sans', sans-serif;">Đăng nhập</button>
              </div>
              <!-- /.box-footer -->
            </form>

        </div>  
        <!-- box box-info -->
    </div>

    <div class="col-sm-4"></div>
</div>


