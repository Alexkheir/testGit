<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo "<table border='1'>";
        echo "<tr><th>{$_SESSION['username']}</th><th>Password</th></tr>";
        
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
        }
        
        echo "</table>";
        
    } else {
        header("Location: index.php"); // Redirect to login if not logged in
        exit();
    }
    ?>
</body>
</html>