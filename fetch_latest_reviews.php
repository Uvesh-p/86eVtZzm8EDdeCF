<?php
    require 'config.php';

    $latestSql = "SELECT * FROM reviews ORDER BY date_posted DESC";
    $latestResult = $conn->query($latestSql);

    if ($latestResult->num_rows > 0) {
        while($row = $latestResult->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['review'] . "</p>";
            echo "<p>Rating: " . $row['rating'] . "</p>";
            echo "<small>Posted on " . $row['date_posted'] . "</small>";
            echo "</div>";
        }
    } else {
        echo "<p>No reviews found.</p>";
    }

    $conn->close();
?>
