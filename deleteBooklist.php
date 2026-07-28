<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$ISBN = $_GET['ISBN'];
// SQL to delete a record
$sql = "DELETE FROM booklist WHERE ISBN=" . $ISBN;

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>