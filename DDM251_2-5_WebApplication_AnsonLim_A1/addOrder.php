<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";

$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>
</head>
<body>

<h2>Add Order</h2>

<form action="insertOrder.php" method="post">

    Customer :
    <select name="customerID" required>
        <option value="">-- Select Customer --</option>

        <?php
        $customer = mysqli_query($conn,"SELECT * FROM customer");

        while($row = mysqli_fetch_assoc($customer))
        {
        ?>
            <option value="<?php echo $row['customerID']; ?>">
                <?php echo $row['username']; ?>
            </option>
        <?php
        }
        ?>

    </select>

    <br><br>

    Product :
    <select name="productID" required>
        <option value="">-- Select Product --</option>

        <?php
        $product = mysqli_query($conn,"SELECT * FROM product");

        while($row = mysqli_fetch_assoc($product))
        {
        ?>
            <option value="<?php echo $row['productID']; ?>">
                <?php echo $row['productName']; ?>
            </option>
        <?php
        }
        ?>

    </select>

    <br><br>

    Quantity :
    <input type="number" name="quantity" min="1" required>

    <br><br>

    Order Date :
    <input type="date" name="orderDate" required>

    <br><br>

    <input type="submit" value="Add Order">

</form>

</body>
</html>