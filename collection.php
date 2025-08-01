<?php
session_start();
require 'db.php'; // Database connection

// Fetch popular movies (you can modify the logic to get movies based on your criteria)
$popular_query = "SELECT * FROM movies WHERE is_popular = 1 LIMIT 10";
$popular_result = $conn->query($popular_query);

// Fetch movies by genre
$genres_query = "SELECT DISTINCT genre FROM movies";
$genres_result = $conn->query($genres_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Collection - PeaKing Cinema</title>
    <link rel="stylesheet" href="assets/css/collection.css">
</head>
<body>
<header>
    <!-- Hamburger Menu Icon -->
    <div class="hamburger-menu" aria-label="Toggle Sidebar">&#9776;</div>
    <div class="logo">PeaKing Cinema 🍿</div>
    <a href="login.php">
        <button class="login-btn">Login</button>
    </a>
</header>

<!-- Sidebar Navigation -->
<div id="sidebar" class="sidebar">
    <nav>
        <a href="index.php">Home</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="booking.php">Bookings</a>
        <a href="collection.php">Movie Collection</a>
        <a href="contact.php">Contact</a>
    </nav>
</div>

<!-- Movie Collection Section -->
<section class="movie-collection-section">
    <h1>Movie Collection</h1>
    
    <!-- Popular Movies Section -->
    <div class="popular-movies">
        <h2>Popular Movies</h2>
        <div class="movie-row">
            <?php while($movie = $popular_result->fetch_assoc()) { ?>
                <div class="movie-card">
                    <img src="<?php echo htmlspecialchars($movie['image']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                    <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Movie Genres Section -->
    <?php while ($genre = $genres_result->fetch_assoc()) { 
        $genre_name = $genre['genre'];
        $movies_in_genre = $conn->prepare("SELECT * FROM movies WHERE genre = ? LIMIT 10");
        $movies_in_genre->bind_param("s", $genre_name);
        $movies_in_genre->execute();
        $genre_movies = $movies_in_genre->get_result();
    ?>
        <div class="movie-genre">
            <h2><?php echo ucfirst(htmlspecialchars($genre_name)); ?> Movies</h2>
            <div class="movie-row">
                <?php while($movie = $genre_movies->fetch_assoc()) { ?>
                    <div class="movie-card">
                        <img src="<?php echo htmlspecialchars($movie['image']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                        <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</section>

<footer>
    <p>&copy; <?php echo date('Y'); ?> PeaKing Cinema. All rights reserved.</p>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>
