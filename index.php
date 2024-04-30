<?php   

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testgit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, do something like redirecting to a welcome page
        $_SESSION['username'] = $username; // Store username in session
        header("Location: home.php");
        exit();
        
        // Display user information in a table
        echo "<table border='1'>";
        echo "<tr><th>Username</th><th>Password</th></tr>";
        
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
        }
        
        echo "</table>";
    } else {
        // User does not exist, display a message or take appropriate action
        echo "User does not exist.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Submit">
    </form>


    <table>
        
    </table>
</body>
</html>