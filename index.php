<?php
// Assuming you have a database connection setup
session_start();
include 'db_connection.php'; // Include your database connection

// Fetch user preferences from the database
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$favorite_genre = '';
if ($user_id) {
    $query = "SELECT * FROM user_preferences WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $favorite_genre = $row['favorite_genre']; // Get the favorite genre
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PeaKing Cinema</title>
  <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
  <header>
    <!-- Hamburger Menu Icon -->
    <div class="hamburger-menu">&#9776;</div>
    <div class="logo">PeaKing Cinema 🍿</div>
    <?php if (!isset($_SESSION['username'])): ?>
      <a href="login.php"><button class="login-btn">Login</button></a>
    <?php else: ?>
      <div class="user-info">
        <form action="logout.php" method="POST" style="display:inline;">
          <button type="submit" class="login-btn">Logout</button>
        </form>
      </div>
    <?php endif; ?>
  </header>

  <!-- Sidebar Navigation -->
  <div id="sidebar" class="sidebar">
    <nav>
      <a href="index.php">Home</a>
      <a href="portfolio.php">Portfolio</a>
      <a href="booking.php">Bookings</a>
      <a href="contact.php">Contact</a>
    </nav>
  </div>

  <main>
    <section class="featured-movie">
      <div class="movie-content">
        <img src="assets/img/pixel.jpg" alt="Pixels Movie Poster" class="movie-poster">
        <div class="movie-details">
          <h1>PIXELS</h1>
          <p class="tagline">#1 Recommended</p>
          <p class="description">
            When aliens misinterpret video feeds of classic arcade games as a declaration of war, they attack the Earth in the form of video games. The main protagonists, former World Champion Gamers, have to defend Earth from the video game monsters.
            </p>
          <div class="movie-info">
            <p><strong>Rating:</strong> M</p>
            <p><strong>Suitability:</strong> 95%</p>
            <p><strong>Genre:</strong> Sci-fi, Action, Comedy</p>
          </div>
          <button class="book-btn">Book Now</button>
        </div>
      </div>
    </section>

    <section class="movie-suggestions">
      <h2>For You</h2>
      <div class="movies">
        <!-- Dynamic Genre-based Suggestions -->
        <?php if ($favorite_genre): ?>
          <h3>Suggested for you based on your favorite genre: <?= htmlspecialchars($favorite_genre) ?></h3>
          <!-- Display movies of the same genre as user preference -->
          <img src="https://via.placeholder.com/800x1500/111/fff?text=<?= htmlspecialchars($favorite_genre) ?>+Movie+1" alt="<?= htmlspecialchars($favorite_genre) ?> Movie 1">
          <img src="https://via.placeholder.com/800x1500/111/fff?text=<?= htmlspecialchars($favorite_genre) ?>+Movie+2" alt="<?= htmlspecialchars($favorite_genre) ?> Movie 2">
          <img src="https://via.placeholder.com/800x1500/111/fff?text=<?= htmlspecialchars($favorite_genre) ?>+Movie+3" alt="<?= htmlspecialchars($favorite_genre) ?> Movie 3">
        <?php else: ?>
          <!-- Default suggestions if no genre preference is available -->
          <img src="https://via.placeholder.com/800x1500/111/fff?text=Action+Movie" alt="Action Movie">
          <img src="https://via.placeholder.com/800x1500/111/fff?text=Comedy+Movie" alt="Comedy Movie">
          <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie" alt="Sci-Fi Movie">
          <img src="https://via.placeholder.com/800x1500/111/fff?text=Drama+Movie" alt="Drama Movie">
        <?php endif; ?>
      </div>
    </section>

    <!-- New Genre Rows -->
    <section class="movie-genres">
      <h2>Action Movies</h2>
      <div class="movies">
        <img src="assets/img/action/batman.jpeg" alt="Action Movie 1">
        <img src="assets/img/action/civilwar.jpeg" alt="Action Movie 2">
        <img src="assets/img/action/fallguy.jpg" alt="Action Movie 3">
        <img src="assets/img/action/gladiator.jpeg" alt="Action Movie 1">
        <img src="assets/img/action/inception.jpeg" alt="Action Movie 2">
        <img src="assets/img/action/johnwick.jpeg" alt="Action Movie 3">
        <img src="assets/img/action/kingsman.jpeg" alt="Action Movie 1">
        <img src="assets/img/action/LOTR.jpeg" alt="Action Movie 2">
        <img src="assets/img/action/matrix.jpeg" alt="Action Movie 3">
        <img src="assets/img/action/rebelridge.jpeg" alt="Action Movie 1">
        <img src="assets/img/action/thedarkknight.jpeg" alt="Action Movie 2">
        <img src="assets/img/action/transformersone.jpeg" alt="Action Movie 3">
        <img src="assets/img/action/twisters.jpg" alt="Action Movie 1">
        <img src="assets/img/action/wonderwoman.jpg" alt="Action Movie 2">
      </div>
      
      <h2>Comedy Movies</h2>
      <div class="movies">
      <img src="assets/img/comedy/bean.jpeg" alt="Action Movie 1">
        <img src="assets/img/comedy/3idiots.jpeg" alt="Action Movie 2">
        <img src="assets/img/comedy/brothers.jpeg" alt="Action Movie 3">
        <img src="assets/img/comedy/dearsanta.jpeg" alt="Action Movie 1">
        <img src="assets/img/comedy/flymetothemoon.jpeg" alt="Action Movie 2">
        <img src="assets/img/comedy/freelance.jpeg" alt="Action Movie 3">
        <img src="assets/img/comedy/gamenight.jpg" alt="Action Movie 1">
        <img src="assets/img/comedy/jackpot.jpeg" alt="Action Movie 2">
        <img src="assets/img/comedy/myoldass.jpeg" alt="Action Movie 3">
        <img src="assets/img/comedy/operationfortune.jpeg" alt="Action Movie 1">
        <img src="assets/img/comedy/rcikystanicky.jpeg" alt="Action Movie 2">
        <img src="assets/img/comedy/thefamilyplan.jpeg" alt="Action Movie 3">
        <img src="assets/img/comedy/unfrosted.jpeg" alt="Action Movie 1">
        <img src="assets/img/comedy/sweethearts.jpeg" alt="Action Movie 1">
      </div>

      <h2>Sci-Fi Movies</h2>
      <div class="movies">
        <img src="assets/img/sci-fi/arrival.jpeg" alt="Action Movie 1">
        <img src="assets/img/sci-fi/attaca.jpeg" alt="Action Movie 2">
        <img src="assets/img/sci-fi/bladerunner.jpeg" alt="Action Movie 3">
        <img src="assets/img/sci-fi/contact.jpeg" alt="Action Movie 1">
        <img src="assets/img/sci-fi/et.jpeg" alt="Action Movie 2">
        <img src="assets/img/sci-fi/exmachina.jpeg" alt="Action Movie 3">
        <img src="assets/img/sci-fi/jurassic.jpeg" alt="Action Movie 1">
        <img src="assets/img/sci-fi/pacificrim.jpeg" alt="Action Movie 2">
        <img src="assets/img/sci-fi/platform.jpeg" alt="Action Movie 3">
        <img src="assets/img/sci-fi/playerone.jpg" alt="Action Movie 1">
        <img src="assets/img/sci-fi/primer.jpeg" alt="Action Movie 2">
        <img src="assets/img/sci-fi/spaceodyssey.jpeg" alt="Action Movie 3">
        <img src="assets/img/sci-fi/terminator.jpeg" alt="Action Movie 1">
        <img src="assets/img/sci-fi/warofworlds.jpeg" alt="Action Movie 1">
      </div>

      <h2>Adventure Movies</h2>
      <div class="movies">
        <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie+1" alt="Adventure Movie 1">
        <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie+2" alt="Adventure Movie 2">
        <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie+3" alt="Adventure Movie 3">
      </div>

      <h2>Horror Movies</h2>
      <div class="movies">
        <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie+1" alt="Horror Movie 1">
        <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie+2" alt="Horror Movie 2">
        <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie+3" alt="Horror Movie 3">
      </div>

      <h2>Documentary Movies</h2>
      <div class="movies">
        <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie+1" alt="Documentary Movie 1">
        <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie+2" alt="Documentary Movie 2">
        <img src="https://via.placeholder.com/800x1500/111/fff?text=Sci-Fi+Movie+3" alt="Documentary Movie 3">
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; <?php echo date('Y'); ?> PeaKing Cinema. All rights reserved.</p>
  </footer>

  <script src="assets/js/script.js"></script>
</body>
</html>
