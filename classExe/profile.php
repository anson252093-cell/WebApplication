<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";

$conn = new mysqli($servername,$username,$password,$dbname);



$customerID = $_POST["customerID"];

$sql = "SELECT * FROM customer WHERE customerID='$customerID'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

echo "<h2>Profile</h2>";

echo "customerID : ".$user["customerID"];
echo "<br>";

echo "Name : ".$user["customerName"];

echo "<hr>";

echo "<h3>Booked Events</h3>";

$sql = "SELECT * FROM booking
        WHERE customerID='$customerID'";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

    echo "Date : ".$row["eventDate"];
    echo "<br>";

    echo "Event : ".$row["eventName"];

    echo "<hr>";
}
session_start();

echo $_SESSION["customerID"];
?>