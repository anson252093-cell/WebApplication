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
$eventdate = "";

if(isset($_GET["eventDate"])){
    $eventdate = $_GET["eventDate"];
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<h2>Booking Page</h2>

<a href="profile.php">Profile</a>

<hr>

<a href="booking.php?eventDate=28/7">28/7</a> |
<a href="booking.php?eventDate=29/7">29/7</a> |
<a href="booking.php?eventDate=30/7">30/7</a>

<hr>

<?php

if($eventdate=="28/7"){

    echo "<h3>28/7</h3>";

    $sql = "SELECT * FROM booking WHERE eventDate='2026-07-28'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){

        echo $row["eventName"]." ";
        echo $row["slot"]."/3 ";

        if($row["slot"] > 0){
            echo "<a href='book.php?BookingID=".$row["bookingID"]."'>Book</a>";
        }else{
            echo "Full";
        }

        echo "<br><br>";
    }
}

if($eventdate=="29/7"){

    echo "<h3>29/7</h3>";

    $sql = "SELECT * FROM booking WHERE eventDate='2026-07-29'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){

        echo $row["eventName"]." ";
        echo $row["slot"]."/3 ";

        if($row["slot"] > 0){
            echo "<a href='book.php?BookingID=".$row["bookingID"]."'>Book</a>";
        }else{
            echo "Full";
        }

        echo "<br><br>";
    }
}

if($eventdate=="30/7"){

    echo "<h3>30/7</h3>";

    $sql = "SELECT * FROM booking WHERE eventDate='2026-07-30'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){

        echo $row["eventName"]." ";
        echo $row["slot"]."/3 ";

        if($row["slot"] > 0){
            echo "<a href='book.php?BookingID=".$row["bookingID"]."'>Book</a>";
        }else{
            echo "Full";
        }

        echo "<br><br>";
    }
}

?>
</body>
</html>
