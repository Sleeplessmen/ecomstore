<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
if (isset($_POST['change'])) {

    if($_POST["new_password"] != $_POST["confirm_new_password"]) {
        echo "<script>
        alert('Mật khẩu không khớp');
        window.location.href='../customerforms.php';
        </script>";
        exit();
    }
    include("../partials/connect.php");

    // Retrieve user input
    $email = $_POST["email"];
    $newPassword = $_POST["new_password"];
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $check = "select * from customers where customerUsername = '{$email}'";
    if(!$connect->query($check)) {
        echo "<script>
        alert('Tên đăng nhập không tồn tại');
        window.location.href='../customerforms.php';
        </script>";
        exit();
    }

    $sql ="update customers set customerPassword = '{$hashedPassword}' where customerUsername = '{$email}'";
    $connect->query($sql);

    $stmt = $connect->prepare("select * from customers where customerUsername = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $final = $result->fetch_assoc();
    
    // Check if the user exists and the password is correct
    if (password_verify($newPassword, $final['customerPassword'])) {
        echo "<script>
        alert('Đổi mật khẩu thành công');
        window.location.href='../customerforms.php';
        </script>";
        exit();

    } else {
        echo "<script>
        alert('Lỗi');
        window.location.href='../customerforms.php';
        </script>";
        exit();
    }
}
}
?>
