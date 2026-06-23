<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
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
    <table width="1100">
        <tr>
            <th>name</th>
            <th>email</th>
            <th>yearjoin</th>
        </tr>
        <?php

        $query= "SELECT * FROM student WHERE email='".$_SESSION["email"]."'";

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <form action="insertBook.php" method="POST">
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['yearjoin'] ?></td>
            <td><a href="editProfile.php"><input type ="button" value="Edit"></a></td>
        </tr>
        <?php
        }
        mysqli_close($conn);

        ?>
        <a href="booklist.php"><input type="submit" value="Back"></a>
</body>
</html>