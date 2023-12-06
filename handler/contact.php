<?php 
include("../partials/connect.php");

$email = $_POST['email']; 
$msg = $_POST['msg'];

$sql = "INSERT INTO contacts(contactEmail, contactMsg) VALUES('$email', '$msg')";

if($connect->query($sql)) {
    echo "<script>alert('Đã gửi thư thành công');
    window.location.href='../index.php';
    </script>";
} else {
    echo "<script>alert('Lỗi xảy ra');
    window.location.href='contact.php';
    </script>";
}


?>