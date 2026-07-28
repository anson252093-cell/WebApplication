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
    <a href="logout.php">Logout</a>
</div>
<div class="content">

    <a href="addProduct.php">
        <input type="button" value="Add Product">
    </a>

    <table width="1100">
        <tr>
            <th>productID</th>
            <th>productName</th>
            <th>Description</th>
            <th>price</th>
        </tr>

         <?php
        $query = "SELECT * FROM product";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['productID']; ?></td>
            <td><?php echo $row['productName']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><a href="editProduct.php?productID=<?php echo $row['productID']; ?>"><button>Edit</button></a></td>
            <td>
    <button onclick="myFunction('<?php echo $row['productID']; ?>')">
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
           function myFunction(productID) {
            let text = "Are you sure you want to delete this " + productID + "?";
            if (confirm(text) == true) {
                window.location.href = "deleteProduct.php?productID=" + productID;
            }
           }
        </script>      
</body>
</html>