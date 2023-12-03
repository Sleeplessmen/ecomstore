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
                <h1  style="font-family: 'Open Sans', sans-serif;">
                    Quản lý danh mục
                </h1>
            </section>

            <!-- Main Content -->
            <section class="content">
                <p><a href="categories.php" class="btn btn-success" style="font-family: 'Open Sans', sans-serif;">Thêm danh mục mới</a><br></p>
                <h3 style="font-family: 'Open Sans', sans-serif;">Tất cả danh mục</h3>
                
                
                <?php
                include('../partials/connect.php');
                $sql = "SELECT * FROM categories";
                $stmt = $connect->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="font-family: 'Open Sans', sans-serif;">Tên danh mục</th>
                                            <th style="font-family: 'Open Sans', sans-serif;">Dòng sản phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($category = $result->fetch_assoc()) :
                                        ?>
                                            <tr>
                                                <td style="font-family: 'Open Sans', sans-serif;"><?php echo $category['categoryName']; ?></td>
                                                <td style="font-family: 'Open Sans', sans-serif;">
                                                    <?php
                                                    $productLinesSql = "SELECT * FROM productlines WHERE categoryID = '{$category['categoryID']}'";
                                                    $productLinesStmt = $connect->prepare($productLinesSql);
                                                    $productLinesStmt->execute();
                                                    $productLinesResult = $productLinesStmt->get_result();

                                                    while ($productLine = $productLinesResult->fetch_assoc()) :
                                                        echo $productLine['productLine'] . '<br>';
                                                    endwhile;
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include("admin_partials/footer.php"); ?>
    </div>
</body>

</html>
