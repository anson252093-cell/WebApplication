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

$ISBN = $_POST["ISBN"];
$title = $_POST["title"];
$author = $_POST["author"];
$description = $_POST["description"];
$price = $_POST["price"];

$sql = "INSERT INTO booklist (ISBN, title, author, description, price) 
VALUES ('".$_POST["ISBN"]."', '".$_POST["title"]."', '".$_POST["author"]."', '".$_POST["description"]."', '".$_POST["price"]."')";


if (mysqli_query($conn, $sql));{
    header("Location: booklist.php");
}
?>