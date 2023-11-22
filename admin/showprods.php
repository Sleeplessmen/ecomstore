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

                    <?php
                    include('../partials/connect.php');

                    // Use prepared statement to fetch the product details
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM products WHERE productID = ?";
                    $stmt = $connect->prepare($sql);
                    $stmt->bind_param("s", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Check if product exists
                    if ($result->num_rows > 0) {
                        $final = $result->fetch_assoc();
                    ?>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <h3>Name: <?php echo $final['productName'] ?></h3>
                                    <hr>
                                    <h3>Price: <?php echo number_format($final['productPrice'], 0, ',', '.') . ' VND'; ?>
                                    <hr>
                                    <h3>Description: <?php echo $final['productDescription'] ?></h3>
                                    <hr>
                                    <h3>Image:</h3>
                                    <img src="<?php echo $final['productPicture'] ?>" alt="Product Image" style="height:300px; width:300px">
                                </div>
                            </div>
                        </div>
                    <?php } else {
                        echo "<p>Product not found.</p>";
                    } ?>

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
