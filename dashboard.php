<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script>
        setTimeout(function() {
            window.location.href = "index.php"; // Redirect to homepage after 5 seconds
        }, 10000); // 5000 milliseconds = 5 seconds
    </script>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <p>Logged in as: <?php echo $_SESSION['username']; ?></p>
    <p>This is a protected page.</p>
    <a href="logout.php">Logout</a>
    <p>You will be redirected to the homepage in 5 seconds.</p>
    <p>Alternatively, you can click on the links below:</p>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="submit.php">Submit a Review</a></li>
    </ul>
</body>
</html>
