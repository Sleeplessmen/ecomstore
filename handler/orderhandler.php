<?php

session_start();
include("../partials/connect.php");
if(isset($_SESSION['customer_id'])) {
    $customerID = $_SESSION['customer_id'];
} else {
    echo "<script>
    alert('Bạn cần đăng ký hoặc đăng nhập tài khoản để mua hàng.');
    window.location.href='../customerforms.php';
    </script>";
    exit();
}
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$phone = $_POST['phone'];
$paymentmethodid = $_POST['payment'];
$comment = $_POST['comment'];
$total = $_POST['total'];
$currentDateTime = date('Y-m-d H:i:s');


// Insert order information
$insertOrderQuery = "INSERT INTO orders (customerID, address_line, postal_code, phone, payment_method_id, comment, total_amount, created_at, updated_at)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $connect->prepare($insertOrderQuery);
$stmt->bind_param("isisisiss", $customerID, $address, $postcode, $phone, $paymentmethodid, $comment, $total, $currentDateTime, $currentDateTime);
$stmt->execute();
$stmt->close();

// Retrieve the orderID of the newly inserted order
$orderIDQuery = "SELECT orderID FROM orders ORDER BY orderID DESC LIMIT 1";
$result = $connect->query($orderIDQuery);
$final = $result->fetch_assoc();
$orderID = $final['orderID'];

// Insert order details for each item in the cart
foreach ($_SESSION['cart'] as $key => $value) {
    $productID = $value['item_id'];
    $quantity = $value['quantity'];

    $insertOrderDetailsQuery = "INSERT INTO orderdetails (orderID, itemID, quantity) 
                                VALUES (?, ?, ?)";
    $stmt = $connect->prepare($insertOrderDetailsQuery);
    $stmt->bind_param("isi", $orderID, $productID, $quantity);
    $stmt->execute();
    $stmt->close();
}

$deleteCartQuery = "DELETE FROM carts WHERE customerID = ?";
$stmt = $connect->prepare($deleteCartQuery);
$stmt->bind_param("i", $customerID);
$stmt->execute();
$stmt->close();

if ($paymentmethodid == 2) {
    $_SESSION['total'] = $total;
    header('location: paypal.php');
} else {
    echo "<script> alert('Đơn hàng đã được đặt thành công.');
    window.location.href='../index.php';
    </script>";
}

// Clear the cart after the order is placed
unset($_SESSION['cart']);

// Redirect to a confirmation page or any other page as needed
header('Location: ../index.php');

?>
