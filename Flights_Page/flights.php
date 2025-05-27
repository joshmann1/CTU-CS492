<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FlyHigh Airline - Flights</title>
  <link rel="stylesheet" href="main.css" />
</head>
<body>
<header>
  <h1>FlyHigh Airline</h1>
  <nav>
    <ul>
      <li><a href="Main.html">Home</a></li>
      <li><a href="flights.php">Flights</a></li>
      <li><a href="Hotels.php">Hotels</a></li>
      <li><a href="Cart_Rentals.php">Car Rentals</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="Cart.php">Cart</a></li>
    </ul>
  </nav>
</header>

<section class="flights-section">
  <h2>Book a Flight</h2>

  <!-- Flight booking form -->
  <form class="flight-search-form" action="flight_booking.php" method="POST">
    <div class="form-group">
      <label for="departure">Departure:</label>
      <input type="text" id="departure" name="departure" value="FlyHigh HQ" readonly />
    </div>

    <div class="form-group">
      <label for="arrival">Arrival:</label>
      <select id="arrival" name="arrival" required>
        <option value="">Select a city</option>
        <?php
        $conn = new mysqli("localhost", "root", "", "FlyHigh");
        $result = $conn->query("SELECT DISTINCT destination FROM FlightInventory WHERE available_seats > 0");
        while ($row = $result->fetch_assoc()):
        ?>
          <option value="<?= $row['destination'] ?>"><?= $row['destination'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="depart-date">Depart Date:</label>
      <input type="date" id="depart-date" name="depart-date" required />
    </div>

    <div class="form-group">
      <label for="return-date">Return Date:</label>
      <input type="date" id="return-date" name="return-date" required />
    </div>

    <div class="form-group">
      <label for="passengers">Passengers:</label>
      <select id="passengers" name="passengers" required>
        <option value="1">1 Passenger</option>
        <option value="2">2 Passengers</option>
        <option value="3">3 Passengers</option>
        <option value="4">4 Passengers</option>
      </select>
    </div>

    <button type="submit" class="search-button">Book Flight</button>
  </form>
</section>

<!-- Live Flights List from Database -->
<section class="flights-section">
  <h3>Available Flights</h3>
  <ul class="flight-list">
    <?php
    $result = $conn->query("SELECT destination, depart_date, return_date, price, available_seats FROM FlightInventory ORDER BY depart_date ASC");
    while ($flight = $result->fetch_assoc()):
    ?>
      <li class="flight-item">
        <strong><?= htmlspecialchars($flight['destination']) ?></strong><br>
        Depart: <?= $flight['depart_date'] ?> | Return: <?= $flight['return_date'] ?><br>
        Price: $<?= number_format($flight['price'], 2) ?> | Seats Left: <?= $flight['available_seats'] ?>
      </li>
    <?php endwhile; ?>
    <?php $conn->close(); ?>
  </ul>
</section>

<footer>&copy; 2025 FlyHigh Airlines. All Rights Reserved.</footer>

<button class="login-btn" onclick="loginPrompt()">Login</button>
<script>
function loginPrompt() {
  const username = prompt("Enter username:");
  const password = prompt("Enter password:");
  if (username === 'admin' && password === 'admin') {
    window.location.href = "Admin.html";
  } else {
    alert("Invalid credentials!");
  }
}
</script>
</body>
</html>
