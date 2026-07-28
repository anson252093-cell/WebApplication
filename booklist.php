<?php
$servername = "localhost";
$username = "ansonn";
$password = "ALZK0705";
$dbname = "anson";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

/* session_start();
if(!isset($_SESSION["email"])) {
    header("Location: index.php");
    exit();
} */
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
            <th>ISBN</th>
            <th width="300">Title</th>
            <th width="200">Author</th>
            <th>Description</th>
            <th>Price(RM)</th>
        </tr>
        <?php

        $query= "SELECT * FROM booklist";

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['ISBN']?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['author'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><form action="editBooklist.php" method="post">
                        <input type="hidden" name="ISBN" value="<?php echo $row['ISBN']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
            <td><button id="dltBtn" onclick="myFunction(<?php echo $row['ISBN']; ?>)">Delete</button></td>
        </tr>
        <?php
        }
        mysqli_close($conn);

        ?>
        <a href="profile.php"><input type="submit" value="Profile"></a>
        <a href="addBook.php"><input type="submit" value="AddBook"></a>
        <a href="logout.php"><input type="submit" value="Logout"></a>   
        <script>
           function myFunction(ISBN) {
            let text = "Are you sure you want to delete this " + ISBN + "?";
            if (confirm(text) == true) {
                window.location.href = "deleteBooklist.php?ISBN=" + ISBN;
            }
           }
        </script>          
</body>
</html>