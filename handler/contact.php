<?php 
include("../partials/connect.php");

$email = $_POST['email']; 
$msg = $_POST['msg'];

$sql = "INSERT INTO contacts(contactEmail, contactMsg) VALUES('$email', '$msg')";

$connect->query($sql);

?>