<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_shop";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET["error"])) {
    echo "<p style='color:red'>" . $_GET["error"] . "</p>";
}
$productID = $_GET['productID'];

$query = "SELECT * FROM product WHERE productID='$productID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product list</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <button><a class="link" href="product.php">Back</a></button>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <tr>
            <form action="runProductlist.php" method="POST" required>
                <td><input type="text" name="productID" value="<?php echo $row['productID']; ?>"
       readonly></td>
                <td><input type="text" name="productName" value="<?php echo $row['productName']; ?>"
       required></td>
                <td><input type="text" name="description" value="<?php echo $row['description']; ?>" required></td>
                <td><input type="number" name="price" step="1" value="<?php echo $row['price']; ?>" required></td>

                <td>
                    <input type="submit" value="Submit">
                </td>

            </form>
        </tr>
    </table>