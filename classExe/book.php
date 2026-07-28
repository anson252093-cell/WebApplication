<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";

$conn = new mysqli($servername, $username, $password, $dbname);

$bookingId = $_GET["BookingID"];

// Get current session count
$sql = "SELECT * FROM booking WHERE bookingID='$bookingId'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($row["session"] < 3){

    $sql = "UPDATE booking
            SET session = session + 1
            WHERE bookingID='$bookingId'";

    $conn->query($sql);

    echo "Booked Successfully.<br><br>";

}else{

    echo "You can't book. Event is full.<br><br>";
}

echo "<a href='booking.php?eventDate=".$row["eventDate"]."'>Back</a>";

?>