<?php
session_start();

// Assuming you have a database connection
include("partials/connect.php");

if(isset($_POST['remove'])) {
    $removedItemID = $_POST['item_id'];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['item_id'] == $removedItemID) {
             
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);

            // Remove the item from the database table
            $delete_query = "DELETE FROM carts WHERE itemID = '$removedItemID' and customerID = '{$_SESSION['customer_id']}'";
            $stmt = $connect->query($delete_query);

            if ($stmt) {
                echo "<script>
                    alert('Đã xóa sản phẩm khỏi giỏ hàng');
                    window.location.href='cart.php';
                </script>";
            } else {
                echo "<script>
                    alert('Lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng');
                    window.location.href='cart.php';
                </script>";
            }

            $stmt->close();
        }
    }
}

// Close the database connection
$connect->close();
?>