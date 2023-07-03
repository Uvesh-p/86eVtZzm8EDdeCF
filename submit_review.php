<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'config.php';

        $book_title = $conn->real_escape_string($_POST['book-title']);
        $review = $conn->real_escape_string($_POST['book-review']);
        $rating = $_POST['rating'];

        // Validate the rating input (e.g., check for a numeric value between 1 and 5)
        if (!is_numeric($rating) || $rating < 1 || $rating > 5) {
            echo "Invalid rating value. Please enter a number between 1 and 5.";
            exit;
        }

        $sql = "INSERT INTO reviews (title, review, rating) VALUES ('$book_title', '$review', '$rating')";

        if ($conn->query($sql) === TRUE) {
            echo "Review submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
