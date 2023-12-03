<?php 
include("../partials/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $name = mysqli_real_escape_string($connect, $_POST["name"]);
    $price = mysqli_real_escape_string($connect, $_POST["price"]);
    $description = mysqli_real_escape_string($connect, $_POST["description"]);
    $quantity = mysqli_real_escape_string($connect, $_POST["quantity"]);
    $category = mysqli_real_escape_string($connect, $_POST["category"]);
    
    // File upload handling
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES['file']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "file không phải là ảnh";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Xin lỗi, file của bạn quá lớn";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Xin lỗi, chỉ JPG, JPEG, PNG & GIF file được cho phép";
        $uploadOk = 0;
    }

     // Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
        echo "Xin lỗi, file của bạn không thể tải lên";
    } else {
        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // File upload success, proceed with database insertion
            $query = "INSERT INTO products(productName, productPrice, productDescription, productQuantity, productPicture, categoryID) VALUES ('$name','$price','$description','$quantity','$targetFile','$category')";

            if (mysqli_query($connect, $query)) {
                echo"Thêm sản phẩm thành công!";
                header("Location: showproducts.php");
            } else {
                echo "Lỗi xảy ra: " . $query . "<br>" . mysqli_error($connect);
            }
        } else {
            echo "Lỗi xảy ra khi chuyển file ảnh về thư mục uploads";
        }
    }

} else {
    echo "Yêu cầu không đúng.";
}


?>