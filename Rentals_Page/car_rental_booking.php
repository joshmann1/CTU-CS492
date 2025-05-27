<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FlyHigh";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data from form
$pickup_location = $_POST['pickup-location'];
$pickup_date = $_POST['pickup-date'];
$dropoff_location = $_POST['dropoff-location'];
$dropoff_date = $_POST['dropoff-date'];
$car_type = $_POST['car-type'];

// Car pricing
$pricing = [
    "economy" => 60.00,
    "compact" => 70.00,
    "standard" => 80.00,
    "luxury" => 90.00,
    "suv" => 100.00
];
$price = $pricing[$car_type];

// Validate availability
$check = $conn->prepare("SELECT available_count FROM CarInventory WHERE car_type = ?");
$check->bind_param("s", $car_type);
$check->execute();
$check_result = $check->get_result()->fetch_assoc();

if ($check_result['available_count'] <= 0) {
    die("Sorry, no more '$car_type' cars are available.");
}

// Insert booking
$sql = "INSERT INTO CarRentals (pickup_location, pickup_date, dropoff_location, dropoff_date, car_type, price)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssd", $pickup_location, $pickup_date, $dropoff_location, $dropoff_date, $car_type, $price);
$stmt->execute();
$booking_id = $stmt->insert_id;
$stmt->close();

// Update inventory
$update = $conn->prepare("UPDATE CarInventory SET available_count = available_count - 1 WHERE car_type = ?");
$update->bind_param("s", $car_type);
$update->execute();
$update->close();

// Store booking in session cart
$_SESSION['cart']['car'] = [
    'id' => $booking_id,
    'pickup' => $pickup_location,
    'pickup_date' => $pickup_date,
    'dropoff' => $dropoff_location,
    'dropoff_date' => $dropoff_date,
    'car_type' => $car_type,
    'price' => $price
];

$conn->close();

// Redirect to cart
header("Location: cart.php");
exit();
?>
