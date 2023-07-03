<!DOCTYPE html>
<html>
<head>
    <title>Reviews | Book Review Hub</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Reviews</h1>
    </header>

    <?php
        session_start();
        require 'config.php';

        // Function to check if the user is logged in
        function isLoggedIn() {
            return isset($_SESSION['username']);
        }
    ?>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="reviews.php">Reviews</a></li>
            <li><a href="submit.php">Submit a Review</a></li>
            <?php if (isLoggedIn()): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <main>
        <h2>All reviews:</h2>
        
        <form method="GET" action="search_reviews.php" class="search-form">
            <div class="search-input">
                <input type="text" id="search-book-title" name="search-book-title" placeholder="Search by Book Title">
            </div>
            <div class="search-input">
                <input type="text" id="search-author" name="search-author" placeholder="Search by Author">
            </div>
            <div class="search-input">
                <input type="text" id="search-genre" name="search-genre" placeholder="Search by Genre">
            </div>
            <div class="search-button">
                <button type="submit">Search</button>
            </div>
        </form>

        <div>
            <?php 
                $sql = "SELECT * FROM reviews ORDER BY rating DESC, date_posted DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        echo "<p>" . $row['review'] . "</p>";
                        echo "<div class='rating'>";
                        for ($i = 1; $i <= 5; $i++) {
                            if (isLoggedIn()) {
                                // Display interactive rating mechanism
                                echo "<span class='rate-review' data-review-id='" . $row['id'] . "' data-rating='" . $i . "'>&#9734;</span>";
                            } else {
                                // Display static rating stars
                                if ($i <= $row['rating']) {
                                    echo "<span>&#9733;</span>";
                                } else {
                                    echo "<span>&#9734;</span>";
                                }
                            }
                        }
                        echo "</div>";
                        echo "<small>Posted on " . $row['date_posted'] . "</small>";
                        echo "</div>";
                    }
                } else {
                    echo "No reviews found.";
                }

                $conn->close();
            ?>
        </div>
    </main>

    <footer>
        <p>© 2023 Book Review Hub</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle rating submission
            $(".rate-review").click(function() {
                var reviewId = $(this).data("review-id");
                var rating = $(this).data("rating");

                $.ajax({
                    url: "rate_review.php",
                    type: "POST",
                    data: { reviewId: reviewId, rating: rating },
                    success: function(response) {
                        // we need to update the display of the review with the new rating
                        // 2 ways we can implement this based on your specific requirements
                        // For example, update the rating dynamically without refreshing the page
                        // or wecan reload the page to display the updated ratings.
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
