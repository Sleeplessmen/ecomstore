<?php 
include("admin_partials/head.php");

if(isset($_POST['login'])) {

include("../partials/connect.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql="select * from admins where adminUsername='$email' and adminPassword'$password'";
$results=$connect->query($sql);
$final=$results->fetch_assoc();

$_SESSION['email']=$final['adminUsername'];
$_SESSION['password']=$final['adminPassword'];

if (  $email == $final['adminUsername'] && $password == $final['adminPassword']) {
    header('Location: admin_index.php');
} 
else {
    header('Location: admin_login.php');
}
}  
?>

<div class="row">
    <div class="col-sm-4"></div>

    <div class="col-sm-4">
        <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Admin Login</h3>
            </div>
            <!-- /.box-header -->
             
            <!-- form start -->
            <form class="form-horizontal" action="adminlogin.php" method="post">
              <div class="box-body">

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>

        </div>  
        <!-- box box-info -->
    </div>

    <div class="col-sm-4"></div>
</div>


