<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anson";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Get department from URL
$department = "";

if (isset($_GET['department']) && $_GET['department'] != "") {
    $department = $_GET['department'];
    $query = "SELECT * FROM employee WHERE Department='$department'";
} else {
    $query = "SELECT * FROM employee";
}

// Run the query
$result = mysqli_query($conn, $query);

// Tell the browser to download a CSV file
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=employee.csv");

// Create the CSV file
$output = fopen("php://output", "w");

// Write the column titles
fputcsv($output, array("ID", "Name", "Department"));

// Write each row from the database
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, array(
        $row["ID"],
        $row["Name"],
        $row["Department"]
    ));
}

// Close the file
fclose($output);
exit();
?>