<?php 
include("../partials/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $categoryName = mysqli_real_escape_string($connect, $_POST["name"]);

    // Insert the new category into the database
    $query = "INSERT INTO categories(categoryName) VALUES ('$categoryName')";

    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Thêm danh mục thành công');
        window.location.href='showcategories.php';
        </script>";
    } else {
        echo "<script>alert('Lỗi xảy ra: ' . $query . '<br>' . mysqli_error($connect));
        window.location.href='showcategories.php';
        </script>";
    }
} else {
    echo "<script>alert('Yêu cầu không hợp lý');
    window.location.href='showcategories.php';
    </script>";
}


?>