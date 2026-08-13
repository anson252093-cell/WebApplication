<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

/* session_start();
if(!isset($_SESSION["email"])) {
    header("Location: index.php");
    exit();
} */
if(isset($_GET["eventDate"])){
    $eventdate = $_GET["eventDate"];
}else{
    $sql = "SELECT eventDate FROM booking ORDER BY eventDate LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $eventdate = $row["eventDate"];
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        
        </style>
</head>

<body>

<h2>Booking Page</h2>

<a href="profile.php">Profile</a>
<a href="logout.php">
    <input type="button" value="Logout">
</a>

<hr>

<?php

if(isset($_GET["msg"])){

    if($_GET["msg"] == "success"){
        echo "<p>Booking Successful!</p>";
    }

    if($_GET["msg"] == "full"){
        echo "<p>This event is full!</p>";
    }

    if($_GET["msg"] == "already"){
        echo "<p>You have already booked this event.</p>";
    }

}
?>

<?php
$sql = "SELECT DISTINCT eventDate FROM booking ORDER BY eventDate";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo "<a href='booking.php?eventDate=".$row["eventDate"]."'>".$row["eventDate"]."</a> | ";
}
?>

<hr>

<?php

echo "<h3>$eventdate</h3>";

$sql = "SELECT * FROM booking WHERE eventDate='$eventdate'";
$result = $conn->query($sql);

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>";
echo "<th>Event Name</th>";
echo "<th>Slot</th>";
echo "<th>Book</th>";
echo "</tr>";

while($row = $result->fetch_assoc()){

    echo "<tr>";
    echo "<td>".$row["eventName"]."</td>";
    echo "<td>".$row["slot"]."/3</td>";

    echo "<td>";
    if($row["slot"] > 0){
        echo "<a href='book.php?BookingID=".$row["bookingID"]."'>Book</a>";
    }else{
        echo "Full";
    }
    echo "</td>";

    echo "</tr>";
}

echo "</table>";
       

?>
</body>
</html>
