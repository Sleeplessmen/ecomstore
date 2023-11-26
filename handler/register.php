<?php

include('../partials/connect.php');

$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

// Check if the passwords match
if ($password == $confirmpassword) {
    
    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM customers WHERE customerUsername = '$email'";
    $result = $connect->query($checkEmailQuery);

    if ($result->num_rows == 0) {
        // Email doesn't exist, proceed to insert
        $sql = "INSERT INTO customers (customerUsername, customerPassword) VALUES ('$email', '$password')";
        $connect->query($sql);

        // Redirect to customerforms.php
        header('location: ../customerforms.php');
    } else {
        // Email already exists
        echo "<script>
            alert('Email already exists');
            window.location.href='../customerforms.php';
        </script>";
    }
} else {
    // Passwords don't match
    echo "<script>
        alert('Password did not match');
        window.location.href='../customerforms.php';
    </script>";
}
?>
