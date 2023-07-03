<?php
    require 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate the inputs (e.g., check for empty fields, password strength)
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === true) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
