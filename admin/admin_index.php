<!DOCTYPE html>
<html lang="en">

<?php
include("admin_partials/session.php");
include("admin_partials/head.php");
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Header -->
        <?php include("admin_partials/header.php") ?>

        <!-- Aside -->
        <?php include("admin_partials/aside.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Trang tổng quan cho quản trị viên
                </h1>
            </section>

            <!-- Main Content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title" style="font-family: 'Open Sans', sans-serif;">Xin chào, <?php echo $_SESSION['name']; ?>!</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="font-family: 'Open Sans', sans-serif;">
                                <!-- Your content goes here -->
                                <p>Đây là bảng điều khiển quản trị. Bạn có thể quản lý nội dung, người dùng và cài đặt của mình từ đây.<br>
                                Vui lòng tùy chỉnh trang này cho phù hợp với nhu cầu của bạn.</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include("admin_partials/footer.php"); ?>
    </div>
</body>

</html>
