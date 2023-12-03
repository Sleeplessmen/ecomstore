<?php

include('../partials/connect.php');
$newID = $_GET['id'];

$sql="delete from products where productID  = '$newID'";

if (mysqli_query($connect, $sql)) {
    header('location: showproducts.php');
} 



?>