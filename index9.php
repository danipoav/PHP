<?php
$conn = new mysqli('localhost', 'Dani', 'Batman2002', 'db_hotel');

if ($conn->connect_errno) {
    die('Error connecting DB: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $photo = $_POST['photo'] ?? '';
    $bed_type = $_POST['bed_type'] ?? '';
    $room_number = $_POST['room_number'] ?? '';
    $facilities = $_POST['facilities'] ?? '';
    $price = $_POST['price'] ?? '';
    $status = $_POST['status'] ?? '';

    $stmt = $conn->prepare("INSERT INTO rooms (id, name, photo, bed_type, room_number, facilities, price, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('dssssdds', $id, $name, $photo, $bed_type, $room_number, $facilities, $price, $status);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post room</title>
</head>

<body>
    <h2>Create a room</h2>
    <form method="POST">
        <label>ID:</label>
        <input type="number" name='id'>
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Photo URL:</label>
        <input type="text" name="photo">
        <label>Bed Type:</label>
        <input type="text" name="bed_type">
        <label>Room Number:</label>
        <input type="number" name="room_number">
        <label>Facilities:</label>
        <input type="text" name="facilities">
        <label>Price:</label>
        <input type="number" name="price" required>
        <label>Status:</label>
        <input type="text" name="status">
        <button type="submit">Create</button>
    </form>

    <h2>Room List</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?= htmlspecialchars($row['name']) ?> - $<?= number_format($row['price'], 2) ?> - <?= htmlspecialchars($row['status']) ?></li>
        <?php endwhile; ?>
    </ul>
</body>

</html>