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
                <h1 style="font-family: 'Open Sans', sans-serif;">
                    Quản lý danh mục
                </h1>
            </section>

        <!-- Main Content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6">
                    <form role="form" action="cathandler.php" method="post">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title" style="font-family: 'Open Sans', sans-serif;">Thêm danh mục</h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="category" style="font-family: 'Open Sans', sans-serif;">Tên danh mục</label>
                                    <input type="text" class="form-control" id="category" placeholder="Nhập tên danh mục" name="name" style="font-family: 'Open Sans', sans-serif;" required>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" style="font-family: 'Open Sans', sans-serif;">Hoàn thành</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-3"></div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("admin_partials/footer.php"); ?>
</body>
</html>
