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

// Get data from form
$departure = "FlyHigh HQ"; // Fixed departure
$arrival = $_POST['arrival'];
$depart_date = $_POST['depart-date'];
$return_date = $_POST['return-date'];
$passengers = intval($_POST['passengers']);

// Check availability in inventory
$sql = "SELECT * FROM FlightInventory 
        WHERE destination = ? 
          AND depart_date = ? 
          AND return_date = ? 
          AND available_seats >= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $arrival, $depart_date, $return_date, $passengers);
$stmt->execute();
$result = $stmt->get_result();
$flight = $result->fetch_assoc();

if (!$flight) {
    die("Sorry, not enough seats available for this flight.");
}

// Deduct seats from inventory
$update = $conn->prepare("UPDATE FlightInventory SET available_seats = available_seats - ? WHERE id = ?");
$update->bind_param("ii", $passengers, $flight['id']);
$update->execute();
$update->close();

// Store flight in session cart
$_SESSION['cart']['flight'] = [
    'from' => $departure,
    'to' => $arrival,
    'depart_date' => $depart_date,
    'return_date' => $return_date,
    'seats' => $passengers,
    'price' => $flight['price'] * $passengers
];

$conn->close();

// Redirect to cart
header("Location:Cart.php");
exit();
?>
