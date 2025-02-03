<?php
$jsonRoot = 'rooms.json';
$jsonGetData = file_get_contents($jsonRoot);
$roomsArray = json_decode($jsonGetData, true);

if ($roomsArray === null) {
    echo "Error al decodificar";
    exit;
}

foreach ($roomsArray as $index => $room) {
    echo '<pre>';
    echo "<p><strong>Índice:</strong> $index</p>";
    echo '<ol>';
    echo '<li> ID: ' . $room['id'] . '</li>';
    echo '<li> PRICE: ' . $room['price'] . '</li>';
    echo '<li> NAME: ' . $room['name'] . '</li>';
    echo '<li> BED TYPE: ' . $room['bed_type'] . '</li>';
    echo '<li> STATUS: ' . $room['status'] . '</li>';
    echo '</ol>';
    echo '</pre>';
}
