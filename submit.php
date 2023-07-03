<?php
    session_start();

    // Check if user is not logged in
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Review Hub - Submit a Review</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Book Review Hub</h1>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <h2>Submit a Review:</h2>
        <form action="submit_review.php" method="post">
            <label for="book-title">Book Title:</label>
            <input type="text" id="book-title" name="book-title" required>
            <label for="book-review">Your Review:</label>
            <textarea id="book-review" name="book-review" required></textarea>
            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
            <input type="submit" value="Submit Review">
        </form>
    </main>
    <footer>
        <p>© 2023 Book Review Hub</p>
    </footer>
</body>
</html>
