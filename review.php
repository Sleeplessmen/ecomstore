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
    // Get data from the form
    $productID = $_POST['productID']; // You should include this input field in your form
    $customerUsername = $_SESSION['customer_username']; // You should include this input field in your form
   
    // Fetch customerID based on customerUsername
    $fetchCustomerId = $connect->prepare("SELECT customerID FROM customers WHERE customerUsername = ?");
    $fetchCustomerId->bind_param("s", $customerUsername);
    $fetchCustomerId->execute();
    $fetchCustomerId->store_result();

    if ($fetchCustomerId->num_rows > 0) {
        $fetchCustomerId->bind_result($customerID);
        $fetchCustomerId->fetch();

        $rating = $_POST['rating'];
        $reviewText = $_POST['review'];

        // Validate data (you might want to add more validation)
        if (empty($rating)) {
            echo "<script> alert('Đánh giá không được để trống.');
            window.location.href='details.php?detail_id=$productID';
            </script>";
        }

        // Insert the review into the database
        $insertReview = $connect->prepare("INSERT INTO reviews (productID, customerID, reviewRating, reviewText, reviewDate)
                                           VALUES (?, ?, ?, ?, NOW())");
        $insertReview->bind_param("siis", $productID, $customerID, $rating, $reviewText);

        if ($insertReview->execute()) {
            echo "<script> alert('Thêm đánh giá thành công');
            window.location.href='details.php?detail_id=$productID';
            </script>";
        } else {
            echo "<script> alert('Lỗi xảy ra khi thêm đánh giá: ' . $insertReview->error);
            window.location.href='details.php?detail_id=$productID';
            </script>";
        }

        // Close the prepared statement
        $insertReview->close();
    } else {
        echo "<script> alert('Không tìm thấy thông tin khách hàng');
        window.location.href='details.php?detail_id=$productID';
        </script>";
    }

    $fetchCustomerId->close();

} else {
    header("Location: index.php"); // Replace index.php with the actual path of your product detail page
}
?>