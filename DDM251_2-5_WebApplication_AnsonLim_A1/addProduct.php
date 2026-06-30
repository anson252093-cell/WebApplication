<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
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
</head>

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

    <button><a class="link" href="product.php">Back</a></button>
    <table>
        <tr>
            <th>productID</th>
            <th>productName</th>
            <th>description</th>
            <th>price</th>
            
        </tr>
        <tr>
            <form action="insertProduct.php" method="POST">
                <td><input type="text" name="productID"></td>
                <td><input type="text" name="productName"></td>
                <td><input type="text" name="description"></td>
                <td><input type="text" name="price"></td>
                <td><input type="submit" value="add"></td>
            </form>
        </tr>
    </table>
</div>
</body>

</html>