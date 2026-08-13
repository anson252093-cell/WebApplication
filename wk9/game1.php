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

if (isset($_POST['game1'])) {

    $game1 = $_POST['game1'];

    // 先读取目前已经选了几次
    $check = "SELECT game1_count FROM guest WHERE uid='$uid'";
    $result = mysqli_query($conn, $check);
    $row = mysqli_fetch_assoc($result);

    if ($row['game1_count'] >= 2) {

        $message = "You have reached the maximum of 2 selections.";

    } else {

        $sql = "UPDATE guest
                SET game1='$game1',
                    game1_count = game1_count + 1
                WHERE uid='$uid'";

        if (mysqli_query($conn, $sql)) {
            $message = "Game 1 saved successfully!";
            header("Location: game.php");
            exit();
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
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