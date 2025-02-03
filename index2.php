<?php
$jsonFile = 'rooms.json';
$jsonGetData = file_get_contents($jsonFile);
$rooms = json_decode($jsonGetData, true);

if ($rooms === null) {
    echo "Error al decodificar";
    exit;
}

echo "<pre>";
print_r($rooms);
echo "</pre>";
