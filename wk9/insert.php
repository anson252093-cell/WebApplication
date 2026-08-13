<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uid";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Generate UID
    date_default_timezone_set('Asia/Kuala_Lumpur');

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $code = '';

    for ($i = 0; $i < 6; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    $uid = date('YmdHis') . "_" . $code;


    // Save into database
    $sql = "INSERT INTO guest (uid, name, email, age)
            VALUES ('$uid', '$name', '$email', '$age')";


    if (mysqli_query($conn, $sql)) {

        // Remember this person's UID
        $_SESSION['uid'] = $uid;

        // Go to game page
        header("Location: game.php");
        exit();
    } else {

        $message = "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Form</title>
</head>

<body>

    <h2>User Information</h2>

    <form method="POST">

        <p>Name</p>
        <input type="text" name="name" required>

        <p>Email</p>
        <input type="email" name="email" required>

        <p>Age</p>
        <input type="number" name="age" required>

        <br><br>

        <input type="submit" value="Save">

    </form>

    <p><?php echo $message; ?></p>

</body>

</html>