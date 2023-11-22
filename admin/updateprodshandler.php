<?php

include('../partials/connect.php');
if(isset($_POST['update'])) {
    $newID = $_POST['form_id'];
    $newname = $_POST['name'];
    $newprice = $_POST['price'];
    $newdesc = $_POST['description'];
    $newquantity = $_POST['quantity'];
    $newcategory = $_POST['category'];

    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES['file']['name']);

    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);

    $sql="UPDATE products set productName='$newname', productPrice='$newprice', 
    productDescription='$newdesc', productQuantity='$newquantity', productPicture='$targetFile',
    categoryID='$newcategory' where productID = '$newID'"; 

    if (mysqli_query($connect, $sql)) {
        header('location: showproducts.php');
    } else {
        header('location: admin_index.php');
    }

}


?>