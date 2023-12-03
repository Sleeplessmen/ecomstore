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
                    Quản lý đơn hàng
                </h1>
            </section>

            <!-- Main Content -->
            <section class="content">
                <p><a href="orders.php" class="btn btn-success" style="font-family: 'Open Sans', sans-serif;">Xem tất cả đơn hàng</a><br></p>
                <h3 style="font-family: 'Open Sans', sans-serif;">Đơn hàng gần đây</h3>

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        include('../partials/connect.php');
                        $sql = "SELECT o.orderID, c.customerUsername, o.status, o.total_amount, o.created_at FROM orders o
                        INNER JOIN customers c ON c.customerID = o.customerID
                        limit 20";
                        $stmt = $connect->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        ?>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="font-family: 'Open Sans', sans-serif;">Mã đơn hàng</th>
                                    <th style="font-family: 'Open Sans', sans-serif;">Tên tài khoản</th>
                                    <th style="font-family: 'Open Sans', sans-serif;">Trạng thái</th>
                                    <th style="font-family: 'Open Sans', sans-serif;">Tổng đơn hàng</th>
                                    <th style="font-family: 'Open Sans', sans-serif;">Ngày đặt hàng</th>
                                    <th style="font-family: 'Open Sans', sans-serif;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($order = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td style="font-family: 'Open Sans', sans-serif;"><?php echo $order['orderID']; ?></td>
                                        <td style="font-family: 'Open Sans', sans-serif;"><?php echo $order['customerUsername']; ?></td>
                                        <td style="font-family: 'Open Sans', sans-serif;"><?php echo $order['status']; ?></td>
                                        <td style="font-family: 'Open Sans', sans-serif;"><?php echo number_format($order['total_amount'], 0, ',', '.') . 'đ'; ?></td>
                                        <td style="font-family: 'Open Sans', sans-serif;"><?php echo $order['created_at']; ?></td>
                                        <td>
                                            <a href="view_order.php?id=<?php echo $order['orderID']; ?>" class="btn btn-info btn-sm" style="font-family: 'Open Sans', sans-serif;">Xem chi tiết</a>
                                            <a href="edit_order.php?id=<?php echo $order['orderID']; ?>" class="btn btn-warning btn-sm" style="font-family: 'Open Sans', sans-serif;">Sửa đơn hàng</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
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
