<?php
session_start();

$conn = new mysqli("localhost", "root", "", "FlyHigh");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form input
$city = $_POST['city'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$guests = intval($_POST['guests']);

// Match hotel
$sql = "SELECT * FROM HotelInventory WHERE city = ? AND checkin_date = ? AND checkout_date = ? AND available_rooms > 0 LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $city, $checkin, $checkout);
$stmt->execute();
$result = $stmt->get_result();
$hotel = $result->fetch_assoc();

if (!$hotel) {
    die("No available hotels for your selection.");
}

// Reduce rooms
$update = $conn->prepare("UPDATE HotelInventory SET available_rooms = available_rooms - 1 WHERE id = ?");
$update->bind_param("i", $hotel['id']);
$update->execute();

// Store in session cart
$_SESSION['cart']['hotel'] = [
    'name' => $hotel['hotel_name'],
    'city' => $city,
    'checkin' => $checkin,
    'checkout' => $checkout,
    'guests' => $guests,
    'price' => $hotel['price']
];

$conn->close();
header("Location:cart.php");
exit();
?>
