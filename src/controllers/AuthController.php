<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $error_message = "Username and password are required.";
    } else {
        if ($username === "admin" && $password === "admin123") {
            header("Location: ../views/adminBooks.html");
            exit();
        } else {
            $error_message = "Invalid username or password.";
            echo $error_message;
        }
    }
}
