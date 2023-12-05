<?php
session_start();

include("partials/connect.php");

// This is for details.php, add 1 item of the product type to the cart
if (isset($_SESSION['cart'])) {
    $checker=array_column($_SESSION['cart'], 'name');
    if(in_array($_GET['name'], $checker)) {
        echo "<script>alert('Sản phẩm đã có sẳn trong giỏ hàng.');
        window.location.href='product.php';
        </script>";
    } 

    else {
    // if there are already some items in the cart
    $count=count($_SESSION['cart']);
    $_SESSION['cart'][$count] = array(
    'item_id'=>$_GET['item_id'], 
    'name'=>$_GET['name'], 
    'price'=>$_GET['price'],
    'quantity'=>1);

    // Insert the item into the database table
    $insert_query = "INSERT INTO carts (customerID, itemID, itemName, itemPrice, itemQuantity) VALUES (?, ?, ?, ?, 1)";
    $stmt = $connect->prepare($insert_query);
    $stmt->bind_param("issi", $_SESSION['customer_id'], $_GET['item_id'], $_GET['name'], $_GET['price']);

    if ($stmt->execute()) {
        echo "<script>alert('Đã thêm sản phẩm vào giỏ hàng');
        window.location.href='cart.php';
        </script>";
    } else {
        echo "<script>alert('Lỗi xảy ra khi thêm sản phẩm vào giỏ hàng');
        window.location.href='product.php?category=0';
        </script>";
    }

    $stmt->close();
    }   
} else {
    // if it's the first item in the cart
    $_SESSION['cart'][0] = array(
        'item_id'=>$_GET['item_id'], 
        'name'=>$_GET['name'], 
        'price'=>$_GET['price'],
        'quantity'=>1);
    
    // Insert the item into the database table
    $insert_query = "INSERT INTO carts (customerID, itemID, itemName, itemPrice, itemQuantity) VALUES (?, ?, ?, ?, 1)";
    $stmt = $connect->prepare($insert_query);
    $stmt->bind_param("issi", $_SESSION['customer_id'], $_GET['item_id'], $_GET['name'], $_GET['price']);

    if ($stmt->execute()) {
        echo "<script>alert('Đã thêm sản phẩm vào giỏ hàng');
        window.location.href='cart.php';
        </script>";
    } else {
        echo "<script>alert('Lỗi xảy ra khi thêm sản phẩm vào giỏ hàng');
        window.location.href='product.php?category=0';
        </script>";
    }

    $stmt->close();
}   
print_r($_SESSION['cart']);

?>