<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PeaKing Cinema - Portfolio</title>
  <link rel="stylesheet" href="assets/css/portfolio.css">
</head>
<body>

  <header>
    <div class="hamburger-menu" onclick="toggleSidebar()">&#9776;</div>
    <div class="logo">PeaKing Cinema 🍿</div>
    <a href="login.php"><button class="login-btn">Login</button></a>
  </header>

  <!-- Sidebar Navigation -->
  <div id="sidebar" class="sidebar">
    <nav>
      <a href="home.php">Home</a>
      <a href="portfolio.php">Portfolio</a>
      <a href="booking.php">Bookings</a>
      <a href="collection.php">Movie Collection</a>
      <a href="contact.php">Contact</a>
    </nav>
  </div>

  <section class="bio-section">
    <div class="bio-container">
        <!-- Person 1 -->
        <div class="bio-card">
            <h2>Biodata - Developer 1</h2>
            <p><strong>Name:</strong>Muhammad Faqih Hazim</p>
            <p><strong>Age:</strong>13</p>
            <p><strong>Location:</strong>KPPN, Seremban</p>
            <p><strong>Profession:</strong>Developer/Student</p>
            <h3>Education</h3>
            <ul>
                <li>Enrolled in DIP course.</li>
            </ul>
            <h3>Contact Information</h3>
            <p><strong>Email:</strong>entahtolongisi</p>
            <p><strong>Phone:</strong>entahtolongisi</p>
        </div>

        <!-- Person 2 -->
        <div class="bio-card">
            <h2>Biodata - Developer 2</h2>
            <p><strong>Name:</strong>Muhammad Asyraf</p>
            <p><strong>Age:</strong>13</p>
            <p><strong>Location:</strong>KPPN, Seremban</p>
            <p><strong>Profession:</strong>Developer/Student</p>
            <h3>Education</h3>
            <ul>
                <li>nrolled in DIP course.</li>
            </ul>
            <h3>Contact Information</h3>
            <p><strong>Email:</strong>asyraf.mf21@gmail.com</p>
            <p><strong>Phone:</strong>+60-1417 7953</p>
        </div>
    </div>
  </section>

  <footer>
    <p>&copy; <?php echo date('Y'); ?> PeaKing Cinema. All rights reserved.</p>
  </footer>

  <script src="assets/js/script.js"></script>
</body>
</html>
