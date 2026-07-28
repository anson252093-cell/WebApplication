<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

/* session_start();
if(!isset($_SESSION["email"])) {
    header("Location: index.php");
    exit();
} */
?> 

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
   
        <?php

      
$department = "";

if (isset($_GET['department']) && $_GET['department'] != "") {
    $department = $_GET['department'];
    $query = "SELECT * FROM employee WHERE Department='$department'";
} else {
    $query = "SELECT * FROM employee";
}

$result = mysqli_query($conn, $query);
?>
       
    


<form method="GET">
    <label>Department:</label>

   <select name="department" onchange="this.form.submit()">
    <option value="" <?php echo (!isset($_GET['department']) || $_GET['department'] == "") ? "selected" : ""; ?>>All</option>
    <option value="HR" <?php echo (isset($_GET['department']) && $_GET['department'] == "HR") ? "selected" : ""; ?>>HR</option>
    <option value="IT" <?php echo (isset($_GET['department']) && $_GET['department'] == "IT") ? "selected" : ""; ?>>IT</option>
    <option value="Finance" <?php echo (isset($_GET['department']) && $_GET['department'] == "Finance") ? "selected" : ""; ?>>Finance</option>
    
</select>
    <input type="submit" value="Filter">
    <a href="export.php?department=<?php echo urlencode($department); ?>">
    <button type="button">Download CSV</button>
</a>
</form>


<br>

<table width="1100">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
    </tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['Name'] ?></td>
        <td><?php echo $row['Department'] ?></td>
    </tr>
<?php
}

?>
</body>
</html>