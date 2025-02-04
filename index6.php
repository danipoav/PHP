<?php
$conn = new mysqli('localhost', 'Dani', 'Batman2002', 'db_hotel');

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'SELECT * FROM rooms WHERE id =' . $id;
    $result = $conn->query($sql);
    $room = $result->fetch_assoc();

    echo '<pre>';
    echo '<ul>';
    echo '<li> ID: ' . $room['id'] . '</li>';
    echo '<li> PRICE: ' . $room['price'] . '</li>';
    echo '<li> NAME: ' . $room['name'] . '</li>';
    echo '<li> BED TYPE: ' . $room['bed_type'] . '</li>';
    echo '<li> STATUS: ' . $room['status'] . '</li>';
    echo '</ul>';
    echo '</pre>';
} else {
    echo 'Not param';
}
