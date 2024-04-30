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
        echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
    } else {
        header("Location: index.php"); // Redirect to login if not logged in
        exit();
    }
    ?>
</body>
</html>