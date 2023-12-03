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
        <?php include("admin_partials/myshopaside.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 style="font-family: 'Open Sans', sans-serif;">
                    Quản lý cửa hàng của tôi
                </h1><br>

                <div class="row">
                    <div class="col-sm-9">
                        <a href='showproducts.php' style="font-family: 'Open Sans', sans-serif;">
                            <button style="color: green">Sản phẩm</button>
                        </a>
                        <hr>
                    </div>

                    <div class="col-sm-9">
                        <a href='showcategories.php' style="font-family: 'Open Sans', sans-serif;">
                            <button style="color: green">Danh mục</button>
                        </a>
                        <hr>
                    </div>

                    <div class="col-sm-9">
                        <a href='orders.php' style="font-family: 'Open Sans', sans-serif;">
                            <button style="color: green">Đơn hàng</button>
                        </a>
                        <hr>
                    </div>
                </div>
            </section>

            <!-- Main Content -->
            <section class="content">
                
            </section>
            
        </div>
        <!-- /.content-wrapper -->

        <?php include("admin_partials/footer.php"); ?>
    </div>
</body>

</html>
