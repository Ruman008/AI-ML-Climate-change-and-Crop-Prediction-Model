<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Example: Save user information to a file (not secure for production)
    $file = fopen("users.txt", "a");
    fwrite($file, "$username|$password\n");
    fclose($file);

    // Redirect to login page after successful registration
    header("Location: login.html");
    exit();
}
?>
