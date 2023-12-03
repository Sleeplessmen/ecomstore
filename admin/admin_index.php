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
                           
                            <!-- /.box-header -->
                            <div class="box-body" style="font-family: 'Open Sans', sans-serif;">
                                <!-- Your content goes here -->
                                <div class="row">
                                    <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner">
                                            <h3 style="font-family: 'Open Sans', sans-serif;">150</h3>
                                            <p style="font-family: 'Open Sans', sans-serif;">Đơn hàng mới</p>
                                            </div>
                                            <div class="icon">
                                            <i class="fa fa-shopping-cart"></i>
                                            </div>
                                            <a href="orders.php" class="small-box-footer" style="font-family: 'Open Sans', sans-serif;">
                                            Xem thêm <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-green">
                                            <div class="inner">
                                            <h3 style="font-family: 'Open Sans', sans-serif;">53<sup style="font-size: 20px">%</sup></h3>
                                            <p style="font-family: 'Open Sans', sans-serif;">Tỷ lệ thoát</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                            </div>
                                            <a href="orders.php" class="small-box-footer" style="font-family: 'Open Sans', sans-serif;">
                                            Xem thêm <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                            <h3 style="font-family: 'Open Sans', sans-serif;">44</h3>
                                            <p style="font-family: 'Open Sans', sans-serif;">Số lượng người dùng đăng ký</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="orders.php" class="small-box-footer" style="font-family: 'Open Sans', sans-serif;">
                                            Xem thêm <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-red">
                                            <div class="inner">
                                            <h3 style="font-family: 'Open Sans', sans-serif;">65</h3>
                                            <p style="font-family: 'Open Sans', sans-serif;">Lượt truy cập gần đây</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="orders.php" class="small-box-footer" style="font-family: 'Open Sans', sans-serif;">
                                            Xem thêm <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
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
