<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$productID = $_POST['productID'];
$productName = $_POST['productName'];
$description = $_POST['description'];
$price = $_POST['price'];


$sql = "INSERT INTO product (productID, productName, description, price)
VALUES ('$productID', '$productName', '$description', '$price')";

if ($conn->query($sql) === TRUE) {
    header("Location: product.php");
}

$conn->close();