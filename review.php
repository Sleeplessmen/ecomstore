<?php
// Include database connection
include("partials/connect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    // $productID = $_POST['productID']; // You should include this input field in your form
    $customerID = $_SESSION['customer_id']; // You should include this input field in your form
    $rating = $_POST['rating'];
    $reviewText = $_POST['review'];

    if(empty($_SESSION['email'])) {
        echo "<script> alert('Bạn cần đăng nhập hoặc đăng ký để đánh giá.');
        </script>";
    }

    // Validate data (you might want to add more validation)
    if (empty($rating)) {
        echo "<script> alert('Đánh giá không được để trống.');
        </script>";
    }

    $currentDateTime = date('Y-m-d H:i:s');

    // Insert the review into the database
    $insertReview = $connect->prepare("INSERT INTO reviews(productID, customerID, reviewRating, reviewText, reviewDate) 
                                       VALUES (?, ?, ?, ?, ?");
    $insertReview->bind_param("siis", $productID, $customerID, $rating, $reviewText, $currentDateTime);

    if ($insertReview->execute()) {
        echo "<script> alert('Review added successfully!');
        window.location.href='index.php';
        </script>";
    } else {
        echo "<script> alert('Error adding review: ' . $insertReview->error);
        window.location.href='index.php';
        </script>";
    }

    // Close the prepared statement
    $insertReview->close();
} else {
    // Redirect if the form is not submitted
    header("Location: product.php"); // Replace index.php with the actual path of your product detail page
}
?>