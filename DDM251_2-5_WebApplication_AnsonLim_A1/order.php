<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    <a href="product.php">Product</a>
    <a href="order.php">Order</a>
    <a href="logout.php">Logout</a>
</div>
<div class="content">

    <a href="addOrder.php">
        <input type="button" value="Add Order">
    </a>

    <table width="1100">
        <tr>
    <th>Order ID</th>
    <th>Username</th>
    <th>Product Name</th>
    <th>Quantity</th>
    <th>Order Date</th>
    <th>Action</th>
</tr>

         <?php
       $query = "SELECT
            `order`.orderID,
            customer.username,
            product.productName,
            `order`.quantity,
            `order`.orderDate
          FROM `order`
          INNER JOIN customer
          ON `order`.customerID = customer.customerID
          INNER JOIN product
          ON `order`.productID = product.productID";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['orderID']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['productName']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['orderDate']; ?></td>
        
            <td><a href="editOrder.php?orderID=<?php echo $row['orderID']; ?>"><button>Edit</button></a></td>
            <td>
    <button onclick="myFunction('<?php echo $row['orderID']; ?>')">
        Delete
    </button>
</td>
        </tr>
        <?php
        }
        mysqli_close($conn);
        ?>
    </table>

</div>
<script>
           function myFunction(orderID) {
            let text = "Are you sure you want to delete this " + orderID + "?";
            if (confirm(text) == true) {
                window.location.href = "deleteOrder.php?orderID=" + orderID;
            }
           }
        </script>      
</body>
</html>