<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$customerID = $_POST['customerID'];
$username = $_POST['username'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$sql = "INSERT INTO customer (customerID, username, firstName, lastName, email, gender)
VALUES ('$customerID', '$username', '$firstName', '$lastName', '$email', '$gender')";

if ($conn->query($sql) === TRUE) {
    header("Location: customer.php");
}

$conn->close();