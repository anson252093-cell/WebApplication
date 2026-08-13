<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$orderID = $_GET['orderID'];

$query = "SELECT * FROM `order` WHERE orderID='$orderID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
</head>
<body>

<h2>Edit Order</h2>

<form action="updateOrder.php" method="post">

    <input type="hidden" name="orderID" value="<?php echo $row['orderID']; ?>">

    Customer:
    <select name="customerID">
        <?php
        $customer = mysqli_query($conn, "SELECT * FROM customer");

        while ($c = mysqli_fetch_assoc($customer)) {
        ?>
            <option value="<?php echo $c['customerID']; ?>"
                <?php if ($c['customerID'] == $row['customerID']) echo "selected"; ?>>
                <?php echo $c['username']; ?>
            </option>
        <?php
        }
        ?>
    </select>

    <br><br>

    Product:
    <select name="productID">
        <?php
        $product = mysqli_query($conn, "SELECT * FROM product");

        while ($p = mysqli_fetch_assoc($product)) {
        ?>
            <option value="<?php echo $p['productID']; ?>"
                <?php if ($p['productID'] == $row['productID']) echo "selected"; ?>>
                <?php echo $p['productName']; ?>
            </option>
        <?php
        }
        ?>
    </select>

    <br><br>

    Quantity:
    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>">

    <br><br>

    Order Date:
    <input type="date" name="orderDate" value="<?php echo $row['orderDate']; ?>">

    <br><br>

    <input type="submit" value="Update Order">

</form>

</body>
</html>