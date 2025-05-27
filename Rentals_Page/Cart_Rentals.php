<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FlyHigh Airline - Car Rentals</title>
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
    <h2>Car Rental Booking</h2>
    <form class="flight-search-form" action="car_rental_booking.php" method="POST">

      <div class="form-group">
        <label for="pickup-location">Pickup Location:</label>
        <select id="pickup-location" name="pickup-location" required>
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
        <label for="pickup-date">Pickup Date:</label>
        <input type="datetime-local" id="pickup-date" name="pickup-date" required />
      </div>

      <div class="form-group">
        <label for="dropoff-location">Drop-off Location:</label>
        <select id="dropoff-location" name="dropoff-location" required>
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
        <label for="dropoff-date">Drop-off Date:</label>
        <input type="datetime-local" id="dropoff-date" name="dropoff-date" required />
      </div>

      <div class="form-group">
        <label for="car-type">Vehicle Type:</label>
        <select id="car-type" name="car-type" required>
          <?php
          $conn = new mysqli("localhost", "root", "", "FlyHigh");
          $result = $conn->query("SELECT car_type, available_count FROM CarInventory WHERE available_count > 0");
          while ($row = $result->fetch_assoc()):
          ?>
            <option value="<?= $row['car_type'] ?>">
              <?= ucfirst($row['car_type']) ?> (<?= $row['available_count'] ?> available)
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <button type="submit" class="search-button">Book Rental</button>
    </form>
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

    document.getElementById("customization-form").addEventListener("submit", function(e) {
        e.preventDefault();
        const targetPage = document.getElementById('target-page').value;
        alert("Settings for " + targetPage + " have been saved successfully!");
    });
</script>

  <footer>&copy; 2025 FlyHigh Airlines All rights reserved.</footer>
</body>
</html>
