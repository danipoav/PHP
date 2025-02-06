<?php
$conn = new mysqli('localhost', 'Dani', 'Batman2002', 'db_hotel');

if ($conn->connect_errno) {
    echo 'Error connecting DB: ' . $conn->error;
    exit;
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
    $sql = 'SELECT * FROM rooms WHERE name LIKE ?';
    $stmt = $conn->prepare($sql);
    $likeSearch = "%$search%";
    $stmt->bind_param('s', $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query('SELECT * FROM rooms');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect</title>
</head>

<body>
    <h2>Buscar Habitaciones</h2>
    <form>
        <input type="text" name="search" placeholder="Look for name...">
        <button type="submit">SEARCH</button>
    </form>

    <h2>Lista de Habitaciones</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Status</th>
        </tr>
        <?php while ($habitacion = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($habitacion['id']) ?></td>
                <td><?= htmlspecialchars($habitacion['name']) ?></td>
                <td><?= htmlspecialchars($habitacion['price']) ?> €</td>
                <td><?= htmlspecialchars($habitacion['status']) ?> personas</td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>

<?php
$conn->close();
?>