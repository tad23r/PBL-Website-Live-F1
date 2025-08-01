

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking - PeaKing Cinema</title>
  <link rel="stylesheet" href="assets/css/booking.css">
</head>
<body>

  <!-- Header -->
  <header>
    <div class="hamburger-menu">&#9776;</div>
    <div class="logo">PeaKing Cinema 🍿</div>
    <a href="login.php"><button class="login-btn">Login</button></a>
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

  <!-- Booking Section -->
  <div class="booking-container">
    <!-- Seating Section -->
    <div class="booking-left">
      <h2>Select Your Seats</h2>
      <div class="seating">
        <!-- Front Rows -->
        <?php for ($row = 1; $row <= 8; $row++): ?>
          <div class="row">
            <?php for ($seat = 1; $seat <= 10; $seat++): ?>
              <div class="seat"><?php echo $row . '-' . $seat; ?></div>
            <?php endfor; ?>
          </div>
        <?php endfor; ?>

        <!-- Family Seats (Back Row) -->
        <div class="row">
          <?php for ($seat = 1; $seat <= 4; $seat++): ?>
            <div class="seat family"><?php echo 'Fam ' . $seat; ?></div>
          <?php endfor; ?>
        </div>
      </div>
    </div>

    <!-- Movie Description Section -->
    <div class="booking-right">
      <h2>Show Details</h2>
      <div class="movie-info">
        <p><strong>Movie:</strong> PIXELS</p>
        <p><strong>Genre:</strong> Sci-fi, Action, Comedy</p>
        <p><strong>Rating:</strong> M</p>
        <p><strong>Duration:</strong> 1h 46m</p>
        <p><strong>Time:</strong> 6:00 PM</p>
        <p><strong>Price:</strong> $15.00</p>
        <button class="book-btn">Book Now</button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; <?php echo date('Y'); ?> PeaKing Cinema. All rights reserved.</p>
  </footer>

  <script src="assets/js/script.js"></script>
</body>
</html>
