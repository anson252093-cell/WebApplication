<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dairy";



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
       header("Location:home.php"); 
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
  <link rel="stylesheet" href="css/root.css">
  <link rel="stylesheet" href="css/login.css">
  <style>
   
  </style>
</head>
<body>
  <div class="phone">
    <div class="phone-screen">
        <div id="email">
           <div class="sticky-note">
        <div class="tape"></div>
        <h1>Dear me</h1>
        <p>Write it. Leave it. Feel lighter.</p>
    </div>
    <div class="login">
      <form target="_self" method="POST">
        <h2>Enter your Email</h2>
        <input type="text" name="email" placeholder="Enter Your Email"><br/>
        <br/>
        <h2>Password</h2>
        <input type="password" name="password" placeholder="Enter Your Password"><br/>
        
        <input type="submit" value="login">
        
      </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>