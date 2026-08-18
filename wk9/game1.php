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

// Find this user's information
$result = mysqli_query($conn, "SELECT * FROM guest WHERE uid = '$uid'");

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

$message = "";

// Game 1 button pressed
if (isset($_POST['game1'])) {

    // Check how many times this user already played
    if ($row['game1_click'] < 2) {

        $game1 = $_POST['game1'];

        $sql = "UPDATE guest
                SET game1 = '$game1',
                    game1_click = game1_click + 1
                WHERE uid = '$uid'";

        if (mysqli_query($conn, $sql)) {

            header("Location: game.php");
            exit();

        } else {

            $message = "Error: " . mysqli_error($conn);
        }

    } else {

        $message = "You can only click 2 times!";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Game 1</title>
</head>

<body>

    <h2>Game 1</h2>

    <form method="POST">

        <button type="submit" name="game1" value="0">0</button>
        <button type="submit" name="game1" value="1">1</button>
        <button type="submit" name="game1" value="2">2</button>
        <button type="submit" name="game1" value="3">3</button>
        <button type="submit" name="game1" value="4">4</button>
        <button type="submit" name="game1" value="5">5</button>

    </form>

    <p><?php echo $message; ?></p>

</body>

</html>