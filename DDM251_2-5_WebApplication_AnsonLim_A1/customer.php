<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";
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

        .sidebar{display: flex;
        flex-direction: column;
        width: 200px;
        position:fixed;
        height: 100vh;
        background-color: #f0f0f0;
        padding: 20px;
    }
    .content{
    margin-left: 240px; /* 200px sidebar + 40px spacing */
    padding: 20px;
}
</style>
<body>

<div class="sidebar">
    <h4>AL SHOP</h4>

    <a href="welcome.php">Dashboard</a>
    <a href="customer.php">Customer</a>
    <a href="#">Create Customer</a>
    <a href="#">Customer List</a>
    <a href="#">Product</a>
    <a href="#">Order</a>
    <a href="#">Logout</a>
</div>

<div class="content">

    <a href="addCustomer.php">
        <input type="button" value="Add Customer">
    </a>

    <table width="1100">
        <tr>
            <th>customerID</th>
            <th>username</th>
            <th>firstName</th>
            <th>lastName</th>
            <th>email</th>
            <th>gender</th>
        </tr>

        <?php
        $query = "SELECT * FROM customer";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['customerID']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['firstName']; ?></td>
            <td><?php echo $row['lastName']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><a href="editCustomer.php"><button>Edit</button></a></td>
            <td><button>Delete</button></td>
        </tr>
        <?php
        }
        mysqli_close($conn);
        ?>
    </table>

</div>

</body>
