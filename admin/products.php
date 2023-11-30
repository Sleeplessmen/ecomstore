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
                <h1  style="font-family: 'Open Sans', sans-serif;">
                    Quản lý sản phẩm
                </h1>
            </section>

            <!-- Main Content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-3"></div>

                    <div class="col-md-6">
                        <form role="form" action="prodhandler.php" method="post" enctype="multipart/form-data">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="font-family: 'Open Sans', sans-serif;">Thêm sản phẩm</h3>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name" style="font-family: 'Open Sans', sans-serif;">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm" style="font-family: 'Open Sans', sans-serif;" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="price" style="font-family: 'Open Sans', sans-serif;">Giá sản phẩm</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">đ</span>
                                            <input type="number" step="any" min="0" class="form-control" id="price" name="price" placeholder="Giá sản phẩm" style="font-family: 'Open Sans', sans-serif;" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" style="font-family: 'Open Sans', sans-serif;">Mô tả sản phẩm</label>
                                        <textarea id="description" name="description" class="form-control" rows="4" placeholder="Mô tả" style="font-family: 'Open Sans', sans-serif;" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity" style="font-family: 'Open Sans', sans-serif;">Số lượng sản phẩm</label>
                                        <input type="number" min="0" class="form-control" id="quantity" name="quantity" placeholder="Số lượng sản phẩm" style="font-family: 'Open Sans', sans-serif;" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="picture" style="font-family: 'Open Sans', sans-serif;">Hình ảnh sản phẩm</label>
                                        <input type="file" id="picture" name="file" required>
                                        <p class="help-block" style="font-family: 'Open Sans', sans-serif;">Đăng tệp hình ảnh sản phẩm.</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="category" style="font-family: 'Open Sans', sans-serif;">Danh mục</label>
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
    </div>
</body>

</html>
