<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Find a Hotel</title>
  <link rel="stylesheet" href="main.css">
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

<section class="hotel-section">
  <h2>Find Your Hotel</h2>
 <form class="hotel-search-form" action="hotel_booking.php" method="POST">
  <div class="form-group">
    <label for="city">City:</label>
    <select id="city" name="city" required>
    <option value="">Select a city</option>
        <option value="New York">New York</option>
        <option value="Chicago">Chicago</option>
        <option value="Los Angeles">Los Angeles</option>
        <option value="Houston">Houston</option>
        <option value="Miami">Miami</option>
        <option value="Atlanta">Atlanta</option>
        <option value="Dallas">Dallas</option>
        <option value="San Francisco">San Francisco</option>
        <option value="Seattle">Seattle</option>
        <option value="Denver">Denver</option>
    </select>
  </div>

  <div class="form-group">
    <label for="checkin">Check-In Date:</label>
    <input type="date" id="checkin" name="checkin" required />
  </div>

  <div class="form-group">
    <label for="checkout">Check-Out Date:</label>
    <input type="date" id="checkout" name="checkout" required />
  </div>

  <div class="form-group">
    <label for="guests">Guests:</label>
    <select id="guests" name="guests" required>
      <option value="1">1 Guest</option>
      <option value="2">2 Guests</option>
      <option value="3">3 Guests</option>
      <option value="4">4 Guests</option>
    </select>
  </div>

  <div class="form-group">
    <button type="submit" class="search-button">Book Hotel</button>
  </div>
</form>


  <div class="available-hotels">
  <h3>Available Hotels</h3>
  <ul class="hotel-list">
    <?php
    $conn = new mysqli("localhost", "root", "", "FlyHigh");
    $result = $conn->query("SELECT hotel_name, city, checkin_date, checkout_date, price, available_rooms FROM HotelInventory WHERE available_rooms > 0 ORDER BY city");
    while ($hotel = $result->fetch_assoc()):
    ?>
      <li class="hotel-item">
        <strong><?= htmlspecialchars($hotel['hotel_name']) ?></strong> (<?= $hotel['city'] ?>)<br>
        Check-in: <?= $hotel['checkin_date'] ?> | Check-out: <?= $hotel['checkout_date'] ?><br>
        Price: $<?= number_format($hotel['price'], 2) ?> | Rooms Left: <?= $hotel['available_rooms'] ?>
      </li>
    <?php endwhile; $conn->close(); ?>
  </ul>
</div>

</section>

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

<script>
  document.getElementById("hotel-search-form").addEventListener("submit", function(e) {
    e.preventDefault();
    alert("Hotel search feature is under development.");
  });
</script>
<footer>
  &copy; 2025 FlyHigh Airlines. All Rights Reserved.
</footer>
</body>
</html>