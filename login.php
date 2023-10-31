<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $userData = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($userData as $line) {
        list($username, $savedEmail, $savedPassword) = explode("|", $line);
        
        if ($savedEmail === $email && password_verify($password, $savedPassword)) {
            // User is authenticated
            session_start();
            $_SESSION["username"] = $username;
            echo "Login successful!";
            header("Location: dashboard.php");
            exit();
        }
    }

    echo "Invalid email or password. Please try again.";
}
?>
