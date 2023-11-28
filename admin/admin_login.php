<?php 
include("admin_partials/head.php");
session_start();

if(isset($_POST['login'])) {
    include("../partials/connect.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE admin_username ='{$username}' AND admin_password = '{$password}'";
    
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $final = $result->fetch_assoc();
        $_SESSION['username'] = $final['username'];
        $_SESSION['password'] = $final['password'];
        header('Location: admin_index.php');
    } else {
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
            <form class="form-horizontal" action="admin_login.php" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                        </div> 
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
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
                    <button type="submit" class="btn btn-info pull-right" name="login">Log in</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- box box-info -->
    </div>

    <div class="col-sm-4"></div>
</div>
