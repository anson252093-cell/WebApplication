<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dairy";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="phone">
        <div class="phone-screen">

            <div class="open-btn menu-btn" id="bento_menu" onclick="openNav()"><img src="images/menu.png" alt="bento_menu" width="20px">
            </div>
<div id="sidebar" class="sidebar">
    
    <div class="close-btn menu-btn" onclick="closeNav()"><img src="images/xx.png" alt="Close" width="20px"></a></div>

    <a href="profile.php">Profile
        
    </a>

    <a href="logout.php">Logout
      
    </a>
</div>

<div id="main" onclick="closeNav()">
    
</div>
        <div class="sticky-note">
        <div class="tape"></div>
        <h1>Welcome Back,</h1>
        <p>Write it. Leave it. Feel lighter.</p>
    </div>
    <a href="write.php" class="fab">
    <img src="images/edit1.png" alt="Edit" width="20px">
    
    </a>
    </div>
</div>

<script>
function openNav(){ 
    document.querySelector(".sidebar").classList.add("active");
    document.querySelector("#main").classList.add("active");
} 
 
function closeNav(){ 
    document.querySelector(".sidebar").classList.remove("active");
    document.querySelector("#main").classList.remove("active");
}
</script>
</body>
</html>