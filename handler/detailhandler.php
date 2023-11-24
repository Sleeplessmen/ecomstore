<?php
    include("partials/connect.php");
    $id=$_GET['detail_id'];
    $sql="SELECT * FROM products WHERE productID = '$id'";
    $results=$connect->query($sql);

    $final=$results->fetch_assoc();

?>  