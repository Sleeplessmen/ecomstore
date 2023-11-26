<?php

session_start();
include("../partials/connect.php");

$customerID = $_SESSION['customer_id'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$phone = $_POST['phone'];
$paymentMethod = $_POST['payment'];
$comment = $_POST['comment'];
$total = $_POST['total'];

// Insert order information
$insertOrderQuery = "INSERT INTO orders (customerID, addressLine, postalCode, phone, paymentMethod, comment, total_amount)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $connect->prepare($insertOrderQuery);
$stmt->bind_param("isssssi", $customerID, $address, $postcode, $phone, $paymentMethod, $comment, $total);
$stmt->execute();
$stmt->close();

// Retrieve the orderID of the newly inserted order
$orderIDQuery = "SELECT orderID FROM orders ORDER BY orderID DESC LIMIT 1";
$result = $connect->query($orderIDQuery);
$final = $result->fetch_assoc();
$orderID = $final['orderID'];

// Insert order details for each item in the cart
foreach ($_SESSION['cart'] as $key => $value) {
    $productID = $value['id'];
    $quantity = $value['quantity'];

    $insertOrderDetailsQuery = "INSERT INTO orderdetails (orderID, productID, quantity) VALUES (?, ?, ?)";
    $stmt = $connect->prepare($insertOrderDetailsQuery);
    $stmt->bind_param("isi", $orderID, $productID, $quantity);
    $stmt->execute();
    $stmt->close();
}

// Clear the cart after the order is placed
unset($_SESSION['cart']);

// Redirect to a confirmation page or any other page as needed
header('Location: ../index.php');

?>
