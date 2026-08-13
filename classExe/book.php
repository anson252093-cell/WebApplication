<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";

$conn = new mysqli($servername, $username, $password, $dbname);

$bookingID = $_GET["BookingID"];
$customerID = $_SESSION["customerID"];

// Check if customer already booked this event
$sql = "SELECT * FROM bookinghistory
        WHERE customerID='$customerID'
        AND bookingID='$bookingID'";

$result = $conn->query($sql);

if($result->num_rows > 0){

    header("Location: booking.php?&msg=already");
    exit();

}else{

    // Get event information
    $sql = "SELECT * FROM booking WHERE bookingID='$bookingID'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($row["slot"] > 0){

        // Reduce available slot
        $sql = "UPDATE booking
                SET slot = slot - 1
                WHERE bookingID='$bookingID'";
        $conn->query($sql);

        // Save booking record
        $sql = "INSERT INTO bookinghistory(customerID, bookingID)
                VALUES('$customerID', '$bookingID')";
        $conn->query($sql);

        header("Location: booking.php?msg=success");
        exit();
    }else{

        header("Location: booking.php?&msg=full");
        exit();
    }
}
?>