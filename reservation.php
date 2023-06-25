<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$database_name = "hotel";
$con = mysqli_connect($hostname, $username, $password, $database_name);
if ($con) {
    //echo "Connected";
} else {
    echo "Not connected";
}

$guest_id = $_GET["guest_id"]; // Get the guest_id from the URL parameter

if (isset($_POST["button_save"])) {
    $room_id = $_POST["room_id"];
    $check_in = $_POST["check_in"];
    $check_out = $_POST["check_out"];
    $num_of_guest = $_POST["num_of_guest"];
    $payment_id = $_POST["payment_id"];
    $staff_id = $_POST["staff_id"];

    $qry = mysqli_query($con, "INSERT INTO reservation (guest_id, room_id, check_in, check_out, num_of_guest, payment_id, staff_id) VALUES (
        '$guest_id',
        '$room_id',
        '$check_in',
        '$check_out',
        '$num_of_guest',
        '$payment_id',
        '$staff_id'
    )");
    if ($qry) {
        // Get the reservation ID of the inserted row
        $reservation_id = mysqli_insert_id($con);
        // Redirect to the payment form with the reservation ID
        header("Location: payment.php?reservation_id=$reservation_id");
        exit();
    } else {
        echo "Not inserted" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Reservation Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="bg-dark text-white text-center py-5">
        <h1>Hotel Reservation</h1>
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
                    <a class="nav-link" href="#">Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container py-5">
        <h2 class="mb-4">Welcome to our Hotel!</h2>
        <p>Book your stay with us today and enjoy a comfortable and memorable experience.</p>

        <h3 class="mt-5">Reservation Form</h3>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . '?guest_id=' . $guest_id; ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Room ID</label>
                        <input type="text" class="form-control" id="room_id" name="room_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Check In</label>
                        <input type="date" class="form-control" id="check_in" name="check_in" required>
                    </div>
                    <div class="mb-3">
                        <label for="check_out" class="form-label">Check Out</label>
                        <input type="date" class="form-control" id="check_out" name="check_out" required>
                    </div>
                    <div class="mb-3">
                        <label for="num_of_guest" class="form-label">Number of Guests</label>
                        <input type="number" class="form-control" id="num_of_guest" name="num_of_guest" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment_id" class="form-label">Payment ID</label>
                        <input type="text" class="form-control" id="payment_id" name="payment_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="staff_id" class="form-label">Staff ID</label>
                        <input type="text" class="form-control" id="staff_id" name="staff_id" required>
                    </div>
                </div>
            </div>
            <input type="hidden" name="guest_id" value="<?php echo $guest_id; ?>">
            <button type="submit" name="button_save" class="btn btn-primary">Next</button>
        </form>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        &copy; <?php echo date("Y"); ?> Hotel Reservation. All rights reserved.
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>