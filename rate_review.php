<?php
    session_start();
    require 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if user is logged in
        if (!isset($_SESSION['username'])) {
            echo "You must be logged in to rate a review.";
            exit;
        }

        $reviewId = $_POST['reviewId'];
        $rating = $_POST['rating'];

        // Update the review in the database with the new rating
        $sql = "UPDATE reviews SET rating = '$rating' WHERE id = '$reviewId'";
        if ($conn->query($sql) === TRUE) {
            echo "Review rated successfully!";
        } else {
            echo "Error updating review: " . $conn->error;
        }

        $conn->close();
    }
?>
