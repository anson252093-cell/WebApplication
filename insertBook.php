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

if (empty($ISBN) || empty($title) || empty($author) || empty($description) || empty($price)) {
    die(header("Location: addBook.php?error=No empty field allowed"));
    exit();


$empty = "No empty field allowed";
header("Location: addBook.php?empty=$empty");
}else if (!is_numeric($_POST["price"])) {
    die(header("Location: addBook.php?error=Price must be a number"));
    exit();
} else if(strlen($_POST["ISBN"]) != 13) {
    die(header("Location: addBook.php?error=ISBN must be 13 digits"));
    exit();
} else if(!is_numeric($_POST["ISBN"])) {
    die(header("Location: addBook.php?error=ISBN must be a number"));
    exit();
}

if (mysqli_query($conn, $sql)) {
    header("Location: booklist.php");
}
?>
