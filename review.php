<?php
session_start();
// Include database connection
include("partials/connect.php");

if(empty($_SESSION['customer_id'])) {
    echo "<script> alert('Bạn cần đăng nhập hoặc đăng ký để đánh giá');
    window.location.href='customerforms.php';
    </script>";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the forms
    $productID = $_POST['productID']; // You should include this input field in your form
    $customerID = $_SESSION['customer_id']; // You should include this input field in your form
    $rating = $_POST['rating'];
    $reviewText = $_POST['review'];

    // Validate data (you might want to add more validation)
    if (empty($rating)) {
        echo "<script> alert('Đánh giá không được để trống.');
        window.location.href='details.php?detail_id=" . $productID . "';
        </script>";
    }

    // Insert the review into the database
    $insertReview = $connect->prepare("INSERT INTO reviews (productID, customerID, reviewRating, reviewText, reviewDate) VALUES (?, ?, ?, ?, NOW())");
    $insertReview->bind_param("siis", $productID, $customerID, $rating, $reviewText);

    if ($insertReview->execute()) {
        echo "<script> alert('Thêm đánh giá thành công');
        window.location.href='details.php?detail_id=" . $productID . "';
        </script>";
    } else {
        echo "<script> alert('Lỗi xảy ra khi thêm đánh giá: ' . $insertReview->error);
        window.location.href='details.php?detail_id=" . $productID . "';
        </script>";
    }

    // Close the prepared statement
    $insertReview->close();
} else {
    header("Location: index.php"); // Replace index.php with the actual path of your product detail page
}
?>
