<?php
session_start();

// Assuming you have a database connection
include("partials/connect.php");

if (isset($_POST['remove'])) {
    $removedItemID = $_POST['item_id'];

    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['item_id'] == $removedItemID) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);

            $delete_query = "DELETE FROM carts WHERE itemID=? AND customerID=?";
            $stmt = $connect->prepare($delete_query);
            $stmt->bind_param("si", $removedItemID, $_SESSION['customer_id']);

            if ($stmt->execute()) {
                header('Location: cart.php');
                exit();
            } else {
                echo "<script>
                    alert('Lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng');
                    window.location.href='cart.php';
                </script>";
                exit();
            }

            $stmt->close();
        }
    }
}

// Close the database connection
$connect->close();
?>
