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
        // Redirect to cart.php
        header('Location: ../index.php');
        exit();
    } else {
        echo "<script>
        alert('Tên đăng nhập hoặc mật khẩu không đúng');
        window.location.href='../customerforms.php';
        </script>";
        exit();
    }
}
?>
