<?php
session_start();
include("../partials/head.php");

if (isset($_POST['login'])) { 
    include("../partials/connect.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $stmt = $connect->prepare("SELECT * FROM customers WHERE customerUsername = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $final = $result->fetch_assoc();

    // Check if the user exists and the password is correct
    if ($final && password_verify($password, $final['customerPassword'])) {
        // Store only necessary information in the session
        $_SESSION['customer_id'] = $final['customerID'];
        $_SESSION['customer_username'] = $final['customerUsername'];

        // Check if there are items in the cart for this customer
        $cartStmt = $connect->prepare("SELECT * FROM carts WHERE customerID = ?");
        $cartStmt->bind_param("i", $final['customerID']);
        $cartStmt->execute();
        $cartResult = $cartStmt->get_result();

        if ($cartResult->num_rows > 0) {
            // Initialize an array to store cart items
            $cartItems = array();

            // Fetch each item from the cart and store it in the array
            while ($cartItem = $cartResult->fetch_assoc()) {
                $cartItems[] = array(
                    'item_id' => $cartItem['itemID'],
                    'name' => $cartItem['itemName'],
                    'price' => $cartItem['itemPrice'],
                    'quantity' => $cartItem['itemQuantity']
                );
            }

            // Store the cart items in the session
            $_SESSION['cart'] = $cartItems;
        } 
        header('Location: ../index.php');
        exit();
    } else {
        echo "<script>
        alert('Tên đăng nhập hoặc mật khẩu không đúng');
        window.location.href='../customerforms.php';
        </script>";
        exit();
    }
} else {
    echo "<script>
    alert('Lỗi');
    window.location.href='../customerforms.php';
    </script>";
    exit();
}

?>
