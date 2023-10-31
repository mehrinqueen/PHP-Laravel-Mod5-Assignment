<?php
session_start();
if (empty($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION["username"]; ?></h2>
    <a href="role_management.php">Manage roles</a> <br>
    <a href="logout.php">Logout</a>
    
</body>
</html>
