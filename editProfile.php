
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     table{
        border-collapse: collapse;
    }

    table,
    th,
    td{
        border: 1px solid black;
        }
    </style>
<body>

    <table width="500">
        <tr>
            <th>Password</th>
            <th>Confirm Password</th>
            <th>Name</th>
            <th>YearJoin</th>
        </tr>
  <tr>
            <form action="updateProfile.php" method="POST">
                <td><input type="password" name="password" required minlength="6"></td>
                <td><input type="password" name="confirmPassword" required minlength="6"></td>
                <td><input type="text" name="name" required></td>
                <td><input type="number"  name="yearjoin" required></td>
                <td><input type="submit" value="submit"></td>
                </form>
        </tr>





        <a href="profile.php"><input type="submit" value="Back"></a>
        <a href=""><input type="submit" value="Logout"></a>
        
<?php
if(isset($_GET['error'])) {
    echo $_GET['error'];
}
?>


</body>
</html>
