<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL to update a record

$sql = "UPDATE student SET name = '".$_POST['name']."', password = '".$_POST['password']."', yearjoin = '".$_POST['yearjoin']."'
        WHERE email = '".$_SESSION['email']."'";

if ($password != $confrimPassword) {
    echo "Passwords do not match!";
    exit();
}
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>