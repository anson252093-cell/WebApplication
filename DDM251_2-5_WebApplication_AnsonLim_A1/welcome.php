<?php
$servername = "localhost";
$username = "al_shop";
$password = "alshop123";
$dbname = "al_shop";



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
    .sidebar{display: flex;
        flex-direction: column;
        width: 200px;
        height: 100vh;
        background-color: #f0f0f0;
        padding: 20px;
    }
</style>
<body>
    <div class="sidebar">
    <h4>AL SHOP</h4>

    <a href="dashboard.php">Dashboard</a>
    <a href="customer.php">Customer</a>
    <a href="#">Create Customer</a>
    <a href="#">Customer List</a>
    <a href="#">Product</a>
    <a href="#">Order</a>
    <a href="#">Logout</a>
</div>
</body>
</html>