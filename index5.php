<?php
$conn = new mysqli('localhost', 'Dani', 'Batman2002', 'db_hotel');

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<pre>';
    while ($row = $result->fetch_assoc()) {
        print_r($row);
        echo "\n";
    }
    echo '</pre>';
} else {
    echo "No hay habitaciones disponibles.";
}
