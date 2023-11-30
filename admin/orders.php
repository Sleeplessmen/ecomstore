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
                    <li><a href="admin_index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"><a href="showproducts.php">Product</li>
                </ol>
            </section>

            <!-- Main Content -->
            <section class="content">
                <p><a href="products.php" class="btn btn-success" style="font-family: 'Open Sans', sans-serif;">Thêm sản phẩm mới</a><br></p>
                <h3>Show All Products</h3>
                <div class="row">
                    
                    <?php
                    include('../partials/connect.php');
                    $sql = "SELECT * FROM products";
                    $stmt = $connect->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($product = $result->fetch_assoc()) :
                    ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['productID'] ?>: <?php echo $product['productName'] ?></h5>

                                    <div class="btn-group" role="group">
                                        <a href="showprods.php?id=<?php echo $product['productID'] ?>" class="btn btn-info">View</a>
                                        <a href="updateprods.php?id=<?php echo $product['productID'] ?>" class="btn btn-primary">Update</a>
                                        <a href="deleteprods.php?id=<?php echo $product['productID'] ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                
            </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include("admin_partials/footer.php"); ?>
    </div>
</body>

</html>
