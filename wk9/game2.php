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

$message = "";

if (isset($_POST['game2'])) {

    $game2 = $_POST['game2'];

    $sql = "UPDATE guest
            SET `game2` = '$game2'
            WHERE uid = '$uid'";

    if (mysqli_query($conn, $sql)) {

        $message = "Game 2 saved successfully!";
        header("Location: game.php");
    } else {

        $message = "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Game 2</title>
</head>

<body>

    <h2>Game 2</h2>

    <form method="POST">

        <button type="submit" name="game2" value="0">0</button>
        <button type="submit" name="game2" value="1">1</button>
        <button type="submit" name="game2" value="2">2</button>
        <button type="submit" name="game2" value="3">3</button>
        <button type="submit" name="game2" value="4">4</button>
        <button type="submit" name="game2" value="5">5</button>

    </form>

    <p><?php echo $message; ?></p>

</body>

</html>