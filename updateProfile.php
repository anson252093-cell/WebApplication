<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();

$password = $_POST["password"];
$confrimPassword = $_POST["confrimPassword"];

$name = $_POST["name"];
$yearjoin = $_POST["yearjoin"];
$email = $_SESSION["email"];

$sql = "UPDATE student
SET
password='$password',
name='$name',
yearjoin='$yearjoin'
WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
   header("Location: profile.php");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>