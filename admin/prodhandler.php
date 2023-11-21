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
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

     // Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // File upload success, proceed with database insertion
            $query = "INSERT INTO products(productName, productPrice, productDescription, productQuantity, productPicture, categoryID) VALUES ('$name','$price','$description','$quantity','$targetFile','$category')";

            if (mysqli_query($connect, $query)) {
                echo"Product added successfully!";
                header("Location: products.php");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($connect);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

} else {
    echo "Invalid request.";
}


?>