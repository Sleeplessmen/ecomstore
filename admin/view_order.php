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

        <!-- Aside -->s
        <?php include("admin_partials/myshopaside.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- Main Content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <?php
                                include('../partials/connect.php');

                                // Use prepared statement to fetch the order details
                                $id = $_GET['id'];
                                $sql = "SELECT o.orderID, o.address_line, o.postal_code, o.phone, o.comment, pt.type
                                        FROM orders o
                                        JOIN payment_type pt ON pt.id = o.payment_method_id
                                        WHERE o.orderID = $id";
                                $stmt = $connect->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                // Check if there are any results
                                if ($result->num_rows > 0) {
                                    $order = $result->fetch_assoc();
                                ?>
                                    <h2 style="font-family: 'Open Sans', sans-serif;">Chi tiết đơn hàng - Mã đơn hàng: <?php echo $order['orderID']; ?></h2>
                                    <p style="font-family: 'Open Sans', sans-serif;"><strong>Địa chỉ giao hàng: </strong> <?php echo $order['address_line'] . ', ' . $order['postal_code']; ?></p>
                                    <p style="font-family: 'Open Sans', sans-serif;"><strong>Số điện thoại: </strong> <?php echo $order['phone']; ?></p>
                                    <p style="font-family: 'Open Sans', sans-serif;"><strong>Ghi chú: </strong><?php echo $order['comment']; ?></p>
                                    <p style="font-family: 'Open Sans', sans-serif;"><strong>Phương thức thanh toán: </strong> <?php echo $order['type']; ?></p>

                                    <h3 style="font-family: 'Open Sans', sans-serif;">Sản phẩm đã đặt</h3>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="font-family: 'Open Sans', sans-serif;">Mã sản phẩm</th>
                                                <th style="font-family: 'Open Sans', sans-serif;">Tên sản phẩm</th>
                                                <th style="font-family: 'Open Sans', sans-serif;">Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql1 = "SELECT od.itemID, od.quantity, p.productName
                                            FROM orders o
                                            JOIN orderdetails od ON od.orderID = o.orderID
                                            JOIN products p ON od.itemID = p.productID
                                            WHERE o.orderID = $id";
                                            $stmt1 = $connect->prepare($sql1);
                                            $stmt1->execute();
                                            $result1 = $stmt1->get_result();
                                            while ($orderdetail = $result1->fetch_assoc()) : ?>
                                                <tr>
                                                    <td style="font-family: 'Open Sans', sans-serif;"><?php echo $orderdetail['itemID']; ?></td>
                                                    <td style="font-family: 'Open Sans', sans-serif;"><?php echo $orderdetail['productName']; ?></td>
                                                    <td style="font-family: 'Open Sans', sans-serif;"><?php echo $orderdetail['quantity']; ?></td>
                                                </tr>
                                            <?php
                                            endwhile;
                                            ?>
                                        </tbody>
                                    </table>

                            </div> 
                        </div>
                        <?php
                        } else {
                            echo "<p>Không tìm thấy đơn hàng</p>";
                        }
                        ?>
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
