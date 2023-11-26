<?php
session_start();

include("../partials/head.php");

if (isset($_POST['login'])) {
    include("../partials/connect.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $result = $connect->query("SELECT * FROM customers WHERE customerUsername = '$email'");
    $final = $result->fetch_assoc();

    // Check if the user exists and the password is correct
    if ($final && $password = $final['customerPassword']) {
        // Store only necessary information in the session
        $_SESSION['customer_id'] = $final['customerID'];
        $_SESSION['customer_username'] = $final['customerUsername'];

        // Redirect to cart.php
        header('Location: ../cart.php');
    } else {
        echo "<script>
        alert('Credentials are wrong');
        window.location.href='../customerforms.php';
        </script>";
    }
}
?>
