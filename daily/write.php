<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dairy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

session_start();

// Check if user is logged in
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION["email"];

// Default values
$selectedColor = "#FFE89A";
$selectedEmoji = "😊";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $message = $_POST["message"];
    $color = $_POST["color"];
    $emoji = $_POST["emoji"];

    // Find the logged-in user's ID
    $sql = "SELECT userID FROM user WHERE email='$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $userID = $row["userID"];

        // Save note
        $sql = "INSERT INTO notes (userID, message, color, emoji, created_at)
                VALUES ('$userID', '$message', '$color', '$emoji', NOW())";

        if ($conn->query($sql) === TRUE) {

            header("Location: home.php");
            exit();

        } else {

            echo "Error: " . $conn->error;

        }

    } else {

        echo "User not found.";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Write</title>

    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/write.css">

</head>

<body>

<div class="phone">

    <div class="phone-screen">

        <div class="write-page">

        <div class="header">

            <h1>Write Your Thought</h1>

            <p class="subtitle">
                write out your deeper feeling.
            </p>
</div>

            <!-- Mood -->
<div class="mood-table">
            <h2>Today's Mood</h2>

           <div class="mood-options">

    <label class="mood">
        <input type="radio" name="emoji" value="😊" checked>
        <span>😊</span>
        <small>Happy</small>
    </label>

    <label class="mood">
        <input type="radio" name="emoji" value="😐">
        <span>😐</span>
        <small>Calm</small>
    </label>

    <label class="mood">
        <input type="radio" name="emoji" value="😢">
        <span>😢</span>
        <small>Sad</small>
    </label>

    <label class="mood">
        <input type="radio" name="emoji" value="😡">
        <span>😡</span>
        <small>Angry</small>
    </label>

</div>
</div>

<div class="color-table">
            <!-- Colour -->
             <h2>Select ur Color</h2>
<div class="color-options">
   

    <label class="color-option happy">
        <input type="radio" name="color">
        Happy
    </label>

    <label class="color-option worried">
        <input type="radio" name="color">
        Worried
    </label>

    <label class="color-option stress">
        <input type="radio" name="color">
        Stress
    </label>

    <label class="color-option gratitude">
        <input type="radio" name="color">
        Gratitude
    </label>
</div>

</div>


            <!-- Hidden values sent to PHP -->

            <form method="POST">

                <input type="hidden"
                       name="color"
                       id="selectedColor"
                       value="#FFE89A">

                <input type="hidden"
                       name="emoji"
                       id="selectedEmoji"
                       value="😊">


                <!-- Message -->

                <h2>Write It Down</h2>

                <textarea 
    name="message" 
    class="message" 
    maxlength="200" 
    placeholder="What happened today? Tell me..." 
    required></textarea>

<button type="submit" class="submit-btn">
    Submit
</button>

            </form>

        </div>

    </div>

</div>
</div>


<script>

function chooseColor(color, button) {

    document.querySelector("#selectedColor").value = color;

    document.querySelectorAll(".color-option").forEach(function(item) {
        item.classList.remove("selected");
    });

    button.classList.add("selected");
}


function chooseEmoji(emoji, button) {

    document.querySelector("#selectedEmoji").value = emoji;

    document.querySelectorAll(".mood").forEach(function(item) {
        item.classList.remove("selected");
    });

    button.classList.add("selected");
}

</script>

</body>

</html>