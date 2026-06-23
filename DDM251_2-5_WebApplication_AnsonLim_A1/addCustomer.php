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

    <button><a class="link" href="customer.php">Back</a></button>
    <table>
        <tr>
            <th>customerID</th>
            <th>username</th>
            <th>firstName</th>
            <th>lastName</th>
            <th>email</th>
            <th>Gender</th>
        </tr>
        <tr>
            <form action="insertCustomer.php" method="POST">
                <td><input type="text" name="customerID"></td>
                <td><input type="text" name="username"></td>
                <td><input type="text" name="firstName"></td>
                <td><input type="text" name="lastName"></td>
                <td><input type="text" name="email"></td>
                <td><input type="text" name="gender"></td>
                <td><input type="submit" value="add"></td>
            </form>
        </tr>
    </table>
</div>
</body>

</html>