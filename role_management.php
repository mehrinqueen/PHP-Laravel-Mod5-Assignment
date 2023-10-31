<?php
session_start();
if (empty($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}

// Check if the user is an admin. In a real system, you would validate roles from a database.
if ($_SESSION["username"] !== "admin") {
    echo "You do not have permission to access this page.";
    exit();
}

// Handle role management actions (create, edit, delete)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] === "create") {
        // Handle role creation
        $newRole = $_POST["newRole"];
        // Perform role creation logic
        // You might want to store roles in a database in a real system
        echo "Role created: $newRole";
    } elseif (isset($_POST["action"]) && $_POST["action"] === "edit") {
        // Handle role editing
        $editRole = $_POST["editRole"];
        // Perform role editing logic
        // You might want to update roles in a database in a real system
        echo "Role edited: $editRole";
    } elseif (isset($_POST["action"]) && $_POST["action"] === "delete") {
        // Handle role deletion
        $deleteRole = $_POST["deleteRole"];
        // Perform role deletion logic
        // You might want to delete roles from a database in a real system
        echo "Role deleted: $deleteRole";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Role Management</title>
</head>
<body>
    <h2>Role Management</h2>

    <!-- Create Role Form -->
    <form action="role_management.php" method="post">
        <input type="text" name="newRole" placeholder="Enter new role name" required>
        <input type="hidden" name="action" value="create">
        <input type="submit" value="Create Role">
    </form>

    <!-- Edit Role Form -->
    <form action="role_management.php" method="post">
        <input type="text" name="editRole" placeholder="Enter role name to edit" required>
        <input type="hidden" name="action" value="edit">
        <input type="submit" value="Edit Role">
    </form>

    <!-- Delete Role Form -->
    <form action="role_management.php" method="post">
        <input type="text" name="deleteRole" placeholder="Enter role name to delete" required>
        <input type="hidden" name="action" value="delete">
        <input type="submit" value="Delete Role">
    </form>

    <a href="dashboard.php">Back to Dashboard</a>
    <a href="logout.php">Logout</a>
</body>
</html>
