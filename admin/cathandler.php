<?php 
include("../partials/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $categoryName = mysqli_real_escape_string($connect, $_POST["name"]);

    // Insert the new category into the database
    $query = "INSERT INTO categories(categoryName) VALUES ('$categoryName')";

    if (mysqli_query($connect, $query)) {
        echo "Category added successfully!";
        header("Location: showproducts.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
} else {
    echo "Invalid request.";
}


?>