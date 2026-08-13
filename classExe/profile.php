<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";
session_start();
$conn = new mysqli($servername,$username,$password,$dbname);



if (!isset($_SESSION["customerID"])) {
    die("Customer not logged in.");
}

$customerID = $_SESSION["customerID"];

$sql = "SELECT * FROM customer WHERE customerID='$customerID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        border-collapse: collapse;
    }

    table,
    th,
    td{
        border: 1px solid black;
        }
</style>
<body>
    

<a href="booking.php">← Back to Booking Page</a>
<h2>Profile</h2>

<table width="500">
    <tr>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Year Join</th>
    </tr>

    <tr>
        <td><?php echo $row["customerID"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["yearJoin"]; ?></td>
    </tr>
</table>

<h3>Booked Events</h3>

<table width="500">
    <tr>
        <th>No.</th>
        <th>Event Name</th>
        <th>Event Date</th>
    </tr>

    <?php
    $sql = "SELECT booking.eventName, booking.eventDate
            FROM bookinghistory, booking
            WHERE bookinghistory.bookingID = booking.bookingID
            AND bookinghistory.customerID='$customerID'";

    $result = $conn->query($sql);

    $count = 1;

    while($row = $result->fetch_assoc()){
    ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $row["eventName"]; ?></td>
        <td><?php echo $row["eventDate"]; ?></td>
    </tr>
    <?php
        $count++;
    }
    ?>
</table>
</body>
</html>
