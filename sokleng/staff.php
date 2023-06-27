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

// Retrieve the lists from the database
$room_query = mysqli_query($con, "SELECT * FROM room");
$payment_query = mysqli_query($con, "SELECT * FROM payment");
$reservation_query = mysqli_query($con, "SELECT * FROM reservation");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Staff Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="bg-dark text-white text-center py-5">
        <h1>Staff Page</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rooms</a>
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
        <h2 class="mb-4">Staff Dashboard</h2>

        <h3>Room List</h3>
        <table class="table">
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
                <?php
                while ($row = mysqli_fetch_assoc($room_query)) {
                    echo "<tr>";
                    echo "<td>" . $row['room_id'] . "</td>";
                    echo "<td>" . $row['room_num'] . "</td>";
                    echo "<td>" . $row['max_occupancy'] . "</td>";
                    echo "<td>" . $row['price_per_night'] . "</td>";
                    echo "<td>" . $row['availability_status'] . "</td>";
                    echo "<td>" . $row['room_type_id'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3>Payment List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Payment Method ID</th>
                    <th>Payment Status</th>
                    <th>Total Price</th>
                    <th>Reservation ID</th>
                    <th>Discount</th>
                    <th>Staff ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($payment_query)) {
                    echo "<tr>";
                    echo "<td>" . $row['payment_id'] . "</td>";
                    echo "<td>" . $row['payment_method_id'] . "</td>";
                    echo "<td>" . $row['payment_status'] . "</td>";
                    echo "<td>" . $row['total_price'] . "</td>";
                    echo "<td>" . $row['reservation_id'] . "</td>";
                    echo "<td>" . $row['discount'] . "</td>";
                    echo "<td>" . $row['staff_id'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3>Reservation List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Guest ID</th>
                    <th>Room ID</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Number of Guests</th>
                    <th>Payment ID</th>
                    <th>Staff ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($reservation_query)) {
                    echo "<tr>";
                    echo "<td>" . $row['reservation_id'] . "</td>";
                    echo "<td>" . $row['guest_id'] . "</td>";
                    echo "<td>" . $row['room_id'] . "</td>";
                    echo "<td>" . $row['check_in'] . "</td>";
                    echo "<td>" . $row['check_out'] . "</td>";
                    echo "<td>" . $row['num_of_guest'] . "</td>";
                    echo "<td>" . $row['payment_id'] . "</td>";
                    echo "<td>" . $row['staff_id'] . "</td>";
                    echo "</tr>";
                }
                ?>
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
