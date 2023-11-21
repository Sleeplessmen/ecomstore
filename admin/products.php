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
                        <form role="form" action="prodhandler.php" method="post" enctype="multipart/form-data">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Product</h3>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Product Price</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">đ</span>
                                            <input type="number" step="any" min="0" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Product Description</label>
                                        <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter Description" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Product Quantity</label>
                                        <input type="number" min="0" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="picture">Product Image</label>
                                        <input type="file" id="picture" name="file" required>
                                        <p class="help-block">Upload an image of the product.</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" name="category">
                                          <?php 
                                          include("../partials/connect.php");

                                          $cat = "select * from categories";
                                          $results=mysqli_query($connect, $cat);

                                          while($row=mysqli_fetch_assoc($results)) {
                                            echo "<option value=" . $row['categoryID']. ">" . $row['categoryName'] . "</option>";
                                          }
                                          ?>
                                        </select>
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
    </div>
</body>

</html>
