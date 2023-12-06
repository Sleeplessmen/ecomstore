<?php
session_start();
include('../partials/connect.php');

$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

// Check if the passwords match
if ($password == $confirmpassword) {
    
    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM customers WHERE customerUsername = '$email'";
    $result = $connect->query($checkEmailQuery);

    if ($result->num_rows == 0) {
        // Email doesn't exist, proceed to insert
        // Get the current date and time
        $currentDateTime = date('Y-m-d H:i:s');
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO customers (customerUsername, customerPassword, phone, created_at, updated_at) 
                VALUES ('$email', '$hashedPassword', '$phone', '$currentDateTime', '$currentDateTime')";
        $connect->query($sql);

        $stmt = $connect->prepare("SELECT * FROM customers WHERE customerUsername = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $final = $res->fetch_assoc();

        $_SESSION['customer_id'] = $final['customerID'];
        $_SESSION['customer_username'] = $final['customerUsername']; 
        header('location: ../index.php');
    } else {
        // Email already exists
        echo "<script>
        alert('Tên đăng nhập đã tồn tại');
        window.location.href='../customerforms.php';
        </script>";
        exit();
    }
} else {
    // Passwords don't match
    echo "<script>
    alert('Mật khẩu không đúng');
    window.location.href='../customerforms.php';
    </script>";
    exit();
}
?>
