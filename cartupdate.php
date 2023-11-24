<?php
session_start();

include("partials/connect.php");

if (isset($_POST['quantity']) && isset($_POST['id'])) {
    $qty = $_POST['quantity'];
    $itemid = $_POST['id'];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id'] == $itemid) {
            
            $_SESSION['cart'][$key]['quantity'] = $qty; 
            // Update quantity in the database
            $sql = "UPDATE carts SET itemQuantity = '$qty' WHERE itemID = '$itemid'";
            if ($connect->query($sql)) {
                header("Location: cart.php");
                exit();
            } else {
                echo "Error updating quantity in the database: " . $conn->error;
            }
        }
    }
}

$connect->close();

?>
