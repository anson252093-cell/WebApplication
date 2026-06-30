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
    <table width="1100">
        <tr>
             <th>ISBN</th>
            <th width="300">Title</th>
            <th width="200">Author</th>
            <th>Description</th>
            <th>Price(RM)</th>
        </tr>
         <form action="updateBooklist.php" method="POST">
                <td><input type="text" value="<?php echo $_POST['ISBN']; ?>" readonly></td>
                <td><input type="text" name="Title"></td>
                <td><input type="text" name="Author"></td>
                <td><input type="text" name="Description"></td>
                <td><input type="text" name="Price(RM)"></td>
                <td><input type="submit" value="submit"></td>
                </form>
        </tr>

            
        </tr>
        <a href="booklist.php"><input type="submit" value="booklist"></a>        
</body>
</html>

