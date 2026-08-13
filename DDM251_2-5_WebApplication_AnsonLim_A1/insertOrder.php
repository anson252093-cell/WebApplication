<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

$customerID = $_POST['customerID'];
$productID = $_POST['productID'];
$quantity = $_POST['quantity'];
$orderDate = $_POST['orderDate'];

$query = "INSERT INTO `order` (customerID, productID, quantity, orderDate)
VALUES ('$customerID', '$productID', '$quantity', '$orderDate')";

if (mysqli_query($conn, $query)) {
    echo "<script>
            alert('Order added successfully!');
            window.location.href='order.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>