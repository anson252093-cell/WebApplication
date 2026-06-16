<?php
$servername = "localhost";
$username = "anson";
$password = "ALZK0705";
$dbname = "anson";

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

        $query= "SELECT * FROM student";

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['yearjoin'] ?></td>
            <td><input type ="button" value="Edit"></td>
        </tr>
        <?php
        }
        mysqli_close($conn);

        ?>
        <a href="booklist.php"><input type="submit" value="Back"></a>
</body>
</html>