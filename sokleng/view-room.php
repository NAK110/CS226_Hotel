<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "hotel";
$con = mysqli_connect($hostname, $username, $password, $database_name);
if ($con) {
    //echo "Connected";
} else {
    echo "Not connected";
}

// Fetch all rooms from the database
$rooms_query = mysqli_query($con, "SELECT * FROM room");
$rooms = mysqli_fetch_all($rooms_query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Rooms</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="bg-dark text-white text-center py-5">
        <h1>View Rooms</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a> <!-- Link to index.php -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reservations</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container py-5">
        <h2 class="mb-4">All Rooms</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Room ID</th>
                    <th>Room Number</th>
                    <th>Max Occupancy</th>
                    <th>Price per Night</th>
                    <th>Availability Status</th>
                    <th>Room Type ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rooms as $room) : ?>
                    <tr>
                        <td><?php echo $room['room_id']; ?></td>
                        <td><?php echo $room['room_num']; ?></td>
                        <td><?php echo $room['max_occupancy']; ?></td>
                        <td><?php echo $room['price_per_night']; ?></td>
                        <td><?php echo $room['availability_status']; ?></td>
                        <td><?php echo $room['room_type_id']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        &copy; <?php echo date("Y"); ?> Hotel Reservation. All rights reserved.
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
