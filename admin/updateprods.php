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
                        <form role="form" action="updateprodshandler.php" method="post" enctype="multipart/form-data">
                            <?php
                            $newID = $_GET['id'];
                            include('../partials/connect.php');

                            $sql = "SELECT * FROM products WHERE productID = '$newID'";
                            $results = $connect->query($sql);

                            $final = $results->fetch_assoc();
                            ?>

                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Update Product</h3>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $final['productName'] ?>" placeholder="Enter Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Product Price</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">đ</span>
                                            <input type="number" step="any" min="0" class="form-control" id="price" name="price" value="<?php echo $final['productPrice'] ?>" placeholder="Enter Price" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Product Description</label>
                                        <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter Description" required><?php echo $final['productDescription'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Product Quantity</label>
                                        <input type="number" min="0" class="form-control" id="quantity" name="quantity" value="<?php echo $final['productQuantity'] ?>" placeholder="Enter Quantity" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="picture">Product Image</label>

                                        <div>
                                        <!-- Display the current image -->
                                        <img src="<?php echo $final['productPicture'] ?>" alt="Current Product Image" style="max-height: 150px; max-width: 150px; margin-bottom: 10px;">
                                        </div>

                                        <!-- Input for the new image -->
                                        <input type="file" id="picture" name="file">
                                    </div>


                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" name="category" class="form-control">
                                            <?php
                                            include("../partials/connect.php");

                                            $cat = "SELECT * FROM categories";
                                            $results = mysqli_query($connect, $cat);

                                            while ($row = mysqli_fetch_assoc($results)) {
                                                $selected = ($row['categoryID'] == $final['CategoryID']) ? "selected" : "";
                                                echo "<option value=" . $row['categoryID'] . " $selected>" . $row['categoryName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="hidden" value="<?php echo $final['productID'] ?>" name="form_id">
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
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
