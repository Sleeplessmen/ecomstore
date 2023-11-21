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
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6">
                    <form role="form" action="cathandler.php" method="post">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add Category</h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" class="form-control" id="category" placeholder="Enter Category" name="name" required>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
