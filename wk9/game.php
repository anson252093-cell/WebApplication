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

if (!isset($_SESSION['uid'])) {
    die("UID not found");
}

$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
</head>

<body>

    <p>Your UID: <?php echo $uid; ?></p>

    <button>
        <a href="game1.php">Game1</a>
    </button>

    <button>
        <a href="game2.php">Game2</a>
    </button>

    <button>
        <a href="game3.php">Game3</a>
    </button>

</body>

</html>