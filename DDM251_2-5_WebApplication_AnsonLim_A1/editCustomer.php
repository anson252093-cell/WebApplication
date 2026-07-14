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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customerlist</title>
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
    <button><a class="link" href="customer.php">Back</a></button>
    <table>
        <tr>
            <th>Customer ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Password</th>
            <th>Confirm Password</th>
        </tr>
        <tr>
            <form action="runCustomerlist.php" method="POST" required>
                <td><input type="text" name="customerID" required></td>
                <td><input type="text" name="username" required></td>
                <td><input type="text" name="firstName" required></td>
                <td><input type="text" name="lastName" required></td>
                <td><input type="email" name="email" required></td>
                <td><input type="text" name="gender" required></td>
                <td><input type="password" name="password" minlength="6" required></td>
                <td><input type="password" name="confirmPassword" required minlength="6"></td>

                <td>
                    <input type="submit" value="Submit">
                </td>

            </form>
        </tr>
    </table>

</body>

</html>



