<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();


$isbn = $_POST["ISBN"];
$title = $_POST["Title"];
$author = $_POST["Author"];
$description = $_POST["Description"];
$price = $_POST["Price(RM)"];

$sql = "UPDATE booklist
        SET
        title='$title',
        author='$author',
        description='$description',
        price='$price'
        WHERE ISBN='$isbn'";

$conn->query($sql);





if ($conn->query($sql) === TRUE) {
   header("Location: booklist.php");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>