<?php
session_start();

include("partials/connect.php");

if (isset($_POST['quantity']) && isset($_POST['item_id'])) {
    $qty = $_POST['quantity'];
    $itemid = $_POST['item_id'];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['item_id'] == $itemid) {
            
            $_SESSION['cart'][$key]['quantity'] = $qty; 
            // Update quantity in the database
            $sql = "UPDATE carts SET itemQuantity = '$qty' WHERE itemID = '$itemid' AND customerID = '{$_SESSION['customer_id']}'";
            if ($connect->query($sql)) {
                header("Location: cart.php");
            } else {
                echo "Error updating quantity in the database: " . $conn->error;
            }
        }
    }
}

$connect->close();

?>
