<?php
session_start();

// Clear cart if requested
if (isset($_POST['clear'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

$cart = $_SESSION['cart'] ?? [];
$total = 0;
if (isset($cart['car'])) $total += $cart['car']['price'];
if (isset($cart['flight'])) $total += $cart['flight']['price'];
if (isset($cart['hotel'])) $total += $cart['hotel']['price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Your Cart - FlyHigh Airline</title>
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
    <h2>Your Cart</h2>

    <?php if (isset($cart['car'])): ?>
      <div class="cart-item">
        <h3>Car Rental Details</h3>
        <p><strong>Car Type:</strong> <?= htmlspecialchars($cart['car']['car_type']) ?></p>
        <p><strong>Pickup:</strong> <?= htmlspecialchars($cart['car']['pickup']) ?> on <?= $cart['car']['pickup_date'] ?></p>
        <p><strong>Drop-off:</strong> <?= htmlspecialchars($cart['car']['dropoff']) ?> on <?= $cart['car']['dropoff_date'] ?></p>
        <p><strong>Total:</strong> $<?= number_format($cart['car']['price'], 2) ?></p>
      </div>
    <?php endif; ?>

    <?php if (isset($cart['flight'])): ?>
      <div class="cart-item">
        <h3>Flight Details</h3>
        <p><strong>From:</strong> <?= htmlspecialchars($cart['flight']['from']) ?></p>
        <p><strong>To:</strong> <?= htmlspecialchars($cart['flight']['to']) ?></p>
        <p><strong>Departure:</strong> <?= $cart['flight']['depart_date'] ?></p>
        <p><strong>Return:</strong> <?= $cart['flight']['return_date'] ?></p>
        <p><strong>Seats:</strong> <?= intval($cart['flight']['seats']) ?></p>
        <p><strong>Total:</strong> $<?= number_format($cart['flight']['price'], 2) ?></p>
      </div>
    <?php endif; ?>

    <?php if (empty($cart)): ?>
      <p>No booking found.</p>
    <?php endif; ?>

    <?php if (isset($cart['hotel'])): ?>
  <div class="cart-item">
    <h3>Hotel Details</h3>
    <p><strong>Hotel:</strong> <?= htmlspecialchars($cart['hotel']['name']) ?> (<?= $cart['hotel']['city'] ?>)</p>
    <p><strong>Check-In:</strong> <?= $cart['hotel']['checkin'] ?> | <strong>Check-Out:</strong> <?= $cart['hotel']['checkout'] ?></p>
    <p><strong>Guests:</strong> <?= $cart['hotel']['guests'] ?></p>
    <p><strong>Total:</strong> $<?= number_format($cart['hotel']['price'], 2) ?></p>
  </div>
<?php endif; ?>

    <div class="cart-total">
      <h3>Total Amount:</h3>
      <p><strong>$<?= number_format($total, 2) ?></strong></p>

      <form method="POST">
        <button type="submit" name="clear" class="search-button" style="background-color:red;">Clear Cart</button>
      </form>

      <button class="search-button">Proceed to Payment</button>
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

    document.getElementById("customization-form").addEventListener("submit", function(e) {
        e.preventDefault();
        const targetPage = document.getElementById('target-page').value;
        alert("Settings for " + targetPage + " have been saved successfully!");
    });
</script>

  <footer>&copy; 2025 FlyHigh Airlines. All rights reserved.</footer>
</body>
</html>
