<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $userData = "$username|$email|$password" . PHP_EOL;

    if (file_put_contents("users.txt", $userData, FILE_APPEND | LOCK_EX) !== false) {
        echo "Registration successful!";
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>
