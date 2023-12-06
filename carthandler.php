<?php
session_start();

include("partials/connect.php");

// Check if 'cart' session variable is set
if (isset($_SESSION['cart'])) {
    $checker = array_column($_SESSION['cart'], 'name');
    
    if (in_array($_GET['name'], $checker)) {
        // If the product is already in the cart, increment the quantity
        $key = array_search($_GET['name'], $checker);
        $_SESSION['cart'][$key]['quantity']++;
        
        // Update the quantity in the database
        $update_query = "UPDATE carts SET itemQuantity = itemQuantity + 1 WHERE customerID = ? AND itemID = ?";
        $update_stmt = $connect->prepare($update_query);
        $update_stmt->bind_param("is", $_SESSION['customer_id'], $_GET['item_id']);

        try {
            if ($update_stmt->execute()) {
                echo "<script>alert('Đã thêm một sản phẩm vào giỏ hàng');
                window.location.href='details.php?detail_id=". $_GET['item_id'] . "';
                </script>";
            } else {
                echo "<script>alert('Lỗi xảy ra khi cập nhật giỏ hàng');
                window.location.href='product.php?category=0';
                </script>";
            }
            $update_stmt->close();
        } catch (mysqli_sql_exception $e) {
            // Catch any SQL exceptions and retrieve the error message
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    } else {
        // If there are already some items in the cart
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = array(
            'item_id' => $_GET['item_id'],
            'name' => $_GET['name'],
            'price' => $_GET['price'],
            'quantity' => 1
        );

        // Insert the item into the database table
        $insert_query = "INSERT INTO carts (customerID, itemID, itemName, itemPrice, itemQuantity) VALUES (?, ?, ?, ?, 1)";
        $insert_stmt = $connect->prepare($insert_query);
        $insert_stmt->bind_param("issi", $_SESSION['customer_id'], $_GET['item_id'], $_GET['name'], $_GET['price']);

        try {
            if ($insert_stmt->execute()) {
                echo "<script>alert('Đã thêm sản phẩm vào giỏ hàng');
                window.location.href='details.php?detail_id=". $_GET['item_id'] . "';
                </script>";
            } else {
                echo "<script>alert('Lỗi xảy ra khi thêm sản phẩm vào giỏ hàng');
                window.location.href='product.php?category=0';
                </script>";
            }
            $insert_stmt->close();
        } catch (mysqli_sql_exception $e) {
            // Catch any SQL exceptions and retrieve the error message
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
} else {
    // If it's the first item in the cart
    $_SESSION['cart'][0] = array(
        'item_id' => $_GET['item_id'],
        'name' => $_GET['name'],
        'price' => $_GET['price'],
        'quantity' => 1
    );

    // Insert the item into the database table
    $insert_query = "INSERT INTO carts (customerID, itemID, itemName, itemPrice, itemQuantity) VALUES (?, ?, ?, ?, 1)";
    $insert_stmt = $connect->prepare($insert_query);
    $insert_stmt->bind_param("issi", $_SESSION['customer_id'], $_GET['item_id'], $_GET['name'], $_GET['price']);

    try {
        if ($insert_stmt->execute()) {
            echo "<script>alert('Đã thêm sản phẩm vào giỏ hàng');
            window.location.href='cart.php';
            </script>";
        } else {
            echo "<script>alert('Lỗi xảy ra khi thêm sản phẩm vào giỏ hàng');
            window.location.href='product.php?category=0';
            </script>";
        }
        $insert_stmt->close();
    } catch (mysqli_sql_exception $e) {
        // Catch any SQL exceptions and retrieve the error message
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
print_r($_SESSION['cart']);
?>
