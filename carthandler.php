<?php

session_start();

include("partials/connect.php");

if (isset($_SESSION['cart'])) {
    $checker=array_column($_SESSION['cart'], 'name');
    if(in_array($_GET['name'], $checker)) {
        echo "<script>alert('PRoduct is already in the cart');
        window.location.href='product.php';
        </script>";
    } 

    else {
    // if there are already some items in the cart
    $count=count($_SESSION['cart']);
    $_SESSION['cart'][$count] = array(
    'id'=>$_GET['cart_id'], 
    'name'=>$_GET['name'], 
    'price'=>$_GET['price'],
    'quantity'=>1 );

    // Insert the item into the database table
    $insert_query = "INSERT INTO carts (itemID, itemName, itemPrice, itemQuantity) VALUES (?, ?, ?, 1)";
    $stmt = $connect->prepare($insert_query);
    $stmt->bind_param("ssi", $_GET['cart_id'], $_GET['name'], $_GET['price']);

    if ($stmt->execute()) {
        echo "<script>alert('Product added');
        window.location.href='cart.php';
        </script>";
    } else {
        echo "<script>alert('Error adding product to the cart');
        window.location.href='product.php';
        </script>";
    }

    $stmt->close();
    }   
} else {
    // if it's the first item in the cart
    $_SESSION['cart'][0] = array(
        'id'=>$_GET['cart_id'], 
        'name'=>$_GET['name'], 
        'price'=>$_GET['price'],
        'quantity'=>1 );
    
    // Insert the item into the database table
    $insert_query = "INSERT INTO carts (itemID, itemName, itemPrice, itemQuantity) VALUES (?, ?, ?, 1)";
    $stmt = $connect->prepare($insert_query);
    $stmt->bind_param("ssi", $_GET['cart_id'], $_GET['name'], $_GET['price']);

    if ($stmt->execute()) {
        echo "<script>alert('Product added');
        window.location.href='cart.php';
        </script>";
    } else {
        echo "<script>alert('Error adding product to the cart');
        window.location.href='product.php';
        </script>";
    }

    $stmt->close();
}   
print_r($_SESSION['cart']);

?>