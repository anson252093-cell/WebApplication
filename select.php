<?php
$servername = "localhost";
$username = "anson";
$password = "ALZK0705";
$dbname = "anson";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student";
// Execute the SQL query
$result = $conn->query($sql);

// Process the result set
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["name"] . $row["email"] . $row["yearjoin"];
  }
} else {
  echo "0 results";
}

$conn->close();
?>