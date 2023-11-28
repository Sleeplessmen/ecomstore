<?php
// Include database connection
include("partials/connect.php");
session_start();

if(!isset($_SESSION['customer_id'])) {
    header('location: customerforms.php');
}

// Check if the form is submitted
if (isset($_POST['addreview'])) {
    // Get data from the form
    $productID = $_POST['product_id']; // You should include this input field in your form
    $customerID = $_SESSION['customer_id']; // You should include this input field in your form
    $rating = $_POST['rating'];
    $reviewText = $_POST['review'];

    // Insert the review into the database
    $insertReview = $connect->prepare("INSERT INTO reviews (productID, customerID, reviewRating, reviewText, reviewDate) VALUES (?, ?, ?, ?, NOW())");
    $insertReview->bind_param("siss", $productID, $customerID, $rating, $reviewText);

    if ($insertReview->execute()) {
        echo "<script> alert('Thêm đánh giá thành công.');
        window.location.href= 'product.php';
        </script>";
    } else {
        echo "<script> alert('Lỗi xảy ra khi thêm đánh giá.' . $insertReview->error);
        window.location.href= 'cart.php';
        </script>";
    }

    // Close the prepared statement
    $insertReview->close();
} else {
    header('location: index.php');
}
?>
