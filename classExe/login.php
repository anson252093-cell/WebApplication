<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
//if(isset($_POST['email']) && isset($_POST['password'])) {
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "" || $password == "") {

        $error =  "Please enter username and password";
    } else {

        $sql = "SELECT * FROM customer WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {

            $error = "Username not found";
        } else {

            $row = $result->fetch_assoc();
           

            if ($row['password'] != $password) {

                $error = "Wrong password";
            } else {

               $_SESSION['email'] = $row['email'];
$_SESSION['customerID'] = $row['customerID'];
$_SESSION['name'] = $row['name'];
$_SESSION['yearJoin'] = $row['yearJoin'];

header("Location: booking.php");
exit();
            }
        }
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
    .login_container {
        display: flex;
        flex-direction: column;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    }
     .login_header {
         text-align: center;
        margin-bottom: 20px;
        padding: 20px;
        background-color: #945bff;
        color: white;
    }
    input[type="submit"] {
        padding: 10px;
        background-color: #945bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
    }

  </style>
</head>
<body>
    <div class="login_container">
        <?php if ($error != "") { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
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
    </div>
</body>
</html>