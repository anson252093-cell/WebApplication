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
if (isset($_POST['game3'])) {

    // Check how many times this user already played
    if ($row['game3_click'] < 2) {

        $game3 = $_POST['game3'];

        $sql = "UPDATE guest
                SET game3 = '$game3',
                    game3_click = game3_click + 1
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

        <button type="submit" name="game3" value="0">0</button>
        <button type="submit" name="game3" value="1">1</button>
        <button type="submit" name="game3" value="2">2</button>
        <button type="submit" name="game3" value="3">3</button>
        <button type="submit" name="game3" value="4">4</button>
        <button type="submit" name="game3" value="5">5</button>

    </form>

    <p><?php echo $message; ?></p>

</body>

</html>