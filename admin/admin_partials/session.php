<?php

session_start();

if(!isset($_SESSION['name'])) {
    echo "<script> alert('Bạn cần đăng nhập tài khoản quản trị viên trước');
     window.location.href='admin_login.php';
    </script>";
}


?>