<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";

session_start();

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

// SQL to update a record
$sql = "UPDATE product
        SET productName = '$productName',
            description = '$description',
            price = '$price'
        WHERE productID = '$productID'";

if (mysqli_query($conn, $sql)) {
    header("Location: product.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);


