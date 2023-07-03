<!DOCTYPE html>
<html>
<head>
    <title>Book Review Hub</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to Book Review Hub!</h1>
    </header>

    <?php include 'navbar.php'; ?>

    <main>
        <section>
            <h2>Featured Reviews</h2>
            <?php include 'fetch_featured_reviews.php'; ?>
        </section>
        <section>
            <h2>Latest Reviews</h2>
            <?php include 'fetch_latest_reviews.php'; ?>
        </section>
    </main>

    <footer>
        <p>© 2023 Book Review Hub</p>
    </footer>
</body>
</html>
