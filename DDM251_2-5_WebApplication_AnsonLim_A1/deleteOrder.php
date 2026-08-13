<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$orderID = $_GET['orderID'];

$sql = "DELETE FROM `order` WHERE orderID = '$orderID'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>