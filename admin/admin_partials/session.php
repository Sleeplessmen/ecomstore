<?php

session_start();

if(empty($_SESSION['email'] and $_SESSION['password'])) {
    header("Location: admin_login.php");
}


?>