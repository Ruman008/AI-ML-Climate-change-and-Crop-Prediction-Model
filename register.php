<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate login credentials (Example: hardcoded values)
    if ($username === "admin" && $password === "password") {
        // Authentication successful, redirect to dashboard or home page
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        // Authentication failed, redirect back to login page with error message
        header("Location: login.html?error=1");
        exit();
    }
}
?>
