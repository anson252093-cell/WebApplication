<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$orderID = $_POST['orderID'];
$customerID = $_POST['customerID'];
$productID = $_POST['productID'];
$quantity = $_POST['quantity'];
$orderDate = $_POST['orderDate'];

$query = "UPDATE `order`
          SET customerID='$customerID',
              productID='$productID',
              quantity='$quantity',
              orderDate='$orderDate'
          WHERE orderID='$orderID'";

if (mysqli_query($conn, $query)) {
    echo "<script>
            alert('Order updated successfully!');
            window.location.href='order.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>