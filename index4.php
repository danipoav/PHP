<?php
if (!isset($_GET['id'])) {
    echo 'Error no params recived';
    exit;
}

$id = $_GET['id'];

$jsonRoot = 'rooms.json';
$jsonGetData = file_get_contents($jsonRoot);
$roomsArray = json_decode($jsonGetData, true);

$roomResult = null;

foreach ($roomsArray as $room) {
    if ($room['id'] === $id) {
        $roomResult = $room;
        break;
    }
}

if (!$roomResult) {
    echo 'No se encontró ninguna habitación con ID: ' . $id;
    exit;
}

echo '<pre>';
echo '<ul>';
echo '<li> ID: ' . $roomResult['id'] . '</li>';
echo '<li> PRICE: ' . $roomResult['price'] . '</li>';
echo '<li> NAME: ' . $roomResult['name'] . '</li>';
echo '<li> BED TYPE: ' . $roomResult['bed_type'] . '</li>';
echo '<li> STATUS: ' . $roomResult['status'] . '</li>';
echo '</ul>';
echo '</pre>';
