<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if(isset($_POST['email']) && isset($_POST['password'])) {
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);
//echo mean print out
//echo $_GET['password']; need to put ? in link behind
//echo $_POST['password'];
    if ($result->num_rows > 0) {
      $_SESSION["email"] = $_POST["email"];
       header("Location:booklist.php"); 
       echo "Login Successful!";
    } else {
        echo "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    * {
      font-size: 20px;
    }

    body {display: flex; 
          justify-content: center; 
          align-items: center; 
          height: 100vh;
        }
  </style>
</head>
<body>
  <div id="email">
    <form target="_self" method="POST">
      <h2>Enter your Email</h2>
      <input type="text" name="email">
      <br/>
      <h2>Password</h2>
      <input type="password" name="password">
      <input type="submit">
    </form>
  </div>
</body>
</html>