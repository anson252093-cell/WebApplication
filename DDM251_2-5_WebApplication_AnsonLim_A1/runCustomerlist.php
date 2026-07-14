<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";

session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$customerID = $_POST['customerID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Check password match
if ($password != $confirmPassword) {
    header("Location: editCustomer.php?error=Confirm Password must match Password");
    exit();
}

// Check password length
if (strlen($password) < 6) {
    header("Location: editCustomer.php?error=Password must be at least 6 characters");
    exit();
}

// SQL to update a record
$sql = "UPDATE customer SET firstName = '$firstName', lastName = '$lastName', email = '$email', gender = '$gender', password = '$password' WHERE customerID = $customerID";

if (mysqli_query($conn, $sql)) {
    header("Location: customer.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);


