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
                                <p>Đây là trang điều khiển quản trị. Bạn có thể quản lý nội dung, người dùng và cài đặt của mình từ đây.</p>

                                <div class="row">
                                    <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner">
                                            <h3>150</h3>
                                            <p>New Orders</p>
                                            </div>
                                            <div class="icon">
                                            <i class="fa fa-shopping-cart"></i>
                                            </div>
                                            <a href="orders.php" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-green">
                                            <div class="inner">
                                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                                            <p>Bounce Rate</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                            <h3>44</h3>

                                            <p>User Registrations</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-red">
                                            <div class="inner">
                                            <h3>65</h3>

                                            <p>Recent Visitors</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <!-- AREA CHART -->
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                        <h3 class="box-title">Area Chart</h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                        </div>
                                        <div class="box-body">
                                        <div class="chart">
                                            <canvas id="areaChart" style="height:250px"></canvas>
                                        </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->

                                    <!-- DONUT CHART -->
                                    <div class="box box-danger">
                                        <div class="box-header with-border">
                                        <h3 class="box-title">Donut Chart</h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                        </div>
                                        <div class="box-body">
                                        <canvas id="pieChart" style="height:250px"></canvas>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->

                                    </div>
                                    <!-- /.col (LEFT) -->
                                    <div class="col-md-6">
                                    <!-- LINE CHART -->
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                        <h3 class="box-title">Line Chart</h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                        </div>
                                        <div class="box-body">
                                        <div class="chart">
                                            <canvas id="lineChart" style="height:250px"></canvas>
                                        </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->

                                    <!-- BAR CHART -->
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                        <h3 class="box-title">Bar Chart</h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                        </div>
                                        <div class="box-body">
                                        <div class="chart">
                                            <canvas id="barChart" style="height:230px"></canvas>
                                        </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->

                                    </div>
                                    <!-- /.col (RIGHT) -->
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
