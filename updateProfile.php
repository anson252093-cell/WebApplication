<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();

$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

$name = $_POST["name"];
$yearjoin = $_POST["yearjoin"];
$email = $_SESSION["email"];

/* if (empty($_POST["password"]) || empty($_POST["confirmPassword"]) || empty($_POST["name"]) || empty($_POST["yearjoin"])) {
    
  $empty = "No empty field allowed";
  header("Location: editProfile.php?empty=$empty");
} else if ($_POST["yearjoin"] > date("Y")) {


$yeae */
    

if($password !== $confirmPassword){
   die(header("Location: editProfile.php?error=Password does not match"));
   exit();
}

/* if ($_POST["yearjoin"] > date("Y")) {
    exit("Year joined cannot be greater than the current year.");
} */


$sql = "UPDATE student
SET
password='$password',
name='$name',
yearjoin='$yearjoin'
WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
   header("Location: profile.php");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>