<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uid";

$conn = mysqli_connect("localhost","root","","uid");

$score = $_POST["score"];

$sql = "INSERT INTO game(game1)
VALUES('$score')";

if(mysqli_query($conn,$sql))
{
    echo "Saved";
}
else
{
    echo mysqli_error($conn);
}

mysqli_close($conn);

?>