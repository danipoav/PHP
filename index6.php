<?php
$conn = new mysqli('localhost', 'Dani', 'Batman2002', 'db_hotel');

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

if (!isset($_GET['id'])) {
    echo 'Error: No se recibió un ID.';
    exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM rooms WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$room = $result->fetch_assoc();

if (!$room) {
    echo 'No se encontró una habitación con ID: ' . ($id);
    exit();
}

echo '<pre>';
echo '<ul>';
echo '<li> ID: ' . ($room['id']) . '</li>';
echo '<li> PRICE: ' . ($room['price']) . '</li>';
echo '<li> NAME: ' . ($room['name']) . '</li>';
echo '<li> BED TYPE: ' . ($room['bed_type']) . '</li>';
echo '<li> STATUS: ' . ($room['status']) . '</li>';
echo '</ul>';
echo '</pre>';

$stmt->close();
$conn->close();
