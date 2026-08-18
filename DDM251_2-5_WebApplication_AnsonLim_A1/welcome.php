<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";

session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$query = "SELECT COUNT(*) AS totalOrder FROM `order`";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$totalOrder = $row['totalOrder'];


$query = "
    SELECT COUNT(*) AS unsoldProducts
    FROM product
    WHERE productID NOT IN (
        SELECT productID
        FROM `order`
    )
";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$unsoldProducts = $row['unsoldProducts'];

$query = "
    SELECT COUNT(*) AS noPurchase
    FROM customer
    WHERE customerID NOT IN (
        SELECT customerID
        FROM `order`)";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$noPurchase = $row['noPurchase'];


$query = "
    SELECT
        product.productName,
        SUM(`order`.quantity) AS totalSold
    FROM `order`
    INNER JOIN product
        ON `order`.productID = product.productID
    GROUP BY product.productID, product.productName
    ORDER BY totalSold DESC
    LIMIT 3";

$topProducts = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>

* {
    box-sizing: border-box;
}

.sidebar {
    display: flex;
    flex-direction: column;
    width: 200px;
    position: fixed;
    height: 100vh;
    background-color: #f0f0f0;
    padding: 20px;
}

.content {
    margin-left: 240px;
    padding: 20px;
}


.content {
    margin-left: 240px;
    padding: 35px;
}

.dashboard-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 25px;
}


.card {
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 25px;
    min-height: 150px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);

}


.card h2 {
    margin-top: 0;
    margin-bottom: 25px;
    font-size: 20px;
}

.card p {
    margin: 0;
    font-size: 18px;

}

.top-products {
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 25px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.top-products h2 {
    margin-top: 0;
    margin-bottom: 25px;
}

table {
    width: 100%;
    border-collapse: collapse;
}


table,
th,
td {
    border: 1px solid #999;
}


th {
    text-align: left;
    padding: 10px;
    background-color: #f5f5f5;
}


td {
    padding: 10px;
}
</style>
<body>
<div class="sidebar">

    <h4>AL SHOP</h4>

    <a href="welcome.php">
        Dashboard
    </a>
    <a href="customer.php">
        Customer
    </a>
    <a href="addCustomer.php">
        Create Customer
    </a>
    <a href="customer.php">
        Customer List
    </a>
    <a href="product.php">
        Product
    </a>
    <a href="order.php">
        Order
    </a>
    <a href="logout.php">
        Logout
    </a>

</div>

<div class="content">
    <h1>Welcome to AL_Shop</h1>
    <div class="dashboard-cards">
         <div class="card">

            <h2>
                Total Order
            </h2>

            <p>
                <?php echo $totalOrder; ?>
            </p>

        </div>


        <div class="card">
            <h2>
                Products Haven't Sell
            </h2>
            <p>
                <?php echo $unsoldProducts; ?>
            </p>
        </div>

        <div class="card">
            <h2>
                Customers Haven't Purchase
            </h2>
            <p>
                <?php echo $noPurchase; ?>
            </p>
        </div>
    </div>


    <div class="top-products">
        <h2>
            Top 3 Products
        </h2>
        <table>
            <tr>
                <th>
                    Product Name
                </th>
                <th>
                    Quantity Sold
                </th>
            </tr>

            <?php

            if (mysqli_num_rows($topProducts) > 0) {

                while ($row = mysqli_fetch_assoc($topProducts)) {

            ?>

            <tr>

                <td>
                    <?php echo $row['productName']; ?>
                </td>

                <td>
                    <?php echo $row['totalSold']; ?>
                </td>

            </tr>

            <?php

                }

            } else {

            ?>

            <tr>

                <td colspan="2">
                    No orders yet.
                </td>

            </tr>

            <?php

            }

            ?>

        </table>

    </div>


</div>


</body>

</html>


<?php

mysqli_close($conn);

?>