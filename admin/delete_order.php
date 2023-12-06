<?php
include('../partials/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $connect->prepare("DELETE FROM orders WHERE orderID = ?");
    $stmt->bind_param("i", $orderId);
    
    if ($stmt->execute()) {
        // Order deletion successful
        echo "<script>
                alert('Đã xóa đơn hàng thành công');
                window.location.href='orders.php';
              </script>";
    } else {
        // Order deletion failed
        echo "<script>
                alert('Lỗi xảy ra khi xóa đơn hàng');
                window.location.href='orders.php';
              </script>";
    }

    $stmt->close();
    $connect->close();
} else {
    // Redirect to orders.php if the order ID is not provided
    header("Location: orders.php");
    exit();
}
?>
