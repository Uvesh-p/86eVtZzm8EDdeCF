<?php
    require 'config.php';

    // Get the search parameters from the query string
    $bookTitle = $_GET['search-book-title'] ?? '';
    $author = $_GET['search-author'] ?? '';
    $genre = $_GET['search-genre'] ?? '';

    // Build the SQL query based on the search parameters
    $sql = "SELECT * FROM reviews WHERE title LIKE '%$bookTitle%' AND author LIKE '%$author%' AND genre LIKE '%$genre%' ORDER BY date_posted DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['review'] . "</p>";
            echo "<p>Rating: " . $row['rating'] . "</p>";
            echo "<small>Posted on " . $row['date_posted'] . "</small>";
            echo "</div>";
        }
    } else {
        echo "No reviews found.";
    }

    $conn->close();
?>
