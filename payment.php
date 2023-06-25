<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$database_name = "hotel";
$con = mysqli_connect($hostname, $username, $password, $database_name);
if (!$con) {
    echo "Not connected";
}

$reservation_id = $_GET["reservation_id"]; // Get the reservation_id from the URL parameter

if (isset($_POST["button_save"])) {
    // Retrieve payment form data
    $payment_method_id = $_POST["payment_method_id"];
    $payment_status = $_POST["payment_status"];
    $total_price = $_POST["total_price"];
    $discount = $_POST["discount"];
    $staff_id = $_POST["staff_id"];

    // Insert payment data into the database
    $qry = mysqli_query($con, "INSERT INTO payment (payment_method_id, payment_status, total_price, reservation_id, discount, staff_id)
        VALUES ('$payment_method_id', '$payment_status', '$total_price', '$reservation_id', '$discount', '$staff_id')");

    if ($qry) {
        echo "Payment inserted";
        // Redirect to a success page or perform any other necessary action
        // header("Location: payment_success.php");
        // exit();
    } else {
        echo "Payment not inserted" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

        <h3 class="mt-5">Payment Form</h3>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . '?reservation_id=' . $reservation_id; ?>">
            <!-- Payment form fields -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="payment_method_id" class="form-label">Payment Method ID: </label>
                        <input type="text" class="form-control" id="payment_method_id" name="payment_method_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment_status">Payment Status:</label>
                        <input type="text" class="form-control" id="payment_status" name="payment_status" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_price">Total Price:</label>
                        <input type="text" class="form-control" id="total_price" name="total_price" required>
                    </div>
                    <div class="mb-3">
                        <label for="discount">Discount:</label>
                        <input type="text" class="form-control" id="discount" name="discount" required>
                    </div>
                    <div class="mb-3">
                        <label for="staff_id">Staff ID:</label>
                        <input type="text" class="form-control" id="staff_id" name="staff_id" required>
                    </div>
                </div>
            </div>

            <button type="submit" name="button_save" class="btn btn-primary">Submit</button>
        </form>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        &copy;
        <?php echo date("Y"); ?> Hotel Reservation. All rights reserved.
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>