<?php
    require 'config.php';

    $featuredSql = "SELECT * FROM reviews WHERE rating >= 4 ORDER BY rating DESC, date_posted DESC LIMIT 3";
    $featuredResult = $conn->query($featuredSql);

    if ($featuredResult->num_rows > 0) {
        while($row = $featuredResult->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['review'] . "</p>";
            echo "<p>Rating: " . $row['rating'] . "</p>";
            echo "<small>Posted on " . $row['date_posted'] . "</small>";
            echo "</div>";
        }
    } else {
        echo "<p>No featured reviews found.</p>";
    }

    $conn->close();
?>
