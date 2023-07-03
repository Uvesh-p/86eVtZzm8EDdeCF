<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="submit.php">Submit a Review</a></li>
        <?php if (isset($_SESSION['username'])): ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>